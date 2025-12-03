
<?php
require __DIR__ . '/inc/config.php';
$id=$_GET['id']??0;
$product=new Product();
if(!$product->setById($id)){
    Utility::redirect('list.php','Produk tidak ditemukan');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    css/style.css
</head>
<body>
<h1>Edit Produk</h1>
<?php Utility::showFlash(); ?>
update.php
<input type="hidden" name="id" value="<?= $product->id ?>">
<input type="text" name="name" value="<?= $product->name ?>" required>
<input type="text" name="category" value="<?= $product->category ?>" required>
<input type="number" name="price" value="<?= $product->price ?>" required>
<input type="number" name="stock" value="<?= $product->stock ?>" required>
<select name="status">
<option value="active" <?= ($product->status=='active')?'selected':''; ?>>Aktif</option>
<option value="inactive" <?= ($product->status=='inactive')?'selected':''; ?>>Nonaktif</option>
</select>
<input type="file" name="image">
<button type="submit">Update</button>
</form>
</body>
</html>
