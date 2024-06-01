				

					<div class="col-lg-12">
                            <h1 class="page-header">Dashboard</h1>
                            <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                         <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-bar-chart fa-5x"></i>
                                            <?php
                                                include '../koneksi.php';
                                                $sql = mysqli_query($koneksi,"SELECT COUNT(idbku) FROM tbbku_pengeluaran");
                                                $data = mysqli_fetch_array($sql);
                                            ?>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?=$data[0];?></div>
                                            <div>Pemasukan</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="?pg=datakas">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                       <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-shopping-cart fa-5x"></i>
                                            <?php
                                                include '../koneksi.php';
                                                $sql = mysqli_query($koneksi,"SELECT COUNT(idbukti) FROM  tbbukti_pengeluaran");
                                                $buk = mysqli_fetch_array($sql);
                                            ?>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?=$buk[0];?></div>
                                            <div>Pengeluaran</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="?pg=datapengeluaran">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-tasks fa-5x"></i>
                                            <?php
                                                include '../koneksi.php';
                                                $sql = mysqli_query($koneksi,"SELECT COUNT(idrekening) FROM tbrekening");
                                                $rek = mysqli_fetch_array($sql);
                                            ?>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?=$rek[0];?></div>
                                            <div>Data Transaksi</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="?pg=datarekening">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-book fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php
                                                $sql = mysqli_query($koneksi,"SELECT COUNT(id) AS id FROM  tb_login WHERE status='aktif'");
                                                $jmluser = mysqli_fetch_array($sql);
                                            ?>
                                            <div class="huge"><?=$jmluser['id']?></div>
                                            <div>User Aktif</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="?pg=petugas">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>



                        </div>