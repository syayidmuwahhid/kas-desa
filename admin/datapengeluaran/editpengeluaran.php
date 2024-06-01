<?php
    $data = mysqli_query($koneksi,"SELECT * FROM tbbukti_pengeluaran WHERE idbukti='".$_GET['id']."'");
    $d = mysqli_fetch_array($data);

    
       
?>

<div class="col-lg-12">
    <h1 class="page-header">Edit Data Kas</h1>
<form method="POST" >
                <div class="form-group row">
                    
                    <div class="col-sm-4">
                        <label for="inputState">Tanggal</label>
                        <input type="date" class="form-control"placeholder="Kode Rekening" name="tanggal" value="<?=$d['tanggal']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputAddressLine1">Uraian Pengeluaran</label>
                        <input type="text" class="form-control" name="uraian" placeholder="Nama" value="<?=$d['uraian']?>">
                    </div>
                    
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputCity">Pengeluaran</label>
                        <input type="text" class="form-control" placeholder="Pengeluaran" name="pembayaran" value="<?=$d['pembayaran']?>">
                    </div>
                    
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
        <button type="submit" class="btn btn-secondary" name="close">Close</button>
        <button type="submit" class="btn btn-primary" name="tambah">Save</button>
    </div>
      </div>
                </div>
            </form>

             </div>
<?php
    if (isset($_POST['close'])) {
        echo "<script>window.location='?pg=datapengeluaran';</script>";
    }elseif (isset($_POST['tambah'])) {
        $tanggal=$_POST['tanggal'];
        $uraian=$_POST['uraian'];
        $pembayaran=$_POST['pembayaran'];
        
        

        $tambah=$koneksi->query("UPDATE tbbukti_pengeluaran SET  tanggal='$tanggal', uraian='$uraian',  pembayaran='$pembayaran' WHERE idbukti='".$_GET['id']."'");
        $tambah2=$koneksi->query("UPDATE tbrekening SET  tanggal='$tanggal', uraian='$uraian', pengeluaran='$pembayaran' WHERE idkeluar='".$_GET['id']."'");
        if ($tambah AND $tambah2) {
            echo "<script>window.location='?pg=datapengeluaran';</script>";
        }
    }
?>
