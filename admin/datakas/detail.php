					<style type="text/css">
                        .scrollme {
                        overflow-x: auto;
                            }               
                    </style>
                    <div class="col-lg-12">
                            <h1 class="page-header">Detail Kas</h1>
                            
							
							<div class="card " style="margin-top: 3%">
							  <div class="card-body">

                                <div class="scrollme">                        
                                 <table class="table table-responsive"> 
                                    <?php 
                                                include '../koneksi.php';
                                                $id = $_GET['id'];
                                                $data = mysqli_query($koneksi,"select * from tbbku_pengeluaran WHERE idbku = '$id'");
                                                while($d = mysqli_fetch_array($data)){
                                                    ?>
                                                    <tr>
                                                        <th>Tanggal</th>
                                                           <td><?php echo $d['tanggal']; ?></td>
                                                      
                                                        
                                                        
                                                    </tr>
                                                    <tr>
                                                    
                                                    
                                                        <th>Uraian</th>
                                                        <td><?php echo $d['uraian']; ?></td>
                                                    </tr>
                                                     <tr>
                                                        <th>Penerimaan</th>
                                                        <td><?php echo $d['penerimaan']; ?></td>
                                                    
                                                        
                                                    
                                                    </tr>
                                                    
                                                    <?php 
                                                }
                                                ?>
                                          </table>
                                          <td>
                                                        
                                                        <a href="?pg=editkas&id=<?=$_GET['id']?>" class="btn btn-success "><i class="fa fa-pencil-square-o" aria-hidden="true">  EDIT</i></a>
                                                        <a href="datakas/hapuskas.php?id=<?=$_GET['id'] ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true">  HAPUS</i></a>
                                                        <a href="?pg=datakas" class="btn btn-info"><i class="fa fa-arrow-left" aria-hidden="true"> KEMBALI</i></a>
                                                        </td>
                                             </div>

                                       
										 
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
        <h2 class="modal-title" id="exampleModalLabel">Masukan Kas</h2>
        
          
        </button>
      </div>
      <div class="modal-body">
        
      	<!-- form -->

			<form method="POST">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputFirstname">SKPD</label>
                        <input type="number" class="form-control" id="inputFirstname" placeholder="SKPD" name="skpd">
                    </div>
                    <div class="col-sm-3">
                        <label for="inputState">No Urut</label>
                        <input type="number" class="form-control" id="inputState" placeholder="No Urut" name="nourut">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputAddressLine1">Tanggal</label>
                        <input type="date" class="form-control" id="inputAddressLine1" name="tanggal">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputAddressLine2">No Rekening</label>
                        <input type="number" class="form-control" id="inputAddressLine2" placeholder="Rekening" name="koderekening">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputCity">Jumlah Sekarang</label>
                        <input type="text" class="form-control" id="inputCity" placeholder="Jumlah Sekarang">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputState">Jumlah Bulan Lalu</label>
                        <input type="text" class="form-control" id="inputState" placeholder="Bulan Lalu">
                    </div>
                    
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputContactNumber">Saldo</label>
                        <input type="number" class="form-control" id="inputContactNumber" placeholder="Saldo" name="saldo">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputPostalCode">Total</label>
                        <input type="text" class="form-control" id="inputPostalCode" placeholder="Total">
                    </div>
                </div>
            </div>
        </form>
    </div>
             
            </form>
            

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="tambah">Save changes</button>
      </div>
    </div>
  </div>
</div>
  
 <?php

if (isset($_POST['tambah'])) {
    
}
 ?>