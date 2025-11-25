<?php
require_once("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu JSON thô từ React gửi lên
    $input = json_decode(file_get_contents('php://input'), true);

    if (!$input) {
        http_response_code(400);
        echo json_encode(["message" => "No data provided"]);
        exit;
    }

    $name = $conn->real_escape_string($input['customer_name']);
    $email = $conn->real_escape_string($input['customer_email']);
    $phone = $conn->real_escape_string($input['customer_phone']);
    $address = $conn->real_escape_string($input['customer_address']);
    $total = floatval($input['total_money']);
    $cart = $input['cart']; // Mảng các sản phẩm

    // 1. Tạo đơn hàng (Order)
    $sql_order = "INSERT INTO orders (customer_name, customer_email, customer_phone, customer_address, total_money) 
                  VALUES ('$name', '$email', '$phone', '$address', $total)";
    
    if ($conn->query($sql_order)) {
        $order_id = $conn->insert_id; // Lấy ID vừa tạo

        // 2. Tạo chi tiết đơn hàng (Order Details)
        foreach ($cart as $item) {
            $product_id = intval($item['id']);
            $quantity = intval($item['qty']); // React gửi 'qty'
            $price = floatval($item['price']);
            
            $conn->query("INSERT INTO order_details (order_id, product_id, price, quantity) 
                          VALUES ($order_id, $product_id, $price, $quantity)");
        }

        echo json_encode(["status" => "success", "order_id" => $order_id]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}
?>