<?php
// إضافة CORS Headers للسماح بطلبات من أصول مختلفة
header("Access-Control-Allow-Origin: http://localhost:8081"); // تأكد من تطابق النطاق مع نطاق Vue.js
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true"); // السماح بإرسال واستقبال ملفات تعريف الارتباط (Cookies)

session_start();

// التحقق من الجلسة وإنهائها
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    session_unset();
    session_destroy();
    echo json_encode(['success' => true, 'message' => 'Logged out successfully']);
} else {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
}
?>
