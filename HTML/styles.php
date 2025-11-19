<?php
// Bao gồm Bootstrap 5 (đã có)
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
?>


<?php
// Thêm thư viện icon Font Awesome
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" xintegrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

?>

<?php
// Thêm CSS tùy chỉnh cho layout dashboard
?>
<style>
    body {
        /* Màu nền xám nhạt cho khu vực nội dung */
        background-color: #f8f9fa;
    }

    .sidebar {
        /* Sidebar cố định */
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        padding: 48px 0 0; /* Đệm cho thanh nav trên cùng (nếu có) */
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        background-color: #343a40; /* Màu nền tối cho sidebar */
    }

    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto; /* Cho phép cuộn nếu menu dài */
    }

    /* Tùy chỉnh link trong sidebar */
    .sidebar .nav-link {
        font-weight: 500;
        color: #adb5bd; /* Màu chữ xám nhạt */
    }

    .sidebar .nav-link .fa-icon {
        margin-right: 8px; /* Khoảng cách icon */
    }

    .sidebar .nav-link:hover {
        color: #fff; /* Màu trắng khi hover */
        background-color: #495057;
    }

    /* Link được active */
    .sidebar .nav-link.active {
        color: #fff;
        background-color: #0d6efd; /* Màu xanh dương của Bootstrap */
    }

    /* Căn chỉnh nội dung chính */
    .main-content {
        /* Đẩy nội dung chính sang phải bằng độ rộng của sidebar */
        margin-left: 240px; 
        padding: 2rem;
    }

    /* Thiết kế cho màn hình nhỏ (mobile) */
    @media (max-width: 767.98px) {
        .sidebar {
            /* Trên mobile, sidebar chiếm toàn bộ chiều rộng */
            width: 100%;
            height: auto;
            position: relative;
            box-shadow: none;
            padding-top: 0;
        }
        .sidebar-sticky {
            height: auto;
            padding-top: 0;
        }
        .main-content {
            margin-left: 0; /* Reset margin */
            padding: 1rem;
        }
    }
</style>