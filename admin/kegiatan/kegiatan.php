					<div class="col-lg-12">
                            <h1 class="page-header">Data Kegiatan</h1>
                            
							<a href="" class="btn btn-primary " data-toggle="modal" data-target="#tambahdata">Tambah Data</a>
							<div class="card " style="margin-top: 3%">
							  <div class="card-body">
										<table id="example" class="table table-striped " style="width:100%">
										        <thead>
										            <tr>
										                <th>No</th>
		                                                
                                                        <th>KODE</th>
                                                        <th>Nama Kegiatan</th>
                                                        
														<th>Aksi</th>
										                
										            </tr>
										        </thead>
										        <tbody>
                                              <?php 
                                                include '../koneksi.php';
                                                $no = 1;
                                                $data = mysqli_query($koneksi,"select * from tb_kegiatan");
                                                while($d = mysqli_fetch_array($data)){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $d['kode']; ?></td>
                                                        <td><?php echo $d['nama_kegiatan']; ?></td>
                                                        <td>
                                                        <a href="#" class="btn btn-info"><i class="fa fa-info-circle" wh aria-hidden="true"></i></a>
                                                        <a href="#" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a href="#" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                }
                                                ?>
										            
										            
										        </tbody>
										        <tfoot>
										            <tr>
										            	<th>No</th>
		                                                <th>KODE</th>
														<th>Nama Kegiatan</th>
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
        <h2 class="modal-title" id="exampleModalLabel">Masukan Kas</h2>
        
          
        </button>
      </div>
      <div class="modal-body">
        
      	<!-- form -->

			<form>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputFirstname">SKPD</label>
                        <input type="number" class="form-control" id="inputFirstname" placeholder="SKPD">
                    </div>
                    <div class="col-sm-3">
                        <label for="inputState">No Urut</label>
                        <input type="number" class="form-control" id="inputState" placeholder="No Urut">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputAddressLine1">Tanggal</label>
                        <input type="date" class="form-control" id="inputAddressLine1" >
                    </div>
                    <div class="col-sm-6">
                        <label for="inputAddressLine2">No Rekening</label>
                        <input type="number" class="form-control" id="inputAddressLine2" placeholder="Rekening">
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
                        <input type="number" class="form-control" id="inputContactNumber" placeholder="Saldo">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputPostalCode">Total</label>
                        <input type="text" class="form-control" id="inputPostalCode" placeholder="Total">
                    </div
                </div>
                
            </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>