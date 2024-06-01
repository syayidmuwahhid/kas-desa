<?php 
// koneksi database
include '../../koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data dari database
$hapus=mysqli_query($koneksi,"delete from tb_login where id='$id'");

// mengalihkan halaman kembali ke index.php
if($hapus){
	header("location:../index.php?pg=petugas");
}

?>