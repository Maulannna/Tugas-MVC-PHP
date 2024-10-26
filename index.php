<?php
require_once 'config/database.php';
require_once 'app/controllers/userController.php';

// Koneksi ke database
$dbConnection = getDBConnection();

// Membuat instance userController
$controller = new userController($dbConnection);

// Menampilkan semua pengguna
$controller->index();
?>
