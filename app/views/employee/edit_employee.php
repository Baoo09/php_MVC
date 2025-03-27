<?php require_once 'app/views/shares/header.php'; ?>
    <h2>SỬA NHÂN VIÊN</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="index.php?controller=employee&action=handleEdit" method="POST">
        <input type="hidden" name="ma_nv" value="<?php echo $employee['Ma_NV']; ?>">
        <label>Mã Nhân Viên:</label><br>
        <input type="text" value="<?php echo $employee['Ma_NV']; ?>" disabled><br>
        <label>Tên Nhân Viên:</label><br>
        <input type="text" name="ten_nv" value="<?php echo $employee['Ten_NV']; ?>" required><br>
        <label>Giới Tính:</label><br>
        <select name="phai" required>
            <option value="NAM" <?php echo $employee['Phai'] == 'NAM' ? 'selected' : ''; ?>>Nam</option>
            <option value="NU" <?php echo $employee['Phai'] == 'NU' ? 'selected' : ''; ?>>Nữ</option>
        </select><br>
        <label>Nơi Sinh:</label><br>
        <input type="text" name="noi_sinh" value="<?php echo $employee['Noi_Sinh']; ?>" required><br>
        <label>Phòng Ban:</label><br>
        <select name="ma_phong" required>
            <?php foreach ($departments as $department): ?>
                <option value="<?php echo $department['Ma_Phong']; ?>" <?php echo $employee['Ma_Phong'] == $department['Ma_Phong'] ? 'selected' : ''; ?>>
                    <?php echo $department['Ten_Phong']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        <label>Lương:</label><br>
        <input type="number" name="luong" value="<?php echo $employee['Luong']; ?>" required><br><br>
        <button type="submit">Cập Nhật</button>
    </form>
</body>
</html>