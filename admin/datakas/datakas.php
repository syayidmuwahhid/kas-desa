					<div class="col-lg-12">
                            <h1 class="page-header">Data Pemasukan</h1>
                            <div class="row">
                                <div class="col-md-12 bg-success">
                                    <?php                                  
                                    $hitung=($koneksi->query("SELECT SUM(penerimaan) AS pemasukan FROM tbbku_pengeluaran"))->fetch_array();
                                    $bulanini=date('Y-m-d');
                                    $hitunglalu=($koneksi->query("SELECT SUM(penerimaan) AS pemasukan FROM tbbku_pengeluaran WHERE MONTH(tanggal) ='".date('m', strtotime('-1 month', strtotime( $bulanini )))."'"))->fetch_array();
                                    ?>
                                    <h4>Pemasukan Bulan Lalu : <b>Rp. <?=number_format($hitunglalu['pemasukan'],0,',','.')?></b></h4>
                                    <h4>Total Pemasukan : <b>Rp. <?=number_format($hitung['pemasukan'],0,',','.')?></b></h4>
                                </div>
                                
                            </div><br>
                            
							<a href="" class="btn btn-primary " data-toggle="modal" data-target="#tambahdata">Tambah Data</a>
                            <!-- Default dropright button -->
                            <div class="btn-group dropright">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Cetak
                                </button>
                                <div class="dropdown-menu">
                                <!-- Dropdown menu links -->
                                    <a href="" data-toggle="modal" data-target="#cetakharian">Harian</a><br>
                                    <a href="" data-toggle="modal" data-target="#cetakmingguan">Mingguan</a><br>
                                    <a href="" data-toggle="modal" data-target="#cetakbulanan">Bulanan</a>
                                </div>
                            </div>

							<div class="card " style="margin-top: 2%">
    							  <div class="card-body">
    										<table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
										        <thead>
										            <tr>
										                <th class="text-center">No</th>
														<th class="text-center">Tanggal</th>
														<th class="text-center">Uraian Pemasukan</th>
                                                        <th class="text-center">Pemasukan</th>
														<th class="text-center">Aksi</th>
										            </tr>
										        </thead>
										        <tbody>
										                <?php 
                                                include '../koneksi.php';
                                                $no = 1;
                                                $data = mysqli_query($koneksi,"SELECT * FROM tbbku_pengeluaran ORDER BY tanggal DESC");
                                                while($d = mysqli_fetch_array($data)){
                                                    $tanggal=date('d F Y', strtotime($d['tanggal']));
                                                    ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $no++; ?></td>
                                                        <td class="text-center"><?php echo $tanggal; ?></td>
                                                        <td><?php echo $d['uraian']; ?></td>
                                                        <td><?php echo number_format($d['penerimaan'],0,',','.'); ?></td>
                                                        <td class="text-center">
                                                        <a href="?pg=detailkas&&id=<?=$d[0];?>" class="btn btn-info"><i class="fa fa-info-circle" wh aria-hidden="true"></i></a>
                                                        <a href="?pg=editkas&id=<?=$d[0]?>" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a href="datakas/hapuskas.php?id=<?=$d[0]; ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                }
                                                ?>
                                                    
										            
										        </tbody>
										        <tfoot>
										            <tr>
										            	<th class="text-center">No</th>
                                                        <th class="text-center">Tanggal</th>
                                                        <th class="text-center">Uraian Pemasukan</th>
                                                        <th class="text-center">Pemasukan</th>
                                                        <th class="text-center">Aksi</th>
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

			<form method="POST">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="inputAddressLine1">Tanggal</label>
                        <input type="date" class="form-control" id="inputAddressLine1" name="tanggal" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="inputPostalCode">Uraian Pemasukan</label>
                        <textarea name="uraian" id="inputPostalCode" class="form-control" placeholder="Uraian Pemasukan"></textarea>
                        
                    </div>                    
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="inputPostalCode">Penerimaan</label>
                        <input type="number" class="form-control" id="inputPostalCode" name="terima" placeholder="Jumlah Uang">
                    </div>
                </div>
                
            </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="tambah">Save changes</button>
      </div>
    </div>
                 </form>
     
            

      </div>
     
    </div>
  </div>
</div>
  
 <?php

if (isset($_POST['tambah'])) {
        $tanggal=$_POST['tanggal'];
        $uraian=$_POST['uraian'];
        $penerimaan=$_POST['terima'];

        $tambah=$koneksi->query("INSERT INTO tbbku_pengeluaran (tanggal, uraian, penerimaan) VALUES ('$tanggal', '$uraian', '$penerimaan')");
        if ($tambah) {
            $r=($koneksi->query("SELECT idbku FROM tbbku_pengeluaran WHERE tanggal='$tanggal' AND uraian='$uraian' AND penerimaan='$penerimaan'"))->fetch_array();
            $idmasuk=$r['idbku'];
            $tambah2=$koneksi->query("INSERT INTO tbrekening (tanggal, uraian, pemasukan, pengeluaran, jenistransaksi, idmasuk) VALUES ('$tanggal', '$uraian', '$penerimaan', '0', 'Pemasukan', '$idmasuk')");
            if ($tambah AND $tambah2) {
                echo "<script>window.location='?pg=datakas';</script>";
            }
        }
        
}
 ?>


<!-- modal cetak harian-->
<!-- Modal -->
<div class="modal fade" id="cetakharian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Pilih Tanggal</h2>
        
          
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
            <input type="date" name="tanggal" class="form-control" required="">
            <input type="hidden" name="ket" value="harian">
        
        
        <!-- form -->

            
      </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="cetakharian">Cetak</button>
        </form>
        <?php
            if (isset($_POST['cetakharian'])) {
                $tanggal=$_POST['tanggal'];
                $ket=$_POST['ket'];

                $sql = mysqli_query($koneksi,"SELECT * FROM tbbku_pengeluaran WHERE tanggal = '$tanggal'");
                $data = mysqli_fetch_array($sql);
                $cek = mysqli_num_rows($sql);
                if ($cek==0) {
                    echo "<script>alert('Data Tidak Di Temukan');window.location='?pg=datakas';</script>";
                }else{
                    echo "<script>window.location='laporan/cetakpemasukan.php?tanggal=".$tanggal."&ket=".$ket."';</script>";
                }
            }
        ?>
      </div>
    </div>
     
            

      </div>
     
    </div>
  </div>
</div>


<!-- modal cetak mingguan-->
<!-- Modal -->
<div class="modal fade" id="cetakmingguan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Pilih Tanggal</h2>
        
          
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
            Dari : 
            <input type="date" name="dari" class="form-control" required=""><br>
            Sampai dengan : 
            <input type="date" name="sampai" class="form-control" required=""><br>
            <input type="hidden" name="ket" value="mingguan">

            
        
        
        <!-- form -->

            
      </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="cetakmingguan">Cetak</button>
        <?php
            if (isset($_POST['cetakmingguan'])) {
                $ket=$_POST['ket'];
                $dari=$_POST['dari'];
                $sampai=$_POST['sampai'];
                $tgl1 = new DateTime($dari);
                $tgl2 = new DateTime($sampai);
                $d = $tgl2->diff($tgl1)->days;
                if ($d > 7 OR $d < 7) {
                    echo "<script>alert('Tanggal Lebih/Kurang dari 7 hari'); window.location='?pg=datakas';</script>";
                }else{
                    echo "<script>window.location='laporan/cetakpemasukan.php?dari=".$dari."&sampai=".$sampai."&ket=".$ket."';</script>";
                }
            }
            
?>
        </form>
        
      </div>
    </div>
     
            

      </div>
     
    </div>
  </div>
</div>

<!-- cetak bulanan-->
<!-- Modal -->
<div class="modal fade" id="cetakbulanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Pilih Tanggal</h2>
        
          
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
            <input type="hidden" name="ket" value="bulanan">
            <select name="tahun-bulan" class="form-control">
                <?php
                $qry=mysqli_query($koneksi, "SELECT tanggal FROM tbbku_pengeluaran GROUP BY month(tanggal) ORDER BY tanggal DESC");
                while($t=mysqli_Fetch_array($qry)){
                    $data = explode('-',$t['tanggal']);
                    $tahun = $data[0];
                    $bulan = $data[1];
                    switch ($bulan) {
                        case 1:
                            $namabulan="januari";
                            break;
                        case 2:
                            $namabulan="Februari";
                            break;
                        case 3:
                            $namabulan="Maret";
                            break;
                        case 4:
                            $namabulan="April";
                            break;
                        case 5:
                            $namabulan="Mei";
                            break;
                        case 6:
                            $namabulan="Juni";
                            break;
                        case 7:
                            $namabulan="Juli";
                            break;
                        case 8:
                            $namabulan="Agustus";
                            break;
                        case 9:
                            $namabulan="September";
                            break;
                        case 10:
                            $namabulan="Oktober";
                            break;
                        case 11:
                            $namabulan="November";
                            break;
                        case 12:
                            $namabulan="Desember";
                            break;
                        
                        default:
                            $namabulan=null;
                            break;
                    }
                    echo "<option value='".$tahun."-".$bulan."'>$namabulan - $tahun</option>";
                }
                ?>
            </select>
        

            
        
        
        <!-- form -->

            
      </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="cetakbulanan">Cetak</button>
        <?php
            if (isset($_POST['cetakbulanan'])) {
                $ket=$_POST['ket'];
                $tahunbulan=$_POST['tahun-bulan'];
                $dataa = explode('-',$tahunbulan);
                echo "<script>window.location='laporan/cetakpemasukan.php?tahun=".$dataa[0]."&bulan=".$dataa[1]."&ket=".$ket."';</script>";
                
            }
            
?>
        </form>
        
      </div>
    </div>
     
            

      </div>
     
    </div>
  </div>
</div>

