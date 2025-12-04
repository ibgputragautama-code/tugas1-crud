<?php
require __DIR__ . '/inc/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imageName = null;

    if (!empty($_FILES['image']['name'])) {
        $targetDir = __DIR__ . '/uploads/';

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $safeName = preg_replace('/[^A-Za-z0-9_\.-]/', '_', basename($_FILES['image']['name']));
        $imageName = time() . "_" . $safeName;
        $targetFile = $targetDir . $imageName;

        // Pindahkan file upload
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            Utility::setFlash('Upload gambar gagal.', 'error');
            header('Location: create.php');
            exit;
        }
    }

    // Simpan data produk
    $product = new Product();
    $product->create(
        $_POST['name'],
        $_POST['category'],
        $_POST['price'],
        $_POST['stock'],
        $_POST['status'],
        $imageName
    );

    Utility::setFlash('Produk berhasil ditambahkan!', 'success');
    header('Location: list.php');
    exit;
} else {
    // Jika bukan POST, kembalikan ke form
    header('Location: create.php');
    exit;
}
