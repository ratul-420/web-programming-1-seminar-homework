<?php
// Database connection using PDO with your provided credentials
$dbh = new PDO(
    'mysql:host=localhost;dbname=datab4',
    'datab4',
    'Munn@2002',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
);

$menus = [
    'mainpage' => 'Mainpage',
    'images' => 'Images',
    'contact' => 'Contact',
    'messages' => 'Messages',
    'login' => 'Login',
    'logout' => 'Logout'
];