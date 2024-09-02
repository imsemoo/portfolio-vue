<?php
header("Access-Control-Allow-Origin: http://localhost:8082"); // تأكد من مطابقة النطاق المستخدم في Vue.js
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true"); // السماح بإرسال واستقبال ملفات تعريف الارتباط (Cookies)


session_start();
session_unset();
session_destroy();

echo json_encode(['success' => true, 'message' => 'Logged out successfully']);
