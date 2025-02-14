<?php 
die("Situs sedang dalam perbaikan. Silakan kembali nanti."); 
// maintenance
require 'functions.php';
if (isset($_POST["submit"])){
    $result = add($_POST);
    echo $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <a href="index.php">Kembali ke Halaman Admin</a>
    <br><br>
    <form action="" method="POST">
        <ul>
            <li><label for="name">Nama</label>
            <input type="text" name="name" id="name" required></li>
            <li><label for="email">email</label>
            <input type="email" name="email" id="email" required></li>
            <li><label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" required></li>
            <li><label for="prodi">Prodi</label>
            <input type="text" name="prodi" id="prodi" required></li>
            <li>Status Kelulusan
                <input type="radio" name="graduation" id="yes" value=1 required>
                <label for="yes">Sudah Lulus</label>
                <input type="radio" name="graduation" id="no" value=0 required>
                <label for="no">Belum Lulus</label>
            </li>
            <li><label for="image">Gambar</label>
            <input type="text" name="image" id="image" required></li>
            <!-- <input type="image" name="image" id="image" required></li> -->
<br>
            <li><button type="submit" name="submit">Tambah Data!</button> | 
            <button type="reset">Reset!</button></li>
        </ul>
    </form>
</body>
</html>
<!-- Kurang Cek Kesesuaian Format dan Ketentuan -->