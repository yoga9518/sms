<?php if($_SESSION['stts']=="member"){?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $judul_menu; ?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
         <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-upload fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $this->db->count_all('sentitems'); ?></div>
                                    <div>Pesan Terkirim</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url();?>index.php/admin/c_admin/pesan_terkirim">
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
                                    <i class="fa fa-envelope-square fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $this->db->count_all('inbox'); ?></div>
                                    <div>Pesan Masuk</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url();?>index.php/admin/c_admin/pesan_masuk">
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
                                    <i class="fa fa-rss fa-5x"></i>
                                </div>
                                <?php $query = $this->db->query("SELECT * FROM phones");
                                foreach ($query->result_array() as $row){ ?>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $row['Signal'];?> %</div>
                                    <div>Sinyal</div>
                                </div>
                               <?php } ?>
                            </div>
                        </div>
                        <a href="">
                            <div class="panel-footer">
                                <span class="pull-left">Refresh</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php

                passthru("net start > service.log");


                $handle = fopen("service.log", "r");


                $status = 0;


                while (!feof($handle))
                {

                    $baristeks = fgets($handle);
                    if (substr_count($baristeks, 'Gammu SMSD Service (GammuSMSD)') > 0)
                    {

                        $status = 1;
                    }
                }

                fclose($handle);

                if ($status == 1) echo "<div class='col-lg-3 col-md-6'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            <div class='row'>
                                <div class='col-xs-3'>
                                    <i class='fa fa-refresh fa-5x'></i>
                                </div>
                                <div class='col-xs-9 text-right'>
                                    <div class='huge'></div>
                                    <div>Terhubung</div>
                                </div>
                            </div>
                        </div>
                        <a href=''>
                            <div class='panel-footer'>
                                <span class='pull-left'>Refresh</span>
                                <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>
                                <div class='clearfix'></div>
                            </div>
                        </a>
                    </div>
                </div>";

                else if ($status == 0) echo "<div class='col-lg-3 col-md-6'>
                    <div class='panel panel-red'>
                        <div class='panel-heading'>
                            <div class='row'>
                                <div class='col-xs-3'>
                                    <i class='fa fa-refresh fa-5x'></i>
                                </div>
                                <div class='col-xs-9 text-right'>
                                    <div class='huge'></div>
                                    <div>Terputus</div>
                                </div>
                            </div>
                        </div>
                        <a href=''>
                            <div class='panel-footer'>
                                <span class='pull-left'>Refresh</span>
                                <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>
                                <div class='clearfix'></div>
                            </div>
                        </a>
                    </div>
                </div>";

                ?>

                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Statistik SMS
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="flot-chart">
                                    <div class="flot-chart-content" id="flot-line-chart"></div>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                <!-- /.col-lg-12 -->
                
                <!-- /.col-lg-6 -->
                <div class="col-lg-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Perangkat Modem
                        </div>
                        
                        <div class="panel-footer">
                            IMEI : <?php echo $row['IMEI'];?>
                        </div>
                        <div class="panel-footer">
                            Client : <?php echo $row['Client'];?>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-6 -->
                <!-- /.col-lg-6 -->
                <!-- /.col-lg-6 -->
            </div>
            </div>
             
            <!-- /.row -->
            
            <!-- /.row -->
        </div>
                
    </div>
    <!-- /.container-fluid -->
</div>

<?php } 
else{
     redirect("member/c_member");
}
    ?>
    
