					<style type="text/css">
                        .scrollme {
                        overflow-x: auto;
                            }               
                    </style>
                    <div class="col-lg-12">
                            <h1 class="page-header">Detail Rekening</h1>
                            
							<!-- <a href="" class="btn btn-primary " data-toggle="modal" data-target="#tambahdata">Tambah Data</a> -->
							<div class="card " style="margin-top: 3%">
							  <div class="card-body">

                                <div class="scrollme">                        
                                 <table class="table table-responsive"> 
                                    <?php 
                                                include '../koneksi.php';
                                                $id = $_GET['id'];
                                                $data = mysqli_query($koneksi,"select * from tbrekening WHERE idrekening = '$id'");
                                                while($d = mysqli_fetch_array($data)){
                                                    ?>
                                                    <tr>
                                                <th>SKPD</th>
                                                        <td><?php echo $d['SKPD']; ?></td>
                                                       
                                                        <th>Kode Rekening</th>
                                                          <td><?php echo $d['kode_rekening']; ?></td>
                                                     
                                                    </tr>
                                                    <tr>
                                                        <th>Nama</th>
                                                           <td><?php echo $d['nama']; ?></td>
                                                      
                                                        <th>Tanggal</th>
                                                          <td><?php echo $d['tanggal']; ?></td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        
                                                        <th>Belanja TU</th>
                                                        <td><?php echo $d['belanja_tu']; ?></td>
                                                    
                                                        <th>Belanja LS</th>
                                                        <td><?php echo $d['belanja_ls']; ?></td>
                                                    </tr>
                                                     <tr>
                                                        
                                                    

                                                        <th>Belanja UP</th>
                                                        <td><?php echo $d['belanja_up']; ?></td>
                                                         <th>Uraian</th>
                                                        <td><?php echo $d['uraian']; ?></td>
                                                    </tr>
                                                     
                                                    
                                                    <?php 
                                                }
                                                ?>
                                          </table>
                                          <td>
                                                        
                                                        <a href="?pg=editrekening&id=<?=$_GET['id'];?>" class="btn btn-success "><i class="fa fa-pencil-square-o" aria-hidden="true">  EDIT</i></a>
                                                        <a href="datarekening/hapusrekening.php?id=<?=$_GET['id'];?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true">  HAPUS</i></a>
                                                        <a href="?pg=datarekening" class="btn btn-info"><i class="fa fa-arrow-left" aria-hidden="true"> KEMBALI</i></a>
                                                        </td>
                                             </div>

                                       
										 
							  </div>
							</div>
							    
                
                    </div>

                    <!-- modal -->
     <!-- Button trigger modal -->

<!-- Modal -->
