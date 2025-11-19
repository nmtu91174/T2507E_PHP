<?php
// Lấy tên file hiện tại để xác định mục nào đang active
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!-- 
    Thay đổi col-3 thành col-md-3 col-lg-2 
    Thêm class 'sidebar' tùy chỉnh và các class màu của Bootstrap 
-->
<aside class="col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <!-- 
            Sử dụng nav-pills để tạo menu
            Thay <li> thành <a> để có thể click
        -->
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo ($current_page == 'categories.php') ? 'active' : ''; ?>" href="categories.php">
                    <i class="fas fa-tags fa-icon"></i>
                    Category
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($current_page == 'products.php') ? 'active' : ''; ?>" href="#">
                    <i class="fas fa-box-open fa-icon"></i>
                    Product
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($current_page == 'orders.php') ? 'active' : ''; ?>" href="#">
                    <i class="fas fa-shopping-cart fa-icon"></i>
                    Order
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($current_page == 'customers.php') ? 'active' : ''; ?>" href="#">
                    <i class="fas fa-users fa-icon"></i>
                    Customer
                </a>
            </li>
        </ul>
    </div>
</aside>