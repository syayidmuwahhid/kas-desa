<?php
    $data = mysqli_query($koneksi,"SELECT * FROM tbbku_pengeluaran WHERE idbku='".$_GET['id']."'");
    $d = mysqli_fetch_array($data);

    
       
?>

<div class="col-lg-12">
    <h1 class="page-header">Edit Data Kas</h1>
<form method="POST">
               
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputAddressLine1">Tanggal</label>
                        <input type="date" class="form-control" id="inputAddressLine1" name="tanggal" value="<?=$d['tanggal']?>">
                    </div>
                   
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputPostalCode">Uraian Pemasukan</label>
                        <input type="text" class="form-control" id="inputPostalCode" name="uraian" placeholder="uraian" value="<?=$d['uraian']?>">
                    </div>                    
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputPostalCode">Pemasukan</label>
                        <input type="text" class="form-control" id="inputPostalCode" name="terima" placeholder="jumlah pemasukan" value="<?=$d['penerimaan']?>">
                    </div>
                    
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-secondary" name="close">Close</button>
                        <button type="submit" class="btn btn-primary" name="tambah">Save changes</button>
                    </div>
                </div>
                
            </div>
     <div>
        
      </div>
    </div>
                 </form>

             </div>
<?php
    if (isset($_POST['close'])) {
        echo "<script>window.location='?pg=datakas';</script>";
    }elseif (isset($_POST['tambah'])) {
        $tanggal=$_POST['tanggal'];
        $uraian=$_POST['uraian'];
        $penerimaan=$_POST['terima'];

        $tambah=$koneksi->query("UPDATE tbbku_pengeluaran SET  tanggal='$tanggal', uraian='$uraian', penerimaan='$penerimaan' WHERE idbku='".$_GET['id']."'");
        $tambah2=$koneksi->query("UPDATE tbrekening SET  tanggal='$tanggal', uraian='$uraian', pemasukan='$penerimaan' WHERE idmasuk='".$_GET['id']."'");
        if ($tambah AND $tambah2) {
            echo "<script>window.location='?pg=datakas';</script>";
        }
    }
?>
