<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftar</title>
    <style>
        body {font-family:tahoma, arial}
        table {border-collapse: collapse}
        th, td {font-size: 13px; border: 1px solid #DEDEDE; padding: 3px 5px; color: #303030}
        th {background: #CCCCCC; font-size: 12px; border-color:#B0B0B0}
        .subtotal td {background: #F8F8F8}
        .right{text-align: right}
	</style>
</head>
<body>
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
    ?>
    <table>
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nomor DB</th>
                <th>ID Registrasi</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Sekolah Asal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = 'SELECT * FROM siswa_baru';		
            $query = mysqli_query($conn, $sql);

            if (!$query) {
                die ('SQL Error: ' . mysqli_error($conn));
            }		

            $no=1;
            while ($row = mysqli_fetch_array($query))
            {
                echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$row['nomor'].'</td>
                        <td>'.$row['id_daftar'].'</td>
                        <td>'.$row['nama'].'</td>
                        <td>'.$row['alamat'].'</td>
                        <td>'.$row['jeniskelamin'].'</td>
                        <td>'.$row['agama'].'</td>
                        <td>'.$row['sekolahasal'].'</td>
                        <td>
                            <a href=edit.php?id_daftar='.$row['id_daftar'].' class="tombol">Edit</a>	
			                <a href=delete.php?id_daftar='.$row['id_daftar'].' class="tombol">Hapus</a> 	
                        </td>
                    </tr>';
                $no++;
            }

            $id_daftar = isset($row['id_daftar']) ? $row['id_daftar'] : '';
            $dbNomor = "UPDATE siswa_baru SET nomor='$no' WHERE id_daftar='$id_daftar'";
            $query = mysqli_query($conn, $dbNomor);

            if( $query ) {
                echo "Berhasil";
            } else {
                // kalau gagal tampilkan pesan
                die("Gagal menyimpan perubahan...");
            }
        ?>
        </tbody>
    </table>
    <p><a href="pendaftaran.php">Kembali ke form pendaftaran</a> atau <a href="index.php">Kembali ke halaman depan</a></p>
</body>
</html>