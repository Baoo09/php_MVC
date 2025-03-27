<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Sự</title>
    <style>
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div>
            <a href="index.php?controller=employee&action=index">Danh Sách Nhân Viên</a>
            <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'): ?>
                <a href="index.php?controller=employee&action=add">Thêm Nhân Viên</a>
            <?php endif; ?>
        </div>
        <div>
            <?php if (isset($_SESSION['user'])): ?>
                Xin chào, <?php echo htmlspecialchars($_SESSION['user']['fullname']); ?> |
                <a href="index.php?controller=auth&action=logout">Đăng Xuất</a>
            <?php else: ?>
                <a href="index.php?controller=auth&action=login">Đăng Nhập</a>
            <?php endif; ?>
        </div>
    </div>