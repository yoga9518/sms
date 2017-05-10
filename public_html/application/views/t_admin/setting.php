<?php if ($_SESSION['stts'] == "admin") { ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/artikel/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="">    

    <script type="text/javascript">
        function validation(form) {
            if (form.pass_baru.value != form.ulangi_pass.value) {
                alert("Password tidak sama ulangi lagi")
                form.password.focus();
                return false;
            }else if (form.pass_lama.value=="") {
                alert("Password harus di isi")
                form.password.focus();
                return false;
            }else if (form.pass_baru.value.length < 6){
                alert("Panjang password minimal 6 karakter")
                form.password.focus();
                return false;
            }
        }
    </script>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $judul_menu;?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <form rule="form" method="post" onsubmit="return validation(this)" action="<?php echo base_url("index.php/admin/c_admin/simpan_akun");?>">
                <h4>Selamat datang <b><u><?php echo $nama_lengkap; ?></u></b> di halaman setting pengguna</h4>
                 <?php echo $this->session->flashdata('pesan'); ?>
                <br>
                
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 control-label" for="disabledSelect">Username</label>
                        <div class="col-lg-4">
                            <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $username; ?>" disabled>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 control-label" >Password Lama</label>
                        <div class="col-lg-4">
                            <input type="hidden" id="id" name="id">
                            <input class="form-control" name="pass_lama" id="pass_lama" type="password" placeholder="Password Lama">
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <input type="hidden" id="id" name="id">
                        <label class="col-lg-3 col-sm-3 pass">Password Baru</label>
                        <div class="col-lg-4">
                            <input class="form-control" name="pass_baru" id="pass_baru" type="password" placeholder="Password Baru">
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 pass">Konfirmasi Password</label>
                        <div class="col-lg-4">
                            <input class="form-control" name="ulangi_pass" id="ulangi_pass" type="password" placeholder="Konfirmasi Password">
                        </div>
                    </div>
                    <div>
                        <br>
                        <div class="col-lg-3 col-sm-3 pass"></div><br>
                        <div class="col-lg-3 col-sm-3 pass"></div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-primary">Ganti Password</button>
                        </div>
                    </div>
            </form>
            <!-- /.container-fluid -->
        </div>

    <?php } ?>