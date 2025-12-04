<?php
require __DIR__ . '/inc/config.php';
$product = new Product();
$data = $product->getById($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Edit Produk</h1>

<nav>
    <a href="index.php">Home</a> | 
    <a href="list.php">Lihat Produk</a>
</nav>

<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <label>Nama:</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>" required><br><br>

    <label>Kategori:</label><br>
    <input type="text" name="category" value="<?= htmlspecialchars($data['category']) ?>" required><br><br>

    <label>Harga:</label><br>
    <input type="number" step="0.01" name="price" value="<?= $data['price'] ?>" required><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stock" value="<?= $data['stock'] ?>" required><br><br>

    <label>Status:</label><br>
    <input type="text" name="status" value="<?= htmlspecialchars($data['status']) ?>" required><br><br>

    <button type="submit">Update</button>
</form>
</body>
</html>
