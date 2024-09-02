<?php

$servername = "localhost";
$username = "root";  // استخدم اسم المستخدم الخاص بقاعدة البيانات
$password = "";      // استخدم كلمة المرور الخاصة بقاعدة البيانات
$dbname = "portfolio_db"; // اسم قاعدة البيانات

$conn = new mysqli($servername, $username, $password, $dbname);

// تحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// إضافة سجل جديد
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $sql = "INSERT INTO projects (name, description) VALUES ('$name', '$description')";

    if ($conn->query($sql) === true) {
        echo json_encode(["message" => "Record added successfully"]);
    } else {
        echo json_encode(["error" => "Error: " . $sql . "<br>" . $conn->error]);
    }
}

// حذف سجل
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $id = $_DELETE['id'];

    $sql = "DELETE FROM projects WHERE id = $id";

    if ($conn->query($sql) === true) {
        echo json_encode(["message" => "Record deleted successfully"]);
    } else {
        echo json_encode(["error" => "Error: " . $sql . "<br>" . $conn->error]);
    }
}

// تحديث سجل
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    $id = $_PUT['id'];
    $name = $_PUT['name'];
    $description = $_PUT['description'];

    $sql = "UPDATE projects SET name='$name', description='$description' WHERE id = $id";

    if ($conn->query($sql) === true) {
        echo json_encode(["message" => "Record updated successfully"]);
    } else {
        echo json_encode(["error" => "Error: " . $sql . "<br>" . $conn->error]);
    }
}

// جلب كل السجلات
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM projects";
    $result = $conn->query($sql);

    $projects = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $projects[] = $row;
        }
    }
    echo json_encode($projects);
}

$conn->close();
