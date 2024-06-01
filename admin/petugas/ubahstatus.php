<?php
include '../../koneksi.php';
	$cek=($koneksi->query("SELECT status FROM tb_login WHERE id='".$_GET['id']."'"))->fetch_array();
	if ($cek['status']=='aktif') {
		$ubah=$koneksi->query("UPDATE tb_login SET status='non-aktif' WHERE id='".$_GET['id']."'");
		
	}else{
		$ubah=$koneksi->query("UPDATE tb_login SET status='aktif' WHERE id='".$_GET['id']."'");
	}

		if ($koneksi) {
			echo "<script>window.location='../index.php?pg=petugas';</script>";
		}

?>