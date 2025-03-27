<?php
require_once 'config/database.php';
require_once 'app/models/Product.php';
require_once 'app/models/EmployeeModel.php';
require_once 'app/controllers/EmployeeController.php';

//Kết nối database
// $db = new Database();
// $conn = $db->getConnection();

// Kiểm tra tham số GET
$_controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'EmployeeController';
$_action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

// Kiểm tra sự tồn tại của file controller
$controllerPath = 'app/controllers/' . $_controllerName . '.php';
if (!file_exists($controllerPath)) {
    die('Error 404: Controller not found');
}
require_once $controllerPath;

// Khởi tạo controller
if (!class_exists($_controllerName)) {
    die('Error 500: Controller class not found');
}
$_controller = new $_controllerName();

// Kiểm tra action có tồn tại trong controller không
if (!method_exists($_controller, $_action)) {
    die('Error 404: Action not found');
}

// Gọi action tương ứng
if ($id !== null) {
    call_user_func(array($_controller, $_action), $id);
} else {
    call_user_func(array($_controller, $_action));
}
?>
