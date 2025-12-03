
<?php
require __DIR__ . '/inc/config.php';
$id=$_GET['id']??0;
$product=new Product();
if($product->setById($id)){
    if($product->delete()){
        Utility::redirect('list.php','Produk berhasil dihapus');
    }else{
        Utility::redirect('list.php','Gagal menghapus produk');
    }
}else{
    Utility::redirect('list.php','Produk tidak ditemukan');
}
?>
