<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$config = require 'config.php';

$menu = $_GET['menu'] ?? 'mainpage';
$menus = $config['menus'];

// Show/hide menu items based on login status
if (isset($_SESSION['user'])) {
    unset($menus['login']);
} else {
    unset($menus['logout']);
    unset($menus['messages']);
}

require 'templates/header.php';
require 'templates/menu.php';

$controller = "controllers/$menu.php";
if (file_exists($controller)) {
    require $controller;
} else {
    echo "<h2>Page not found</h2>";
}

require 'templates/footer.php';
?>