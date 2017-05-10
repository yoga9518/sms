<?php if ($_SESSION['stts'] == "member") { ?>
    <!--    <script type="text/javascript" src="<?php //echo base_url();     ?>assets/artikel/ckeditor.js"></script>-->
    <script src="<?php echo base_url(); ?>assets/portal/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="">
    <script type="text/javascript">
        function cekform()
        {
            if (!$("#pesan").val())
            {
                alert('Maaf Pesan Tidak Boleh Kosong');
                $("#pesan").focus();
                return false;
            }
            if (!$("#group").val())
            {
                alert('Maaf Group Tidak Boleh Kosong');
                $("#group").focus();
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
                            <form onsubmit="return cekform();" action="<?php echo base_url() ?>index.php/admin/c_admin/kirim_siaran" method="post">
                                <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label" for="disabledSelect">Group</label>
                                    <div class="col-lg-4">

                                        <select name="group" class="form-control">
                                            <option value="">-- Kategori --</option>
                                            <?php  foreach($data as $dt){?>
                                            <option id="group" value="<?php echo $dt['GroupID'];?>"><?php echo $dt['NameGroup']; //echo var_dump($dt); ?></option>                                            
                                            <?php  }?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label" >Isi Pesan</label>
                                    <div class="col-lg-6">
                                        <input type="hidden" id="id" name="id">
                                        <textarea id="pesan" name="pesan" class="form-control" rows="6" placeholder="Isi Pesan"></textarea>
                                        <div align="right"><span>max 160 kata</span></div>
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
                                        <a href="<?php echo base_url();?>index.php/member/c_member" class="btn btn-default">Batal</a>
                                    </div>
                                </div>
                            </form>
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