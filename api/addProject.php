<?php

header("Access-Control-Allow-Origin: http://localhost:8082"); // تأكد من مطابقة النطاق المستخدم في Vue.js
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true"); // السماح بإرسال واستقبال ملفات تعريف الارتباط (Cookies)

session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit();
}

$data = json_decode(file_get_contents("php://input"));

$title = $data->title;
$description = $data->description;
$image = $data->image;  // يجب أن تقوم بتحميل الصورة بشكل منفصل إذا كانت صورة فعلية
$technologies = json_encode($data->technologies);
$category = $data->category;
$liveLink = $data->liveLink;
$codeLink = $data->codeLink;

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "portfolio_db";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO projects (title, description, image, technologies, category, liveLink, codeLink) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $title, $description, $image, $technologies, $category, $liveLink, $codeLink);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Project added successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error adding project: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
