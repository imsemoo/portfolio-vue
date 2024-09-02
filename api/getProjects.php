<?php
header("Access-Control-Allow-Origin: http://localhost:8082"); // تأكد من مطابقة النطاق المستخدم في Vue.js
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true"); // السماح بإرسال واستقبال ملفات تعريف الارتباط (Cookies)

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "portfolio_db";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM projects";
$result = $conn->query($sql);

$projects = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $row['technologies'] = json_decode($row['technologies']);
        $projects[] = $row;
    }
}

echo json_encode(['projects' => $projects]);

$conn->close();
