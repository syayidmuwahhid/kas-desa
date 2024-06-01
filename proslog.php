<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = MD5($_POST['password']);

$sql = mysqli_query($koneksi,"SELECT * FROM tb_login WHERE username = '$username' AND password = '$password' AND status='aktif'");


$data = mysqli_fetch_array($sql);


$cek = mysqli_num_rows($sql);


if ($cek>0) {
	if ($data['level'] == "admin") {
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "admin";
		$_SESSION['id'] = $data['id'];
		header("location:admin/index.php");
	}
	else if ($data['level'] == "petugas") {
		# code...
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "petugas";
		$_SESSION['id'] = $data[0];
		header("location:admin/index.php");
	}
}
else{
	?>
<script type="text/javascript">
	alert("GAGAL LOGIN!");
	window.location="index.php";
</script>
<?php
}


?>