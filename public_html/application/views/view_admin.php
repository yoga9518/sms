<!DOCTYPE html>
<html>
    <head>
        <title>Membuat CRUD Dengan CodeIgniter | https://sugrahaku.com</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">

        <link href="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- DataTables CSS -->
        <link href="<?php echo base_url(); ?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="<?php echo base_url(); ?>assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

        <script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Data Orang</h1>
            <p class="text-center">Selamat Datang, <?php echo $this->session->userdata("username"); ?></p>
            <div class="form-group text-right">
                <a data-toggle="modal" data-target="#tambah-data" class="btn btn-primary">Tambah</a>
                <a class="btn btn-warning" href="<?php echo base_url('index.php/login/logout'); ?>">Logout</a>
            </div>
            <?= $this->session->flashdata('notif') ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($data as $dt) { ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $dt['username']; ?></td>
                            <td><?php echo $dt['nama_lengkap']; ?></td>
                            <td><?php echo $dt['stts']; ?></td>
                            <td>
                                <a 
                                    href="javascript:;"
                                    data-id="<?php echo $dt['id'] ?>"
                                    data-nama="<?php echo $dt['username'] ?>"
                                    data-alamat="<?php echo $dt['nama_lengkap'] ?>"
                                    data-pekerjaan="<?php echo $dt['stts'] ?>"
                                    data-toggle="modal" data-target="#edit-data">
                                    <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-info">Ubah</button>
                                </a>
                                <a href="#" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
<?php } ?>
                </tbody>
            </table>
        </div>
        <!-- Modal Tambah -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">Tambah Data</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url('admin/tambah') ?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Nama</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="nama" placeholder="Tuliskan Nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Alamat</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="alamat" placeholder="Tuliskan Alamat"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Pekerjaan</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="pekerjaan" placeholder="Tuliskan Pekerjaan">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Tambah -->
    <!-- Modal Ubah -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Ubah Data</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url('admin/ubah') ?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Nama</label>
                            <div class="col-lg-10">
                                <input type="hidden" id="id" name="id">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Tuliskan Nama">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Alamat</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Tuliskan Alamat"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Pekerjaan</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Tuliskan Pekerjaan">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Modal Ubah -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/dist/js/sb-admin-2.js"></script>
        
    <!-- /#wrapper -->
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
<script>
    $(document).ready(function () {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value", div.data('id'));
            modal.find('#nama').attr("value", div.data('nama'));
            modal.find('#alamat').html(div.data('alamat'));
            modal.find('#pekerjaan').attr("value", div.data('pekerjaan'));
        });
    });
</script>
</body>
</html>