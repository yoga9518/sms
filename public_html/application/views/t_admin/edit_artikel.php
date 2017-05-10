<?php if ($_SESSION['stts'] == "admin") { ?>
    <!--    <script type="text/javascript" src="<?php //echo base_url();     ?>assets/artikel/ckeditor.js"></script>-->
    <script src="<?php echo base_url(); ?>assets/portal/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="">
    <script type="text/javascript">
        function cekform()
        {
            if (!$("#judul").val())
            {
                alert('Maaf judul tidak boleh kosong');
                $("#judul").focus();
                return false;
            }
        }
    </script>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $judul; ?></h1>
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
                            <?php foreach ($ys_berita as $br){ ?>
                            <form onsubmit=" return cekform();" action="<?php echo base_url() ?>index.php/admin/c_admin/do_edit_artikel" method="post">
                                <div class="col-md-8">
                                    <div class="form-group">

                                        <label>Judul</label>
                                        <input type="hidden" id="id" name="id" value="<?php echo $br->id; ?>">
                                        <input class="form-control" id="judul" name="judul" type="text" size="80" value="<?php echo $br->judul; ?>">
                                        <p></p>
                                        <label>Artikel</label>
                                        <textarea id="editor1" name="editor1" rows="10" cols="80" ><?php echo $br->isi;?></textarea>
                                        <p></p>
                                        <input type="submit" name="posting" value="POSTING">
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                Status
                                            </div>
                                            <div class="panel-body">
                                                <select name="status" type="text" id="status" class="form-control">
                                                <?php foreach ($data as $key){?>
                                                    <option><?php echo $key['status']; ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                            <div class="panel-footer">
                                                Status Postingan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                Kategori
                                            </div>
                                            <div class="panel-body">
                                                <select name="kategori" type="text" id="kategori" class="form-control">
                                                    <option>Isi Kategori 1</option>
                                                    <option>Isi Kategori 2</option>
                                                </select>
                                            </div>
                                            <div class="panel-footer">
                                                Kategori Artikel
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                Green Panel
                                            </div>
                                            <div class="panel-body">
                                                <p>Ini nantinya akan di pakai untuk keperluan kita</p>
                                            </div>
                                            <div class="panel-footer">
                                                Panel Footer
                                            </div>
                                        </div>
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