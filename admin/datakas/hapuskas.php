<?php 
// koneksi database
include '../../koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data dari database
$hapus=mysqli_query($koneksi,"delete from tbbku_pengeluaran where idbku='$id'");
$hapustrans=mysqli_query($koneksi,"delete from tbrekening where idmasuk='$id'");

// mengalihkan halaman kembali ke index.php
if($hapus AND $hapustrans){
	header("location:../index.php?pg=datakas");
}

?>