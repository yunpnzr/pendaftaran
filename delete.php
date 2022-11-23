<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'pendaftaran_siswa_baru'; // Nama Database
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Gagal terhubung MySQL: ' . mysqli_connect_error());	
}

$id_daftar = $_GET['id_daftar'];
$query = "DELETE FROM siswa_baru where id_daftar = '$id_daftar' ";
$hasil = mysqli_query($conn,$query);

$nomor = $_GET['nomor'];
$query = "SELECT*FROM siswa_baru ORDER BY nomor";
$hasil = mysqli_query($conn,$query);
$no = 1;
 
while ($data  = mysqli_fetch_array($hasil))
{
   // membaca id dari record yang tersisa dalam tabel
   $nomor = $data['nomor'];
   
   // proses updating id dengan nilai $no
   $query2 = "UPDATE sample SET nomor = $no WHERE nomor = $nomor";
   mysqli_query($conn,$query2);
 
   // increment $no
   $no++;   
}
 
// mengubah nilai auto increment menjadi $no terakhir ditambah 1
$query = "ALTER TABLE sample  AUTO_INCREMENT = $no";
mysqli_query($conn,$query); 

header ("location:output.php");
?>