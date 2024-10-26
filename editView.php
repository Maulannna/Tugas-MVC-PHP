<?php
require_once 'config/database.php';
require_once 'app/controllers/userController.php';

// Koneksi ke database
$dbConnection = getDBConnection();

// Mendapatkan ID dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Membuat instance userController
$controller = new userController($dbConnection);

// Mengedit pengguna
$controller->edit($id);
?>
