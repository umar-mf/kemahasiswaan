<?php 
die("Situs sedang dalam perbaikan. Silakan kembali nanti."); 
// maintenance
require "functions.php";
$mahasiswa = query("SELECT * FROM mahasiswa");
if (isset($_POST["search"])) {
    $mahasiswa = search($_POST["keyword"]);
}
// var_dump($conn);
// var_dump($result)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <main>
        <div>
            <h2 class="text-center">Daftar Mahasiswa</h2>
        </div>
        <div class="row mb-3 ">
            <div class="col">
                <form action="" method="post">
                    <label for="keyword" class="col-form-label col-form-label-sm">Cari data mahasiswa</label>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">
                            <label for="keyword">Keyword</label>
                        </span>
                        <input type="text" name="keyword" class="form-control" id="keyword" autocomplete="off" placeholder="masukkan keyword pencarian...">
                        <button name="search" class="btn btn-outline-secondary btn-light" type="submit" id="search">Cari!</button>
                    </div>
                    <div class="form-text fst-italic">Silahkan masukkan keyword: nama, niu, nif, email, prodi, fakultas, atau status kelulusan</div>
                </form>
            </div>
            <div class="col align-self-end d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="add.php" class="btn btn-warning btn-sm">Tambah Data Mahasiswa</a>
            </div>
        </div>
        <div>
            <table class="table table-bordered table-striped table-hover table-sm"> 
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Gambar</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>email</th>
                        <th>Fakultas</th>
                        <th>Prodi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php $i = 1 ?>
                    <?php foreach ($mahasiswa as $row) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id'] ?>">ubah</a> | <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('yakin?')">hapus</a>
                            </td>
                            <td><img src="<?= $row['gambar'] ?>" alt="gambar <?= $row['nama'] ?>" width="50"></td>
                            <td><?= $row['angkatan'] ?>/<?= $row['niu'] ?>/<?= $row['fakultas'] ?>/<?= $row['nif'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['fakultas'] ?></td>
                            <td><?= $row['prodi'] ?></td>
                            <td><?= ($row['status'] == true) ? "Lulus" : "Belum Lulus";  ?></td>
                        </tr>
                    <?php $i++ ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </main>
</div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>