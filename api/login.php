<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

session_start();

$data = json_decode(file_get_contents("php://input"));

$username = $data->username;
$password = $data->password;

// إعدادات الاتصال بقاعدة البيانات
$servername = "localhost";
$dbUsername = "root"; // اسم مستخدم قاعدة البيانات
$dbPassword = ""; // كلمة مرور قاعدة البيانات
$dbname = "portfolio_db"; // اسم قاعدة البيانات

// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// التحقق من اسم المستخدم وكلمة المرور
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // التحقق من كلمة المرور مباشرة دون تشفير
    if ($password === $user['password']) {
        $_SESSION['authenticated'] = true;
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
}

$stmt->close();
$conn->close();
?>
