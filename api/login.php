<?php
header("Access-Control-Allow-Origin: http://localhost:8082"); // تأكد من استخدام النطاق الصحيح
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");

session_start();

// قراءة البيانات المستلمة من الطلب
$data = json_decode(file_get_contents("php://input"));

if (isset($data->username) && isset($data->password)) {
    $username = $data->username;
    $password = $data->password;

    // إعدادات الاتصال بقاعدة البيانات
    $servername = "localhost";
    $dbUsername = "root"; 
    $dbPassword = ""; 
    $dbname = "portfolio_db"; 

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

    // التحقق من الاتصال
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // تحقق من كلمة المرور بدون تشفير
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
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
}
?>
