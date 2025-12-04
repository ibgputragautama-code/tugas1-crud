<?php
require __DIR__ . '/inc/config.php';

if (isset($_GET['id'])) {
    $product = new Product();
    $product->delete($_GET['id']);
    Utility::setFlash('Produk berhasil dihapus!');
    header('Location: list.php');
    exit;
}
