<?php if ($_SESSION['stts'] == "admin") { ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $judul_menu; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-body">

                            <?php echo $this->session->flashdata('pesan'); ?>
                            <!-- Button trigger modal -->
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                                Tambah Data
                            </button>
                            <script type="text/javascript">
                                function cekform()
                                {
                                    if (!$("#username").val())
                                    {
                                        alert('Maaf username tidak boleh kosong');
                                        $("#username").focus();
                                        return false;
                                    }
                                    if (!$("#nama_lengkap").val())
                                    {
                                        alert('Maaf Nama Lengkap tidak boleh kosong');
                                        $("#nama_lengkap").focus();
                                        return false;
                                    }
                                }
                            </script>  
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah User <?php echo $judul_menu; ?></h4>
                                        </div>
                                        <form action="<?php echo base_url(); ?>index.php/admin/c_admin/tambah" method="post" onSubmit="return cekform();">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="col-lg-3 col-sm-2 control-label">Username</label>
                                                    <div  >
                                                        <input name="username" type="text" id="username" class="form-control" placeholder="Username">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-3 col-sm-2 control-label">Status</label>
                                                    <select name="stts" type="text" id="stts" class="form-control">
                                                        <option>admin</option>
                                                        <option>member</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-3 col-sm-2 control-label">Nama Lengkap</label>
                                                    <input name="nama_lengkap" type="text" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Tambah User</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama Lengkap</th>
                                        <th>Status</th>
                                        <th>Registrasi</th>
                                        <th width="45">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($data as $dt) {
                                        ?>
                                        <tr>
                                            <td><?php echo ++$no; ?></td>
                                            <td><?php echo $dt['username']; ?></td>
                                            <td><?php echo $dt['nama_lengkap']; ?></td>
                                            <td><?php echo $dt['stts']; ?></td>
                                            <td><?php echo $dt['waktu_daftar']; ?></td>
                                            <td>
                                                <a 
                                                    href="javascript:;"
                                                    data-id="<?php echo $dt['id'] ?>"
                                                    data-username="<?php echo $dt['username'] ?>"
                                                    data-stt="<?php echo $dt['stts'] ?>"
                                                    data-namalengkap="<?php echo $dt['nama_lengkap'] ?>"
                                                    data-lastupdate="<?php echo $dt['last_update'] ?>"
                                                    data-toggle="modal" data-target="#edit-data">
                                                    <button data-toggle="modal" data-target="#ubah-data" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></button>
                                                </a>
                                                <a>
                                                    <button data-toggle="modal" data-target="#delete-data"  type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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

                                    <form class="form-horizontal" action="<?php echo base_url('index.php/admin/c_admin/edit_user') ?>" method="post" enctype="multipart/form-data" role="form">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="col-lg-3 col-sm-2 control-label">Username</label>
                                                <div class="col-lg-9">
                                                    <input type="hidden" id="id" name="id">
                                                    <input type="text" class="form-control" id="username" name="username" placeholder="Tuliskan Nama">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 col-sm-2 control-label">Status</label>
                                                <div class="col-lg-9">
                                                    <select name="stts" type="text" id="stts" class="form-control">
                                                        <option>admin</option>
                                                        <option>member</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 col-sm-2 control-label">Nama lengkap</label>
                                                <div class="col-lg-9">
                                                    <input type="hidden" id="lastupdate" name="last_update">
                                                    <input type="text" class="form-control" id="namalengkap" name="nama_lengkap" placeholder="Tuliskan Pekerjaan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"> Batal</button>
                                            <button type="submit" class="btn btn-primary"> Simpan&nbsp;</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- modal Delete-->
                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="delete-data" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Ubah Data</h4>
                                    </div>
                                    <form class="form-horizontal" action="<?php echo base_url() . "index.php/admin/c_admin/delete/" . $dt['id']; ?>" method="post" enctype="multipart/form-data" role="form">
                                        <div class="modal-header">
                                            <h4>Apakan Anda yakin Ingin menghapus user ini</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"> Batal</button>
                                            <button type="submit" class="btn btn-primary"> Hapus&nbsp;</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>


                    <!-- Page-Level Demo Scripts - Tables - Use for reference -->

                    <script>
                                $(document).ready(function () {
                                    // Untuk sunting
                                    $('#edit-data').on('show.bs.modal', function (event) {
                                        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                                        var modal = $(this)

                                        // Isi nilai pada field
                                        modal.find('#id').attr("value", div.data('id'));
                                        modal.find('#username').attr("value", div.data('username'));
                                        modal.find('#stt').html(div.data('stt'));
                                        modal.find('#namalengkap').attr("value", div.data('namalengkap'));
                                        modal.find('#lastupdate').html(div.data('lastupdate'));
                                    });
                                });
                    </script>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </div>
<?php } ?>
