<?php
  if ($_SESSION['status'] != 'admin') {
    echo"<script>alert('Anda Bukan Admin');window.location='../index.php';</script>";
  }
?>
					<div class="col-lg-12">
                            <h1 class="page-header">Data Petugas</h1>
                            
							<a href="" class="btn btn-primary " data-toggle="modal" data-target="#tambahdata">Tambah Data</a>
							<div class="card " style="margin-top: 3%">
							  <div class="card-body">
										<table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
										        <thead>
										            <tr>
										                <th>No</th>
		                                                <th>Nama Petugas</th>
														<th>Username</th>
                            <th>Password</th>
														<th class="text-center">Status</th>
														
														<th>Aksi</th>
										                
										            </tr>
										        </thead>
										        <tbody>
										             <?php 
                                                include '../koneksi.php';
                                                $no = 1;
                                                $data = mysqli_query($koneksi,"select * from tb_login");
                                                while($d = mysqli_fetch_array($data)){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $d['nama_user']; ?></td>
                                                        <td><?php echo $d['username']; ?></td>
                                                        <td><?php echo $d['password']; ?></td>
                                                        <?php
                                                          if ($d['status']=='aktif') {
                                                            $btn="btn-success";
                                                            $status="Aktif";
                                                          }else{
                                                            $btn="btn-danger";
                                                            $status="Non-Aktif";
                                                          }
                                                          
                                                        ?>

                                                        <td class="text-center"><a href="petugas/ubahstatus.php?id=<?=$d['id']?>" class="btn <?=$btn?>"><?=$status?></a>
                                                          </td>
                                                        <td><!-- 
                                                        <a href="#" class="btn btn-info"><i class="fa fa-info-circle" wh aria-hidden="true"></i></a> -->
                                                        <a href="?pg=editpetugas&id=<?=$d['id']?>" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a href="petugas/hapuspetugas.php?id=<?=$d['id']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                }
                                                ?>
										            
										            
										        </tbody>
										        <tfoot>
										            <tr>
										            	<th>No</th>
                                                        <th>Nama Petugas</th>
                                                        <th>Username</th>
                                                        <th>Password</th>
                                                        
                                                        <th>Aksi</th>
										            </tr>
										        </tfoot>
										    </table>
							  </div>
							</div>
							    
                
                    </div>

                    <!-- modal -->
     <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Masukan Data Rekening</h2>
        
          
        </button>
      </div>
      <div class="modal-body">
        
      	<!-- form -->

              <form method="POST">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Petugas</label>
                    <input type="text" class="form-control" name="nama">
                    
                  </div><br>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label ">Username</label>
                    <input type="text" class="form-control " name="username">
                  </div><br>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label ">Password</label>
                    <input type="password" class="form-control form-password" name="password">
                  </div><br>

                <label class="form-label">Akses </label>
                <select class="form-control" name="akses">
                  <option value="admin">Admin</option>
                  <option value="petugas">Petugas</option>
                  
                </select><br>
                
                  <div class="icheck-primary">
              <input type="checkbox" id="remember" class="form-checkbox">
              <label for="remember">
                Show Password
              </label>
            </div>
                  <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            </form>


      
    </div>
  </div>
</div>
<?php

if (isset($_POST['simpan'])) {
        $nama=$_POST['nama'];
        $username=$_POST['username'];
        $password=MD5($_POST['password']);
        $akses=$_POST['akses'];
        $cek=($koneksi->query("SELECT * FROM tb_login WHERE username='$username'"))->fetch_array();
        if (isset($cek)) {
          echo "<script>alert('Username Sudah Ada'); window.locaion='?pg=petugas';</script>";
        }else{
          $tambah=$koneksi->query("INSERT INTO tb_login (nama_user, username, password, level) VALUES ('$nama', '$username','$password','$akses')");
          if ($tambah) {
            echo "<script>window.location='?pg=petugas';</script>";
          }
        }
        
}
 ?>