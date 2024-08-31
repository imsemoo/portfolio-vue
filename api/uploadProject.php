<?php
header("Access-Control-Allow-Origin: http://localhost:8081"); // تطابق مع النطاق الذي تستخدمه في Vue.js
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true"); // السماح بإرسال ملفات تعريف الارتباط

session_start();

// تحقق من الجلسة
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit();
}


// إعدادات الاتصال بقاعدة البيانات
$servername = "localhost";
$dbUsername = "root"; // اسم مستخدم قاعدة البيانات
$dbPassword = ""; // كلمة مرور قاعدة البيانات
$dbname = "portfolio_db"; // اسم قاعدة البيانات

// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]);
    exit();
}

// إعدادات رفع الملفات
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// التحقق من وجود الملف
if (file_exists($targetFile)) {
    echo json_encode(['error' => 'Sorry, file already exists.']);
    $uploadOk = 0;
}

// التحقق من حجم الملف
if ($_FILES["file"]["size"] > 500000) {
    echo json_encode(['error' => 'Sorry, your file is too large.']);
    $uploadOk = 0;
}

// السماح بتنسيقات ملفات معينة
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo json_encode(['error' => 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.']);
    $uploadOk = 0;
}

// تحقق إذا كانت هناك أخطاء في عملية الرفع
if ($uploadOk == 0) {
    echo json_encode(['error' => 'Sorry, your file was not uploaded.']);
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        // إدراج بيانات المشروع في قاعدة البيانات
        $name = $_POST['name'];
        $description = $_POST['description'];
        $sql = "INSERT INTO projects (name, description, file_path) VALUES (?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $description, $targetFile);

        if ($stmt->execute()) {
            echo json_encode(['success' => 'New project uploaded and saved successfully.']);
        } else {
            echo json_encode(['error' => 'Error: ' . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(['error' => 'Sorry, there was an error uploading your file.']);
    }
}

// إغلاق اتصال قاعدة البيانات
$conn->close();
?>
