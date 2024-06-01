<?php
    $data = mysqli_query($koneksi,"SELECT * FROM tb_login WHERE id='".$_GET['id']."'");
    $d = mysqli_fetch_array($data);

    
       
?>

<div class="col-lg-12">
    <h1 class="page-header">Edit Data Kas</h1>
<form method="POST">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Petugas</label>
                    <input type="text" class="form-control" name="nama" value="<?=$d['nama_user']?>">
                    
                  </div><br>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label ">Username</label>
                    <input type="text" class="form-control " name="username" value="<?=$d['username']?>">
                  </div><br>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label ">Password</label>
                    <input type="password" class="form-control form-password" name="password" placeholder="Masukan Password" required="">
                  </div><br>

                <label class="form-label">Akses </label>
                <select class="form-control" name="akses">
                    <option value="<?=$d['level']?>"><?=$d['level']?></option>
                  <option value="admin">Admin</option>
                  <option value="petugas">Petugas</option>
                  
                </select><br>
                <label class="form-label">Status </label>
                <select class="form-control" name="status">
                    <option value="<?=$d['status']?>"><?=$d['status']?></option>
                  <option value="aktif">Aktif</option>
                  <option value="non-aktif">Non-Aktif</option>
                  
                </select><br>
                
                  <div class="icheck-primary">
              <input type="checkbox" id="remember" class="form-checkbox">
              <label for="remember">
                Show Password
              </label>
            </div>
                  <button type="submit" class="btn btn-secondary" name="close">Kembali</button>
                  <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
            </form>

             </div>
<?php
    if (isset($_POST['close'])) {
        echo "<script>window.location='?pg=petugas';</script>";
    }elseif (isset($_POST['tambah'])) {
        $nama=$_POST['nama'];
        $username=$_POST['username'];
        $password=MD5($_POST['password']);
        $status=$_POST['status'];
        $akses=$_POST['akses'];
        $cek=($koneksi->query("SELECT * FROM tb_login WHERE username='$username' AND id!='".$_GET['id']."'"))->fetch_array();
        if (isset($cek)) {
          echo "<script>alert('Username Sudah Ada'); window.locaion='?pg=petugas';</script>";
        }else{
          $tambah=$koneksi->query("UPDATE tb_login SET nama_user='$nama', username='$username', password='$password', level='$akses', status='$status' WHERE id='".$_GET['id']."'");
          if ($tambah) {
            echo "<script>window.location='?pg=petugas';</script>";
          }
        }
    }
?>
