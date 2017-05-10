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
                            <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                                Tambah user
                            </button> -->
                            <a href="<?php echo base_url();?>index.php/admin/c_admin/tambah_pengguna" class="btn btn-success ">
                            <i class="fa fa-plus bigger-160"></i>
                            Tambah
                            </a>
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
                            
                            <!-- /.modal -->
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="35">No</th>
                                        <th>Username</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>No HP</th>
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
                                            <td><?php echo $dt['email']; ?></td>
                                            <td><?php echo $dt['stts']; ?></td>
                                            <td><?php echo $dt['nohp'];?></td>
                                            <td>
                                                <a href="<?php echo base_url()."index.php/admin/c_admin/editpengguna/".$dt['id_user']; ?>" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo base_url()."index.php/admin/c_admin/hapuspengguna/".$dt['id_user']; ?>" class="btn btn-danger btn-circle" onclick="return confirm ('Apakah Anda Ingin Menghapus Pengguna sistem <?php echo $dt['nama_lengkap'];?>')"><i class="fa fa-times"></i></a>
                                                <!-- <button data-toggle="modal" data-target="#delete-data"  type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button> -->
                                                
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- END Modal Tambah -->
                        
                        <!-- modal Delete-->
                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="delete-data" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Peringatan !!</h4>
                                    </div>
                                    <form class="form-horizontal" action="<?php echo base_url()."index.php/admin/c_admin/hapus_inbox/".$dt['ID']; ?>" method="post" enctype="multipart/form-data" role="form">
                                        <div class="modal-header">
                                            <h4>Apakan Anda yakin Ingin menghapus Pesan ini</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger"> Hapus&nbsp;</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"> Batal</button>
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
