<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

const DB_HOST = 'localhost';
const DB_NAME = 'crud_app';
const DB_USER = 'root';
const DB_PASS = '';
const BASE_URL = 'http://localhost/tugas1-crud/';

spl_autoload_register(function ($class) {
    $file = __DIR__ . '/../class/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
