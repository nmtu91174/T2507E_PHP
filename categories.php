<?php
    // các thông số
    $host = "localhost";
    $user = "root";
    $pwd = "root";
    // Đã cập nhật tên DB theo yêu cầu của bạn
    $db = "t2507e_db"; 
    
    // b1. kết nối db
    $conn = new mysqli($host,$user,$pwd,$db);
    if($conn->connect_error){
        die("Connect database fail! " . $conn->connect_error);
    }
    
    // b2. query data
    $sql = "select * from categories";
    $rs = $conn->query($sql);

    // *** SỬA LỖI QUAN TRỌNG ***
    // Luôn kiểm tra $rs có phải là FALSE không trước khi dùng
    if ($rs === FALSE) {
        die("SQL Error: " . $conn->error);
    }

    // b3. get result (data)
    $data = [];
    if($rs->num_rows > 0){
        while($row=$rs->fetch_assoc()){
            $data[] = $row;
        }
    }
    // Đóng kết nối
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories Dashboard</title>
    <?php 
        // Include file style đã được cập nhật
        include("html/style.php");
    ?>
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <?php 
                // Include file sidebar đã được cập nhật
                include("html/aside.php");
            ?>
            
            <!-- 
                Nội dung chính
                Thêm class 'main-content' và class cột (col-md-9 col-lg-10)
            -->
            <main class="col-md-9 ms-sm-auto col-lg-10 main-content">
                
                <!-- 
                    Tạo header cho trang (Tiêu đề và nút)
                -->
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Manage Categories</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="#" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i> Create a category
                        </a>
                    </div>
                </div>

                <!-- 
                    Tùy chỉnh bảng
                    Thêm các class: table-striped (vằn), table-hover (di chuột), 
                    table-bordered (viền), table-sm (nhỏ gọn)
                -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered table-sm align-middle">
                        <!-- Thêm class table-dark cho tiêu đề bảng -->
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" style="width: 10%;">#ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col" style="width: 20%;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // Kiểm tra nếu không có dữ liệu
                            if (count($data) == 0): 
                            ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No categories found.</td>
                                </tr>
                            <?php 
                            // Hiển thị dữ liệu
                            else: 
                                foreach($data as $item):
                            ?>
                                <tr>
                                    <th scope="row"><?php echo htmlspecialchars($item["id"]); ?></th>
                                    <td><?php echo htmlspecialchars($item["name"]); ?></td>
                                    <td><?php echo htmlspecialchars($item["slug"]); ?></td>
                                    <td class="text-center">
                                        <!-- 
                                            Thêm icon và class btn-sm (nút nhỏ) 
                                            Sử dụng htmlspecialchars để bảo mật
                                        -->
                                        <a href="#" class="btn btn-sm btn-outline-info">
                                            <i class="fas fa-edit me-1"></i> Edit
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash-alt me-1"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php 
                                endforeach;
                            endif; 
                            ?>
                        </tbody>
                    </table>
                </div>
                
            </main>
        </div>
    </div>

    <!-- Thêm Bootstrap JS (cần cho một số tính năng) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>