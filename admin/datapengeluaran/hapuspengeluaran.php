<?php 
// koneksi database
include '../../koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data dari database
$hapus=mysqli_query($koneksi,"delete from tbbukti_pengeluaran where idbukti='$id'");
$hapustrans=mysqli_query($koneksi,"delete from tbrekening where idkeluar='$id'");

// mengalihkan halaman kembali ke index.php
if($hapus AND $hapustrans){
	header("location:../index.php?pg=datapengeluaran");
}

?>