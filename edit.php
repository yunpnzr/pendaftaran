<?php

$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'pendaftaran_siswa_baru'; // Nama Database
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Gagal terhubung MySQL: ' . mysqli_connect_error());	
}


// kalau tidak ada id di query string
if( !isset($_GET['id_daftar']) ){
    header('Location: pendaftaran.php');
}

//ambil id dari query string
$id_daftar = $_GET['id_daftar'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM siswa_baru WHERE id_daftar='$id_daftar'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Formulir Edit data</title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
</head>

<body>
 <div class="container">
    <header>
        <h3>Formulir Edit Data Pendaftar</h3>
    </header>
	<div id="content">
	<form name="formInput" action="editdata.php" method="post" enctype="multipart/form-data">
		<table id="tabel-input">

            <input type="text" name="id_daftar" value="<?php echo $data['id_daftar'] ?>" />

			<tr>
			
            <td class="label-formulir">Nama</td>
            <td class="isian-formulir"><input type="text" name="nama" placeholder="nama" value="<?php echo $data['nama'] ?>" /></td>
			</tr>
        
			<tr>
			<td class="label-formulir">Alamat</td>
			<td class="isian-formulir"><textarea name="alamat" placeholder="alamat" value="<?php echo $data['alamat'] ?>"></textarea></td>
			</tr>
  
			<tr>
			<td class="label-formulir">Sekolah Asal</td>
          	<td class="isian-formulir"><input type="text" name="sekolahasal" placeholder="sekolah" value="<?php echo $data['sekolahasal'] ?>" /></td>
			</tr>

			<form action="editdata.php" method="POST">
				<tr>
				<td class="label-formulir">Jenis Kelamin</td>
				<td class="isian-formulir"><input type="radio" name="jeniskelamin" value="Laki-Laki"/>laki-Laki</td>
				<td class="isian-formulir"><input type="radio" name="jeniskelamin" value="Perempuan"/>Perempuan</td>
				</tr>
			</form>

            <tr>
			<td class="label-formulir">Agama</td>
          	<td class="isian-formulir">
                <select name="agama" id="agama" value="<?php echo $data['agama'] ?>">
					<option value="Islam">Islam</option>
					<option value="Kristen">Kristen</option>
					<option value="Buddha">Buddha</option>
					<option value="Hindu">Hindu</option>
					<option value="Yahudi">Yahudi</option>
				</select>
            </td>
			</tr>
			
			<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="submit" name="simpan" value="Update" class="tombol"></td>
			</tr>

    </form>
	</div>