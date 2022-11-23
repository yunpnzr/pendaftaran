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

    $semua=mysqli_query($conn,"SELECT max(id_daftar) as maxKode FROM siswa_baru");
    $data=mysqli_fetch_array($semua);
    $kode=$data['maxKode'];
    $noUrut=(int)substr($kode,9,3);
    $noUrut++;

    $waktu=date('dmy');
    $nounik="REG".$waktu.sprintf("%03s",$noUrut);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir</title>
</head>
<body>
    <h1>Formulir Pendaftaran Siswa Baru</h1>
    <br>

    <form name="formInput" action="proses_data.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <label for="id_daftar">ID Registrasi: 
            <input type="text" name="id_daftar" id="id_daftar" value="<?php echo $nounik ?>" readonly>
        </label>
        <br>
        <br>
        <label for="nama">Nama: 
            <input type="text" name="nama" id="nama">
        </label>
        <br>
        <br>
        <label for="alamat">Alamat: 
            <textarea name="alamat" id="alamat" cols="30" rows="10"></textarea>
        </label>
        <br>
        <br>
        <label for="jeniskelamin">Jenis Kelamin
            <input type="radio" name="jeniskelamin" id="lakilaki" value='Laki-Laki'>Laki Laki
            <input type="radio" name="jeniskelamin" id="perempuan" value='Perempuan'>Perempuan
        </label>
        <br>
        <br>
        <label for="agama">Agama
            <select name="agama" id="agama">
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristem</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Yahudi">Yahudi</option>
            </select>
        </label>
        <br>
        <br>
        <label for="sekolah">Sekolah Asal: 
            <input type="text" name="sekolahasal" id="sekolah">
        </label>
        <br>
        <br>
        <input type="submit" value="submit" name="simpan">
    </form>

    <script>
		function validateForm() {
			if(document.forms["formInput"]["nama"].value==""){
				alert("Nama tidak boleh kosong!");
				document.forms["formInput"]["nama"].focus();
				return false;
			}
			if(document.forms["formInput"]["alamat"].value==""){
				alert("Alamat tidak boleh kosong!");
				document.forms["formInput"]["alamat"].focus();
				return false;
			}
			if(document.forms["formInput"]["jeniskelamin"].value==""){
				alert("Jenis kelamin tidak boleh kosong!");
				document.forms["formInput"]["jeniskelamin"].focus();
				return false;
			}
            if(document.forms["formInput"]["agama"].value==""){
				alert("Agama tidak boleh kosong! Kamu bukan atheis!");
				document.forms["formInput"]["agama"].focus();
				return false;
			}
            if(document.forms["formInput"]["sekolahasal"].value==""){
				alert("Sekolah asal tidak boleh kosong!");
				document.forms["formInput"]["sekolahasal"].focus();
				return false;
			}
		}
	</script>
</body>
</html>