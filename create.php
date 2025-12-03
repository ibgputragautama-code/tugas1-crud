
<?php
require __DIR__ . '/inc/config.php';
$prefill = Utility::getPrefill(['name','category','price','stock','status']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    css/style.css
</head>
<body>
<h1>Tambah Produk</h1>
<?php Utility::showFlash(); ?>
save.php
<input type="text" name="name" placeholder="Nama" value="<?= $prefill['name'] ?>" required>
<input type="text" name="category" placeholder="Kategori" value="<?= $prefill['category'] ?>" required>
<input type="number" name="price" placeholder="Harga" value="<?= $prefill['price'] ?>" required>
<input type="number" name="stock" placeholder="Stok" value="<?= $prefill['stock'] ?>" required>
<select name="status">
<option value="active" <?= ($prefill['status']=='active')?'selected':''; ?>>Aktif</option>
<option value="inactive" <?= ($prefill['status']=='inactive')?'selected':''; ?>>Nonaktif</option>
</select>
<input type="file" name="image">
<button type="submit">Simpan</button>
</form>
</body>
</html>
