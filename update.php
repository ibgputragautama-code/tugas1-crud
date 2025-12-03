
<?php
require __DIR__ . '/inc/config.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $category=$_POST['category'];
    $price=$_POST['price'];
    $stock=$_POST['stock'];
    $status=$_POST['status'];
    $image_path='';

    if(isset($_FILES['image']) && $_FILES['image']['error']==0){
        $allowedTypes = ['image/jpeg','image/png'];
        $maxSize = 2 * 1024 * 1024;
        $fileType = mime_content_type($_FILES['image']['tmp_name']);
        $fileSize = $_FILES['image']['size'];

        if(!in_array($fileType,$allowedTypes)){
            Utility::redirect('edit.php?id='.$id,'File harus JPG atau PNG');
        }
        if($fileSize > $maxSize){
            Utility::redirect('edit.php?id='.$id,'Ukuran file maksimal 2MB');
        }

        $targetDir=__DIR__.'/uploads/';
        if(!is_dir($targetDir)) mkdir($targetDir);
        $fileName=time().'_'.basename($_FILES['image']['name']);
        $targetFile=$targetDir.$fileName;
        move_uploaded_file($_FILES['image']['tmp_name'],$targetFile);
        $image_path=$fileName;
    }

    $product=new Product();
    if($product->setById($id)){
        $product->name=$name;
        $product->category=$category;
        $product->price=$price;
        $product->stock=$stock;
        $product->status=$status;
        if($image_path) $product->image_path=$image_path;

        if($product->update()){
            Utility::redirect('list.php','Produk berhasil diperbarui');
        }else{
            Utility::redirect('edit.php?id='.$id,'Gagal memperbarui produk');
        }
    }else{
        Utility::redirect('list.php','Produk tidak ditemukan');
    }
}
?>
