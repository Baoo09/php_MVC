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
            background-color: #f9f9f9;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input:focus, select:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            display: inline-block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            margin-top: 15px;
        }

        button:hover {
            background-color: #0056b3;
        }

        p.error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
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
                <label for="ma_nv">Mã Nhân Viên:</label>
                <input type="text" name="ma_nv" id="ma_nv" required>
            </div>
            <div class="form-group">
                <label for="ten_nv">Tên Nhân Viên:</label>
                <input type="text" name="ten_nv" id="ten_nv" required>
            </div>
            <div class="form-group">
                <label for="phai">Giới Tính:</label>
                <select name="phai" id="phai" required>
                    <option value="NAM">Nam</option>
                    <option value="NU">Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="noi_sinh">Nơi Sinh:</label>
                <input type="text" name="noi_sinh" id="noi_sinh" required>
            </div>
            <div class="form-group">
                <label for="ma_phong">Phòng Ban:</label>
                <select name="ma_phong" id="ma_phong" required>
                    <?php foreach ($departments as $department): ?>
                        <option value="<?php echo htmlspecialchars($department['Ma_Phong']); ?>">
                            <?php echo htmlspecialchars($department['Ten_Phong']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="luong">Lương:</label>
                <input type="number" name="luong" id="luong" required>
            </div>
            <button type="submit">Thêm</button>
        </form>
    </div>
</body>
</html>