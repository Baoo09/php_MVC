<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhân Viên</title>
    <style>
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

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input:focus, select:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        p.error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php require_once 'app/views/shares/header.php'; ?>

        <h2>THÊM NHÂN VIÊN</h2>

        <?php if (isset($error)): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form action="index.php?controller=employee&action=handleAdd" method="POST">
            <div class="form-group">
                <label>Mã Nhân Viên:</label>
                <input type="text" name="ma_nv" required>
            </div>
            <div class="form-group">
                <label>Tên Nhân Viên:</label>
                <input type="text" name="ten_nv" required>
            </div>
            <div class="form-group">
                <label>Giới Tính:</label>
                <select name="phai" required>
                    <option value="NAM">Nam</option>
                    <option value="NU">Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label>Nơi Sinh:</label>
                <input type="text" name="noi_sinh" required>
            </div>
            <div class="form-group">
                <label>Phòng Ban:</label>
                <select name="ma_phong" required>
                    <?php foreach ($departments as $department): ?>
                        <option value="<?php echo htmlspecialchars($department['Ma_Phong']); ?>">
                            <?php echo htmlspecialchars($department['Ten_Phong']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Lương:</label>
                <input type="number" name="luong" required>
            </div>
            <button type="submit">Thêm</button>
        </form>
    </div>
</body>
</html>