<?php
// api/config.php
header("Access-Control-Allow-Origin: *"); // Cho phép mọi nguồn truy cập (Trong thực tế nên giới hạn)
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");

// Handle preflight request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

require_once("../db_connect.php"); // Tái sử dụng file db_connect cũ của bạn
?>