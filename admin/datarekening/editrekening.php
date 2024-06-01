<?php
    $data = mysqli_query($koneksi,"SELECT * FROM tbrekening WHERE idrekening='".$_GET['id']."'");
    $d = mysqli_fetch_array($data);

    
       
?>

<div class="col-lg-12">
    <h1 class="page-header">Edit Data Kas</h1>
<form method="POST" >
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputFirstname">SKPD</label>
                        <input type="number" class="form-control" placeholder="SKPD" name="skpd" value="<?=$d['SKPD']?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputState">Kode Rekening</label>
                        <input type="number" class="form-control" placeholder="Kode Rekening" name="kode_rekening" value="<?=$d['kode_rekening']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputAddressLine1">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?=$d['nama']?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputAddressLine2">Tanggal</label>
                        <input type="date" class="form-control" placeholder="Tanggal" name="tanggal" value="<?=$d['tanggal']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputCity">Uraian</label>
                        <input type="text" class="form-control" placeholder="Uraian" name="uraian" value="<?=$d['uraian']?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputState">Belanja LS</label>
                        <input type="number" class="form-control"  placeholder="Belanja LS" name="belanja_ls" value="<?=$d['belanja_ls']?>">
                    </div>
                    
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputContactNumber">Belanja TU</label>
                        <input type="number" class="form-control"placeholder="Belanja TU" name="belanja_tu" value="<?=$d['belanja_tu']?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputPostalCode">Belanja UP</label>
                        <input type="number" class="form-control" placeholder="Belanja UP" name="belanja_up" value="<?=$d['belanja_up']?>">
                    </div>
                </div>
                <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" name="close">Close</button>
        <button type="submit" class="btn btn-primary" name="tambah">Save</button>
      </div>
                </div>
            </form>

             </div>
<?php
    if (isset($_POST['close'])) {
        echo "<script>window.location='?pg=datarekening';</script>";
    }elseif (isset($_POST['tambah'])) {
        $SKPD=$_POST['skpd'];
        $koderekening=$_POST['kode_rekening'];
        $nama=$_POST['nama'];
        $tanggal=$_POST['tanggal'];
        $uraian=$_POST['uraian'];
        $belanja_ls=$_POST['belanja_ls'];
        $belanja_tu=$_POST['belanja_tu'];
        $belanja_up=$_POST['belanja_up'];
        

        $tambah=$koneksi->query("UPDATE tbrekening SET SKPD='$SKPD', kode_rekening='$koderekening', nama='$nama', tanggal='$tanggal', uraian='$uraian', belanja_ls='$belanja_ls', belanja_tu='$belanja_tu', belanja_up='$belanja_up' WHERE idrekening='".$_GET['id']."'");
        if ($tambah) {
            echo "<script>window.location='?pg=datarekening';</script>";
        }
    }
?>
