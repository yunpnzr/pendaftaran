<?php
// include database connection file
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'pendaftaran_siswa_baru'; // Nama Database
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Gagal terhubung MySQL: ' . mysqli_connect_error());	
}

$table_name = 'siswa_baru';

if(isset($_POST['simpan'])){

    $id_daftar= $_POST['id_daftar'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $agama = $_POST['agama'];
    $sekolahasal = $_POST['sekolahasal'];

    $sql = "INSERT INTO `$table_name`(`id_daftar`,`nama`,`alamat`,`jeniskelamin`,`agama`,`sekolahasal`)
        VALUES('$id_daftar','$nama','$alamat','$jeniskelamin','$agama','$sekolahasal')";

    $query = mysqli_query($conn, $sql);

    if (!$query){
        die('Error'.$table_name.': '.mysqli_error($conn));
    }

    echo '<p>Data berhasil dimasukkan pada tabel '.$table_name.'</p>';
    echo '<p><a href="index.php">Kembali ke laman awal</a> atau <a href="output.php">Lihat data pendaftar</a></p>';
}
?>