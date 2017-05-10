<?php if ($_SESSION['stts'] == "admin") { ?>
    <!--    <script type="text/javascript" src="<?php //echo base_url();     ?>assets/artikel/ckeditor.js"></script>-->
    <script src="<?php echo base_url(); ?>assets/portal/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="">
    <script type="text/javascript">
        function cekform()
        {
            if (!$("#username").val())
            {
                alert('Maaf Username Tidak Boleh Kosong');
                $("#username").focus();
                return false;
            }
            if (!$("#namalengkap").val())
            {
                alert('Maaf Nama lengkap Tidak Boleh Kosong');
                $("#namalengkap").focus();
                return false;
            }
            if (!$("#email").val())
            {
                alert('Maaf Email Tidak Boleh Kosong');
                $("#email").focus();
                return false;
            }
            if (!$("#status").val())
            {
                alert('Maaf Status Tidak Boleh Kosong');
                $("#status").focus();
                return false;
            }
            if (!$("#nohp").val())
            {
                alert('Maaf Nomor HP Tidak Boleh Kosong');
                $("#nohp").focus();
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
                            <?php foreach ($pengguna as $dt) { 
                                $a = $dt->stts; 

                                // var_dump($dt);
                                ?>
                            
                            <form onsubmit="return cekform();" action="<?php echo base_url() ?>index.php/admin/c_admin/doeditpengguna" method="post">
                                <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label">Username</label>
                                    <div class="col-lg-4">
                                        <input id="id" name="id" value="<?php echo $dt->id_user; ?>" type="hidden">
                                        <input class="form-control" id="username" name="username" type="text" value="<?php echo $dt->username; ?>" >
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label" >Nama Lengkap</label>
                                    <div class="col-lg-4">
                                        <input id="namalengkap" name="namalengkap" class="form-control" value="<?php echo $dt->nama_lengkap; ?>"></textarea>
                                        <div></div>
                                    </div>
                                </div>
                                <div>
                                    <br>
                                <br>
                                <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label" >Email</label>
                                    <div class="col-lg-4">
                                        <input id="email" name="email" type="email" class="form-control" value="<?php echo $dt->email; ?>">
                                    </div>
                                </div>
                                <div>
                                    <br>
                                <br>
                                <!-- <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label" >Alamat</label>
                                    <div class="col-lg-4">
                                        <textarea id="alamat" name="alamat" class="form-control" rows="6" placeholder="Alamat">value<?php echo $dt->alamat; ?></textarea>
                                        
                                    </div>
                                </div> -->
                                <!-- <br><br>
                                <br><br>
                                <br><br>
                                <br><br> -->
                                <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label" >Status</label>
                                    <div class="col-lg-4">
                                        <select name="status" id="status" value="" class="form-control">
                                            <option name="status" id="status" value="">-- Kategori --</option>
                                            <?php foreach($status as $d){?>
                                            

                                            <?php 
                                            // $idgroup = $dt['GroupID'];
                                            if ($d['status'] == $a) {
                                                echo "<option value='".$d['status']."' selected>".$d['status']."</option>";
                                            }else{
                                                echo "<option value='".$d['status']."'>".$d['status']."</option>";
                                            }
                                            ?>
                                            <!-- <option value="<?php //echo $dt['GroupID'];?>" selected><?php //echo $dt['NameGroup']; //echo var_dump($dt); ?></option>-->
                                            <?php  }?>
                                        </select>
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label" >Nomor HP</label>
                                    <div class="col-lg-4">
                                        <input id="nohp" name="nohp" class="form-control" rows="6" value="<?php echo $dt->nohp; ?>"></textarea>
                                    </div>
                                </div>
                                <div>
                                    <br>                                    
                                    <div class="col-lg-3 col-sm-3 pass"></div><br>
                                    <div class="col-lg-3 col-sm-3 pass"></div>
                                    <div class="col-lg-6" align="left">
                                        <button type="submit" class="btn btn-success">Update</button>
                                        <a href="<?php echo base_url();?>index.php/admin/c_admin/pengguna" class="btn btn-default">Batal</a>
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