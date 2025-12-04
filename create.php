<?php require __DIR__ . '/inc/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Tambah Produk</h1>
<nav>
    <a href="index.php">Home</a> | 
    <a href="list.php">Lihat Produk</a>
</nav>
<form action="save.php" method="post" enctype="multipart/form-data">
    <label>Nama:</label><br>
    <input type="text" name="name" required><br><br>
    <label>Kategori:</label><br>
    <input type="text" name="category" required><br><br>
    <label>Harga:</label><br>
    <input type="number" step="0.01" name="price" required><br><br>
    <label>Stok:</label><br>
    <input type="number" name="stock" required><br><br>
    <label>Status:</label><br>
    <input type="text" name="status" required><br><br>
    <label>Gambar:</label><br>
    <input type="file" name="image" accept="image/*"><br><br>
    <button type="submit">Simpan</button>
</form>
</body>
</html>
