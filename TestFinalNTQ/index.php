<?php
require_once 'checkLogin.php';

$controller = "";
$action = "";

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $action = $_GET['action'];
    $controller = $_GET['controller'];
}

if ($controller == '' && $action == '') {
    $controller = "UserController";
    $action = "getAllUsers";
}

include 'controllers/' . $controller . '.php';

$controller = new $controller();
$controller->$action();

?>


