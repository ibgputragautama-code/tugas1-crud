
<?php
require __DIR__ . '/inc/config.php';
$product = new Product();
$products = $product->getAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
    css/style.css
</head>
<body>
<h1>Daftar Produk</h1>
<?php Utility::showFlash(); ?>

create.phpTambah Produk</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Status</th>
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
            <td><?= $p['status'] ?></td>
            <td>
                <a href="edit.php?id=<?= $p['id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $p['id'] ?>" onclick="return confirm('Hapus produk ini?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7" style="text-align:center;">Belum ada data produk.</td>
        </tr>
    <?php endif; ?>
</table>
</body>
</html>
