<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Nhân Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            width: 60%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 12px;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        p.error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php require_once 'app/views/shares/header.php'; ?>

        <h2>Sửa Nhân Viên</h2>

        <?php if (isset($error)): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form action="index.php?controller=employee&action=handleEdit" method="POST">
            <input type="hidden" name="ma_nv" value="<?php echo htmlspecialchars($employee['Ma_NV']); ?>">

            <div class="form-group">
                <label>Mã Nhân Viên:</label>
                <input type="text" value="<?php echo htmlspecialchars($employee['Ma_NV']); ?>" disabled>
            </div>
            <div class="form-group">
                <label>Tên Nhân Viên:</label>
                <input type="text" name="ten_nv" value="<?php echo htmlspecialchars($employee['Ten_NV']); ?>" required>
            </div>
            <div class="form-group">
                <label>Giới Tính:</label>
                <select name="phai" required>
                    <option value="NAM" <?php echo $employee['Phai'] == 'NAM' ? 'selected' : ''; ?>>Nam</option>
                    <option value="NU" <?php echo $employee['Phai'] == 'NU' ? 'selected' : ''; ?>>Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label>Nơi Sinh:</label>
                <input type="text" name="noi_sinh" value="<?php echo htmlspecialchars($employee['Noi_Sinh']); ?>" required>
            </div>
            <div class="form-group">
                <label>Phòng Ban:</label>
                <select name="ma_phong" required>
                    <?php foreach ($departments as $department): ?>
                        <option value="<?php echo htmlspecialchars($department['Ma_Phong']); ?>" 
                                <?php echo $employee['Ma_Phong'] == $department['Ma_Phong'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($department['Ten_Phong']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Lương:</label>
                <input type="number" name="luong" value="<?php echo htmlspecialchars($employee['Luong']); ?>" required>
            </div>

            <button type="submit">Cập Nhật</button>
        </form>
    </div>
</body>
</html>