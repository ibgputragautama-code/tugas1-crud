
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

const DB_HOST = 'localhost';
const DB_NAME = 'crud_app';
const DB_USER = 'root';
const DB_PASS = '';
const BASE_URL = 'http://localhost:8000/';

spl_autoload_register(function ($class) {
    include __DIR__ . '/../class/' . $class . '.php';
});
?>
