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
$projectId = $data->id;

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "portfolio_db";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM projects WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $projectId);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Project deleted successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error deleting project: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
