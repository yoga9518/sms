<!DOCTYPE html>
<html>
<head>
	<title>Membuat Pagination Pada CodeIgniter | MalasNgoding.com</title>
         <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- DataTables CSS -->
    <link href="<?php echo base_url(); ?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url(); ?>assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

</head>

<body>
<h1>Membuat Pagination Pada CodeIgniter | MalasNgoding.com</h1>
<div class="panel-body">
<div class="dataTable_wrapper">
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
		<tr>
			<th>no</th>
			<th>username</th>
			<th>status</th>
			<th>nama lengkap</th>		
		</tr>
		<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($ys_login as $u){ 
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $u->username ?></td>
			<td><?php echo $u->stts ?></td>
			<td><?php echo $u->nama_lengkap ?></td>
		</tr>
	<?php } ?>
	</table>
	<br/>
	<?php 
	echo $this->pagination->create_links();
	?>
        </div>
</div>
</body>
</html>