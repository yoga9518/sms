<?php if ($_SESSION['stts'] == "admin") { ?>
    <!--    <script type="text/javascript" src="<?php //echo base_url();     ?>assets/artikel/ckeditor.js"></script>-->
    <script src="<?php echo base_url(); ?>assets/portal/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="">
    <script type="text/javascript">
        function cekform()
        {
            if (!$("#nohp").val())
            {
                alert('Maaf Nomor HP Tidak Boleh Kosong');
                $("#nohp").focus();
                return false;
            }
            if (!$("#pesan").val())
            {
                alert('Maaf Pesan Tidak Boleh Kosong');
                $("#pesan").focus();
                return false;
            }
        }
    </script>
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
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">

                                
                            </div>
                            <?php foreach ($balas as $dt){ ?>
                            <form onsubmit="return cekform();" action="<?php echo base_url() ?>index.php/admin/c_admin/kirim_pesan" method="post">
                                <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label" for="disabledSelect">Nomor Telepon</label>
                                    <div class="col-lg-4">
                                        <input class="form-control" id="nohp" name="nohp" type="text" value="<?php echo $dt->SenderNumber ?>" placeholder="Nomor Telepon" >
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label" >Balas Pesan</label>
                                    <div class="col-lg-6">
                                        <textarea id="pesan" name="pesan" class="form-control" rows="6" placeholder="Balas Pesan"></textarea>
                                        <!-- <div align="right"><span>max 160 kata</span></div> -->
                                    </div>
                                </div>
                                <div>
                                    <br><br>
                                    <br><br>
                                    <br><br><br>
                                    <div class="col-lg-3 col-sm-3 pass"></div><br>
                                    <div class="col-lg-3 col-sm-3 pass"></div>
                                    <div class="col-lg-6" align="left">
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                        <button type="submit" class="btn btn-danger">Batal</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <script src="<?php echo base_url(); ?>assets/portal/jquery-1.12.1.js"></script>
        <script>
                                var roxyFileman = '<?php echo base_url(); ?>assets/portal/ckeditor/plugins/fileman/index.html';
                                $(function () {
                                    CKEDITOR.replace('editor1', {filebrowserBrowseUrl: roxyFileman,
                                        filebrowserImageBrowseUrl: roxyFileman + '?type=image',
                                        removeDialogTabs: 'link:upload;image:upload'});
                                });
        </script>
    <?php } ?>