<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Nhân Viên</title>
    <style>
        /* Basic CSS Styling - You can adjust this to your liking */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .nav-left a, .nav-right a {
            margin-right: 15px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .nav-right .user-info {
            margin-right: 15px;
            font-weight: bold;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .modern-table {
            width: 100%;
            overflow-x: auto; /* Handle tables that are too wide for smaller screens */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .gender-icon {
            width: 24px; /* Adjust size as needed */
            height: 24px; /* Adjust size as needed */
            vertical-align: middle;
            border-radius: 50%; /* Optional: Makes the icon circular */
        }

        .action-btn {
            display: inline-block;
            padding: 8px 12px;
            margin-right: 5px;
            text-decoration: none;
            color: #fff;
            border-radius: 4px;
            font-size: 0.9em;
        }

        .edit-btn {
            background-color: #28a745;
        }

        .delete-btn {
            background-color: #dc3545;
        }

        .pagination {
            text-align: center;
            margin-top: 20px;
        }

        .pagination a {
            display: inline-block;
            padding: 8px 12px;
            margin: 0 5px;
            text-decoration: none;
            color: #007bff;
            border: 1px solid #007bff;
            border-radius: 4px;
        }

        .pagination a.active {
            background-color: #007bff;
            color: #fff;
        }

        /* Responsive Design adjustments */
        @media (max-width: 768px) {
            .container {
                width: 95%;
            }
            .header {
                flex-direction: column;
                align-items: flex-start;
            }
            .nav-left, .nav-right {
                margin-bottom: 10px;
            }
        }

    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        ?>
        <div class="header">
            <div class="nav-left">
                <a href="index.php?controller=employee&action=index">Danh Sách NV</a>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'): ?>
                    <a href="index.php?controller=employee&action=add">Thêm NV</a>
                <?php endif; ?>
            </div>
            <div class="nav-right">
                <?php if (isset($_SESSION['user'])): ?>
                    <span class="user-info">Xin chào, <?php echo htmlspecialchars($_SESSION['user']['fullname']); ?></span>
                    <a href="index.php?controller=auth&action=logout">Đăng Xuất</a>
                <?php else: ?>
                    <a href="index.php?controller=auth&action=login">Đăng Nhập</a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Content -->
        <h2>THÔNG TIN NHÂN VIÊN</h2>
        <div class="modern-table">
            <table>
                <thead>
                    <tr>
                        <th>Mã Nhân Viên</th>
                        <th>Tên Nhân Viên</th>
                        <th>Giới Tính</th>
                        <th>Nơi Sinh</th>
                        <th>Tên Phòng</th>
                        <th>Lương</th>
                        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'): ?>
                            <th>Hành Động</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($employees)): ?>
                    <?php foreach ($employees as $employee): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($employee['Ma_NV']); ?></td>
                            <td><?php echo htmlspecialchars($employee['Ten_NV']); ?></td>
                            <td>
                                <img class="gender-icon"
                                     src="public/images/<?php echo $employee['Phai'] == 'NU' ? 'woman.jpg' : 'man.jpg'; ?>"
                                     alt="<?php echo $employee['Phai'] == 'NU' ? 'Nữ' : 'Nam'; ?>">
                            </td>
                            <td><?php echo htmlspecialchars($employee['Noi_Sinh']); ?></td>
                            <td><?php echo htmlspecialchars($employee['Ten_Phong']); ?></td>
                            <td><?php echo number_format($employee['Luong'], 0, ',', '.'); ?> VNĐ</td>
                            <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'): ?>
                                <td>
                                    <a href="index.php?controller=employee&action=edit&ma_nv=<?php echo $employee['Ma_NV']; ?>"
                                       class="action-btn edit-btn">Sửa</a>
                                    <a href="index.php?controller=employee&action=delete&ma_nv=<?php echo $employee['Ma_NV']; ?>"
                                       class="action-btn delete-btn"
                                       onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="<?php echo (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') ? '7' : '6'; ?>">
                            Không có dữ liệu nhân viên.
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if (isset($total_pages) && $total_pages > 1): ?>
        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="index.php?controller=employee&action=index&page=<?php echo $i; ?>"
                   class="<?php echo ($i == $page) ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>