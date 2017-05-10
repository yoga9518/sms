<?php if ($_SESSION['stts'] == "member") { ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/artikel/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="">

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $judul_menu; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <form action="#">
                <?php echo $this->session->flashdata('pesan'); ?>
                <br>
                <div class="col-lg-3 col-sm-8">
                    <img src="<?php echo base_url(); ?>assets/img/Yoga.jpg" height="200" width="200">
                    <div class="form-group">
                        <label>Upload gambar</label>
                        <input type="file">
                    </div>
                </div>                
                <div class="form-group">
                    <label class="col-lg-3 col-sm-3 control-label" for="disabledSelect">Username</label>
                    <div class="col-lg-4">
                        <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $username; ?>" disabled>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label class="col-lg-3 col-sm-3 control-label" >Nama Lengkap</label>
                    <div class="col-lg-4">
                        <input type="hidden" id="id" name="id">
                        <input class="form-control" name="pass_lama" id="pass_lama" type="text" value="<?php echo $nama_lengkap; ?>" disabled>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <input type="hidden" id="id" name="id">
                    <label class="col-lg-3 col-sm-3 pass">Status</label>
                    <div class="col-lg-4">
                        <input class="form-control" name="pass_baru" id="pass_baru" type="text" value="<?php echo $stts; ?>" disabled >
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label class="col-lg-3 col-sm-3 pass">Registrasi</label>
                    <div class="col-lg-4">
                        <input class="form-control" name="registrasi" id="registrasi" type="text" value="<?php echo $waktu_daftar; ?>" disabled>
                    </div>
                </div>
                <div>
                    <br>
                    <div class="col-lg-3 col-sm-3 pass"></div><br>
                    <div class="col-lg-3 col-sm-3 pass"></div>
                    <div class="col-lg-4">
                        <a class="btn btn-primary" href="<?php echo base_url();?>index.php/member/c_member/setting">Ganti Password</a>
                    </div>
                </div>
            </form>
            <!-- /.container-fluid -->
        </div>
    <?php } ?>