
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
                                            <td><?php echo $dt['id']; ?></td>
                                            <td><?php echo $dt['judul']; ?></td>
                                            <td><?php echo $dt['isi']; ?></td>
                                            <td><?php //echo $dt['waktu_daftar']; ?></td>
                                            <td>
                                                
                                                <a>
                                                    <button data-toggle="modal" data-target="#delete-data"  type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
