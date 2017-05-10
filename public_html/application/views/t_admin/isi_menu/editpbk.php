<?php if ($_SESSION['stts'] == "admin") { ?>
    <!--    <script type="text/javascript" src="<?php //echo base_url();     ?>assets/artikel/ckeditor.js"></script>-->
    <script src="<?php echo base_url(); ?>assets/portal/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="">
    <script type="text/javascript">
        function cekform()
        {
            if (!$("#nama").val())
            {
                alert('Maaf nama Tidak Boleh Kosong');
                $("#nama").focus();
                return false;
            }
            if (!$("#nohp").val())
            {
                alert('Maaf Nomor HP Tidak Boleh Kosong');
                $("#nohp").focus();
                return false;
            }
            if (!$("#alamat").val())
            {
                alert('Maaf Alamat Tidak Boleh Kosong');
                $("#alamat").focus();
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
                            <?php foreach ($pbk as $d) { 

                                $a = $d->GroupID;
                                // $s = $d->Number;

                                ?>
                            <?php //echo var_dump($d); ?>
                            <form onsubmit="return cekform();" action="<?php echo base_url() ?>index.php/admin/c_admin/doeditpbk" method="post">
                                <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label">Nama</label>
                                    <div class="col-lg-4">
                                        <input type="hidden" id="id" name="id" value="<?php echo $d->ID; ?>">
                                        <input class="form-control" id="nama" name="nama" type="text" value="<?php echo $d->Name ?>">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label" >No Telepon</label>
                                    <div class="col-lg-4">
                                        <input id="nohp" name="nohp" class="form-control" type="text" value="<?php echo $d->Number; ?>">
                                        <div></div>
                                    </div>
                                </div>
                                <div>
                                    <br>
                                <br>
                                <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label" >Groups</label>
                                    <div class="col-lg-4">
                                        <select name="group" id="group" value="" class="form-control">
                                            <option name="group" id="group" value="">-- Kategori --</option>
                                            <?php foreach($grup as $dt){?>

                                            <?php 
                                            // $idgroup = $dt['GroupID'];
                                            if ($dt['GroupID'] == $a) {
                                                echo "<option value='".$dt['GroupID']."' selected>".$dt['NameGroup']."</option>";
                                            }else{
                                                echo "<option value='".$dt['GroupID']."'>".$dt['NameGroup']."</option>";
                                            }

                                            ?>
                                            <!-- <option value="<?php //echo $dt['GroupID'];?>" selected><?php //echo $dt['NameGroup']; //echo var_dump($dt); ?></option>                                             -->
                                            <?php  }?>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <br>
                                <br>
                                <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label" >Alamat</label>
                                    <div class="col-lg-4">
                                        <textarea id="alamat" name="alamat" class="form-control" rows="6" ><?php echo $d->alamat ?></textarea>
                                        
                                    </div>
                                </div>
                                <div>
                                    <?php } ?>
                                    <br><br>
                                    <br><br>
                                    <br><br>
                                    <div class="col-lg-3 col-sm-3 pass"></div><br>
                                    <div class="col-lg-3 col-sm-3 pass"></div>
                                    <div class="col-lg-6" align="left">
                                        <button type="submit" class="btn btn-success">Update</button>
                                        <a href="<?php echo base_url();?>index.php/admin/c_admin/pbk" class="btn btn-default">Batal</a>
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