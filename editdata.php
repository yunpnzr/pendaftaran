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

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
	$id_daftar = $_POST['id_daftar'];
	$nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $agama = $_POST['agama'];
    $sekolahasal = $_POST['sekolahasal'];

    // buat query update
    $sql = "UPDATE siswa_baru SET nama='$nama', alamat='$alamat', jeniskelamin='$jeniskelamin', agama='$agama',sekolahasal='$sekolahasal' WHERE id_daftar='$id_daftar'";
    $query = mysqli_query($conn, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: output.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}


?>