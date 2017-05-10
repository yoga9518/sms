<?php if ($_SESSION['stts'] == "admin") { ?>
    <!--    <script type="text/javascript" src="<?php //echo base_url();     ?>assets/artikel/ckeditor.js"></script>-->
    <script src="<?php echo base_url(); ?>assets/portal/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="">
    <script type="text/javascript">
        function cekform()
        {
            if (!$("#nama").val())
            {
                alert('Maaf Nama Group Tidak Boleh Kosong');
                $("#nama").focus();
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
                            <?php foreach ($data as $dt) {
                                // echo var_dump($dt);
                             ?>
                            
                            <form onsubmit="return cekform();" action="<?php echo base_url() ?>index.php/admin/c_admin/doeditgrup" method="post">
                                <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label">Nama Group</label>
                                    <div class="col-lg-4">
                                        <input type="hidden" id="id" name="id" value="<?php echo $dt->GroupID; ?>">
                                        <input class="form-control" id="nama" name="nama" type="text" value="<?php echo $dt->NameGroup?>" >
                                    </div>
                                </div>
                                <br>
                                
                                <div>
                                    <br>
                                    <div class="col-lg-3 col-sm-3 pass"></div><br>
                                    <div class="col-lg-3 col-sm-3 pass"></div>
                                    <div class="col-lg-6" align="left">
                                        <button type="submit" class="btn btn-success">Update</button>
                                        <a href="<?php echo base_url();?>index.php/admin/c_admin/pbk" class="btn btn-default">Batal</a>
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
                        </div>
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