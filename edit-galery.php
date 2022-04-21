<?php 
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM tb_infinity WHERE id = '".$_GET['id']."'");
$r =mysqli_fetch_array($data);
$judul = $r['judul'];
$deskripsi = $r['deskripsi'];
$gambar = $r['gambar']; 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>edit</h1>
    <form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="judul" value="<?php echo $judul ?>">
    <input type="text" name="deskripsi"  value="<?php echo $deskripsi ?>">
    <input type="hidden" name="img" value="<?php echo $gambar ?>"">
    <input type="file" name="gambar">
    <img src="uploads/<?php echo $gambar ?>" alt="" width="150"  height="100">
    <input type="submit" name="kirim" value="update">
    </form>

    <a href="list-poto.php">cek</a>
</body>
<?php

include 'koneksi.php';
if (isset($_POST['kirim'])){
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = './uploads/';

    if ($nama_file != ''){
       move_uploaded_file($source,$folder.$nama_file);
       $update = mysqli_query($conn, "UPDATE tb_infinity SET 
       judul = '".$judul."',
        deskripsi ='".$deskripsi."',
        gambar ='".$nama_file."'
       WHERE id = '".$_GET['id']."'
       ");

       if ($update){
           echo "berhasil update";
       } else {
           echo"gagal update";
       }
    }else {
        move_uploaded_file($source,$folder.$nama_file);
       $update = mysqli_query($conn, "UPDATE tb_infinity SET 
       judul = '".$judul."',
       deskripsi ='".$deskripsi."',
       gambar ='".$nama_file."'
       WHERE id = '".$_GET['id']."'
       ");

if ($update){
    echo "berhasil update";
}
else {
    echo"gagal update";
}
    }

}
?>
</html>