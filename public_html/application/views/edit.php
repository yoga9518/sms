<html>
	<head>
		<title>Tabel Mahasiswa</title>
	</head>
	<body>
		<form method="POST" action="<?php echo base_url()."index.php/crud/do_update"; ?>">
		<table>
			<tr>
				<td>Nim</td>
				<td><input type="text" name="nim" value="<?php echo $username; ?>" readonly /></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" value="<?php echo $nama_lengkap; ?>"/></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><textarea name="alamat"><?php echo $stts; ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnsubmit" value="Simpan" /></td>
			</tr>
		</table>
		</form>
	</body>
</html> 