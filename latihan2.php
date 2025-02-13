<?php 
$conn = mysqli_connect("localhost", "root", "", "phpdasar"); // Tambahkan nama database
// Cek apakah koneksi berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
};
// Jalankan query
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
// Cek hasil query
if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
};
// Contoh menampilkan hasil query
// while ($row = mysqli_fetch_assoc($result)) {
//     echo "Nama: " . $row['nama'] . "<br>";
// };
// var_dump($conn);
// var_dump($result)
// while ($row = mysqli_fetch_assoc($result)) {
//     echo $row['nama'] . "<br>";
// };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>email</th>
            <th>Fakultas</th>
            <th>Status</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td>
                <a href="">ubah</a> | <a href="">hapus</a>
            </td>
            <td><img src="<?= $row['gambar'] ?>" alt="gambar <?= $row['nama'] ?>" width="50"></td>
            <td><?= $row['angkatan'] ?>/<?= $row['niu'] ?>/<?= $row['fakultas'] ?>/<?= $row['nif'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['fakultas'] ?></td>
            <td><?= ($row['status'] == true) ? "Lulus" : "Belum Lulus";  ?></td>
        </tr>
        <?php endwhile?>
    </table>
</body>
</html>