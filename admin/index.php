<?php
    session_start();
    if (empty($_SESSION['username'])){
       echo "<script>window.location='../index.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>E-Kas Desa Jayanti</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <style type="text/css">
            .dtHorizontalVerticalExampleWrapper {
max-width: 600px;
margin: 0 auto;
}
#dtHorizontalVerticalExample th, td {
white-space: nowrap;
}
table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before {
bottom: .5em;
}
        </style>

        <!-- data table -->
           <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <?php
    include '../koneksi.php';
    session_start();
    $petugas="<a href='?pg=petugas'><i class='fa fa-user fa-fw'></i> Data Petugas</a>";
    $include="petugas/petugas.php";
    
  // Menampilkan nama petugas
    $id = $_SESSION['id'];
    $query = mysqli_query($koneksi,"SELECT * FROM tb_login WHERE id = '$id'");
    $data = mysqli_fetch_array($query);
    $idd = $data['id'];
    if ($_SESSION['status'] != 'admin')
    {
        // header("location:../index.php");
        $petugas="";
        $include="";
    }
    ?>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">E-Kas Desa Jayanti</a>
                </div>

                <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> -->

                

                <ul class="nav navbar-right navbar-top-links">
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?=$data['nama_user']?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                               <center> <p><a href="?pg=dashboard"><img src="../img/jawa.png" class="img-circle" width="100"></a></p></center>
                                <div class="card-header text-center">
      <a href="index2.html" class="h2"><b>KASDES</b>KU</a>
    </div>
                                <div class="input-group custom-search-form">
                                    
                                </div>
                                <!-- /input-group -->
                            </li>
		                          <li>
			                            <a href="?pg=dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
			                            </li>
			                             <li>
			                                <?=$petugas?>
			                            </li>

                                        <!-- <li>
                                            <a href="?pg=kegiatan"><i class="fa fa-table fa-fw"></i> Data Kegiatan</a>
                                        </li>
 -->
			                            <li>
			                                <a href="?pg=datakas"><i class="fa fa-table fa-fw"></i> Data Pemasukan</a>
			                            </li>
			                            <li>
			                                <a href="?pg=datapengeluaran"><i class="fa fa-edit fa-fw"></i> Data Pengeluaran</a>
			                            </li>
			                            <li>
			                                <a href="?pg=datarekening"><i class="fa fa-industry fa-fw"></i> Data Transaksi</a>
		                           		</li>

                                <!-- /.nav-second-level -->
                            </li>
                            	
                                
                                <!-- /.nav-second-level -->
                            
                            
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <?php
                            switch (@$_GET['pg']) {
                                case 'dashboard':
                                    include 'dashboard/dashboard.php';
                                    break;

                                    case 'petugas':
                                        if ($_SESSION['status']!='admin') {
                                            echo "<script>alert('Anda Bukan Admin'); window.location='?pg=dashboard';</script>";
                                        }else{
                                            include 'petugas/petugas.php';
                                        }
                                    break;
                                    case 'editpetugas':
                                include 'petugas/editpetugas.php'; 
                                break;

                                    case 'kegiatan':
                                    include 'kegiatan/kegiatan.php';
                                    break;
                                
                                case 'datakas':
                                    include 'datakas/datakas.php';
                                    break;
                                case 'detailkas':
                                    include 'datakas/detail.php';
                                    break;
                                case 'editkas':
                                include 'datakas/editkas.php'; 
                                break;

                                case 'datarekening':
                                include 'datarekening/datarekening.php';
                                break;
                                case 'editrekening':
                                include 'datarekening/editrekening.php'; 
                                break;
                                case 'detailrek':
                                    include 'datarekening/detail.php';
                                    break;

								case 'datapengeluaran':
                                include 'datapengeluaran/datapengeluaran.php';
                                break;
                                case 'editpengeluaran':
                                include 'datapengeluaran/editpengeluaran.php'; 
                                break;

                                case 'detailluar':
                                include 'datapengeluaran/detail.php';
                                break;
                                default:
                                   include 'dashboard/dashboard.php'; 
                                    break;
                            }
                            ?>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>

<script type="text/javascript">
    $(document).ready(function () {
$('#dtHorizontalVerticalExample').DataTable({
"scrollX": true,
"scrollY": 200,
});
$('.dataTables_length').addClass('bs-select');
});
</script>
<script type="text/javascript">
  $(document).ready(function(){   
    $('.form-checkbox').click(function(){
      if($(this).is(':checked')){
        $('.form-password').attr('type','text');
      }else{
        $('.form-password').attr('type','password');
      }
    });
  });
</script>
    </body>
</html>
