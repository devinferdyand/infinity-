<?php

include 'koneksi.php';

$delete = mysqli_query($conn, "DELETE FROM tb_infinity WHERE id = '".$_GET['id']."'");

if($delete){
    header("location:list-poto.php");
}
else{
    echo "gagal hapus";
}

?>