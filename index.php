<?php require __DIR__ . '/inc/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Produk</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Home</h1>
    <nav>
        <a href="list.php">Lihat Produk</a> | 
        <a href="create.php">Tambah Produk</a>
    </nav>
    <?php Utility::showFlash(); ?>
</body>
</html>
