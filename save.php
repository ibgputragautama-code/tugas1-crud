
<?php
require __DIR__ . '/inc/config.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
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
            Utility::redirect('create.php','File harus JPG atau PNG',['name'=>$name,'category'=>$category,'price'=>$price,'stock'=>$stock,'status'=>$status]);
        }
        if($fileSize > $maxSize){
            Utility::redirect('create.php','Ukuran file maksimal 2MB',['name'=>$name,'category'=>$category,'price'=>$price,'stock'=>$stock,'status'=>$status]);
        }

        $targetDir=__DIR__.'/uploads/';
        if(!is_dir($targetDir)) mkdir($targetDir);
        $fileName=time().'_'.basename($_FILES['image']['name']);
        $targetFile=$targetDir.$fileName;
        move_uploaded_file($_FILES['image']['tmp_name'],$targetFile);
        $image_path=$fileName;
    }

    $product=new Product();
    $product->name=$name;
    $product->category=$category;
    $product->price=$price;
    $product->stock=$stock;
    $product->status=$status;
    $product->image_path=$image_path;

    if($product->save()){
        Utility::clearPrefill();
        Utility::redirect('list.php','Produk berhasil ditambahkan');
    }else{
        Utility::redirect('create.php','Gagal menambahkan produk',['name'=>$name,'category'=>$category,'price'=>$price,'stock'=>$stock,'status'=>$status]);
    }
}
?>
