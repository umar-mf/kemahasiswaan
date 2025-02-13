<?php 
require 'functions.php';
$id = $_GET['id'];
$mhs = query("SELECT * FROM mahasiswa WHERE id=$id")[0];
if (isset($_POST["submit"])){
    $result = edit($_POST);
    echo $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>
    <a href="index.php">Kembali ke Halaman Admin</a>
    <br><br>
    <form action="" method="POST">
    <input type="hidden" name="id" id="id" value="<?= $mhs['id'] ?>"></li>
        <ul>
            <li><label for="name">Nama</label>
            <input type="text" name="name" id="name" required value="<?= $mhs['nama'] ?>"></li>
            <li><label for="email">email</label>
            <input type="email" name="email" id="email" required value="<?= $mhs['email'] ?>"></li>
            <li><label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" required value="<?= $mhs['angkatan'] ?>/<?= $mhs['niu'] ?>/<?= $mhs['fakultas'] ?>/<?= $mhs['nif'] ?>"></li>
            <li><label for="prodi">Prodi</label>
            <input type="text" name="prodi" id="prodi" required value="<?= $mhs['prodi'] ?>"></li>
            <li>Status Kelulusan
                <input type="radio" name="graduation" id="yes" value=1 required <?php if ($mhs['status'] == 1) echo 'checked'; ?>>
                <label for="yes">Sudah Lulus</label>
                <input type="radio" name="graduation" id="no" value=0 required <?php if ($mhs['status'] == 0) echo 'checked'; ?>>
                <label for="no">Belum Lulus</label>
            </li>
            <li><label for="image">Gambar</label>
            <input type="text" name="image" id="image" required value="<?= $mhs['gambar'] ?>"></li>
            <!-- <input type="image" name="image" id="image" required></li> -->
<br><br>
            <li><button type="submit" name="submit">Edit Data!</button> | 
            <button type="reset">Reset!</button></li>
        </ul>
    </form>
</body>
</html>
<!-- Kurang Cek Kesesuaian Format dan Ketentuan -->