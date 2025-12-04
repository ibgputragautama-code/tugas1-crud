<?php
require __DIR__ . '/inc/config.php';
$product = new Product();
$products = $product->getAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Daftar Produk</h1>
<nav>
    <a href="index.php">Home</a> | 
    <a href="create.php">Tambah Produk</a>
</nav>
<?php Utility::showFlash(); ?>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Status</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>
    <?php if (!empty($products)): ?>
        <?php foreach($products as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= htmlspecialchars($p['name']) ?></td>
            <td><?= htmlspecialchars($p['category']) ?></td>
            <td><?= number_format($p['price'], 2) ?></td>
            <td><?= $p['stock'] ?></td>
            <td><?= htmlspecialchars($p['status']) ?></td>
            <td>
                <?php if (!empty($p['image'])): ?>
                    <img src="uploads/<?= htmlspecialchars($p['image']) ?>" width="80">
                <?php else: ?>
                    -
                <?php endif; ?>
            </td>
            <td>
                <a href="edit.php?id=<?= $p['id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $p['id'] ?>" onclick="return confirm('Hapus produk ini?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="8" style="text-align:center;">Belum ada data produk.</td></tr>
    <?php endif; ?>
</table>
</body>
</html>
