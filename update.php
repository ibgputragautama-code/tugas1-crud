<?php
require __DIR__ . '/inc/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = new Product();
    $product->update($_POST['id'], $_POST['name'], $_POST['category'], $_POST['price'], $_POST['stock'], $_POST['status']);
    Utility::setFlash('Produk berhasil diupdate!');
    header('Location: list.php');
    exit;
}
