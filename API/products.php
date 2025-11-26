<?php
require_once("config.php");

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    // 1. Lấy 1 sản phẩm (Chi tiết)
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $sql = "SELECT p.*, c.name as category_name FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id 
                WHERE p.id = $id";
        $result = $conn->query($sql);
        $product = $result->fetch_assoc();
        echo json_encode($product);
    }
    // 2. Lấy theo danh mục
    else if (isset($_GET['category_id'])) {
        $cat_id = intval($_GET['category_id']);
        $sql = "SELECT * FROM products WHERE category_id = $cat_id";
        $result = $conn->query($sql);
        $products = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($products);
    }
    // 3. Lấy tất cả (Trang chủ)
    else {
        // Thêm "ORDER BY id DESC" để đưa sản phẩm có ID lớn nhất (mới nhất) lên đầu
        $sql = "SELECT * FROM products ORDER BY id DESC";
        $result = $conn->query($sql);
        $products = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($products);
    }
}
$conn->close();
