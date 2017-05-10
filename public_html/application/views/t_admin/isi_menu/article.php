<?php if($_SESSION['stts']=="admin"){?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $judul_menu;?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <?php echo $this->session->flashdata('pesan'); ?>
         <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Status</th>
                                        <th>Tanggal Upload</th>
                                        <th>Kategori</th>
                                        <th>Tag</th>
                                        <th width="45">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
                                   $no = 1;
                                   foreach ($data as $d){
                                   ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $d['judul']; ?></td>
                                            <td><?php echo $d['status'];?></td>
                                            <td><?php echo $d['tgl_upload'] ?></td>
                                            <td><?php echo $d['kategori'];?></td>
                                            <td>fdsfgds</td>
                                            <td>
                                                <a href="<?php echo base_url()."index.php/admin/c_admin/edit_artikel/".$d['id']; ?>"><button class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></button></a>
                                                <a><button data-toggle="modal" data-target="#delete-data"  type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="delete-data" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Ubah Data</h4>
                                    </div>
                                    <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data" role="form">
                                        <div class="modal-header">
                                            <h4>Apakan Anda yakin Ingin menghapus Artikel ini</h4>
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
                        </div>
                    </div>
        <!-- /.container-fluid -->
    </div>
<?php }?>   