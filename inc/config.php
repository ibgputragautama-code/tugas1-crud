
<?php
// Pastikan ini adalah baris pertama tanpa spasi atau newline
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Mulai session jika belum aktif
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Konfigurasi database
const DB_HOST = 'localhost';
const DB_NAME = 'crud_app';
const DB_USER = 'root';
const DB_PASS = '';
const BASE_URL = 'http://localhost:8000/';

// Autoload class
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/../class/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
