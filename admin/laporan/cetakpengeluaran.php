<?php
	session_start();
    include '../../koneksi.php';
	if (empty($_SESSION['username'])){
       echo "<script>window.location='../index.php';</script>";
	}else if ($_GET['ket']=='harian') {
		$ket="HARIAN";
		$tanggal=date('d F Y', strtotime($_GET['tanggal']));
		$where="tanggal='".$_GET['tanggal']."'";
	}else if ($_GET['ket']=='mingguan') {
		$ket="MINGGUAN";
		$awal=$_GET['dari'];
		$akhir=$_GET['sampai'];
		$dari=date('d F Y', strtotime($_GET['dari']));
		$sampai=date('d F Y', strtotime($_GET['sampai']));
		$tanggal=$dari." - ".$sampai;
		$where="tanggal BETWEEN '".$awal."' AND '".$akhir."'";
	}else if ($_GET['ket']=='bulanan') {
		$ket="BULANAN";
		$bulan=$_GET['bulan'];
		$tahun=$_GET['tahun'];
		$where="tanggal Like '$tahun-$bulan-%'";
		switch ($bulan) {
                        case 1:
                            $tanggal="Bulan Januari ".$tahun;
                            break;
                        case 2:
                            $tanggal="Bulan Februari ".$tahun;
                            break;
                        case 3:
                            $tanggal="Bulan Maret ".$tahun;
                            break;
                        case 4:
                            $tanggal="Bulan April ".$tahun;
                            break;
                        case 5:
                            $tanggal="Bulan Mei ".$tahun;
                            break;
                        case 6:
                            $tanggal="Bulan Juni ".$tahun;
                            break;
                        case 7:
                            $tanggal="Bulan Juli ".$tahun;
                            break;
                        case 8:
                            $tanggal="Bulan Agustus ".$tahun;
                            break;
                        case 9:
                            $tanggal="Bulan September ".$tahun;
                            break;
                        case 10:
                            $tanggal="Bulan Oktober ".$tahun;
                            break;
                        case 11:
                            $tanggal="Bulan November ".$tahun;
                            break;
                        case 12:
                            $tanggal="Bulan Desember ".$tahun;
                            break;
                        
                        default:
                            $tanggal=null;
                            break;
                    }
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Pemasukan <?=$ket?></title>
</head>
<body>
    <center>
        <h2>LAPORAN PENGELUARAN KAS
        <br><?=$ket?></h2>
        <h3><?=$tanggal?></h3>
    </center>

        <table width="100%" border="1" cellspacing="0" cellpadding="2">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Uraian Pengeluaran</th>
                <th>Pemasukan</th>
            </tr>
            
            <?php
                $getdata = mysqli_query($koneksi, "SELECT * FROM tbbukti_pengeluaran WHERE $where ORDER BY tanggal ASC");
                $no=1;
                while ($row = mysqli_fetch_array($getdata)){

                    $tanggal=date('d F Y', strtotime($row['tanggal']));
                    echo "<tr>
                        <td><center>".$no++."</center></td>
                        <td> ".$tanggal."</td>
                        <td> ".$row['uraian']."</td>
                        <td> ".number_format($row['pembayaran'],0,',','.')."</td>
                    </tr>";
}
?>
        </table>
    


</body>
<script>
    window.print();
</script>
</html>