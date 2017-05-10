<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Tambah data <?php echo $judul; ?></h4>
            </div>
            <div class="modal-body">
                <div class="form-group input-group">

                    <span class="input-group-addon">@</span>
                    <input type="text" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label><?php echo $username;?></label>
                    <input class="form-control">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <input class="form-control">
                </div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input class="form-control">
                </div>
                <div class="form-group">
                    <label>File input</label>
                    <input type="file">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>