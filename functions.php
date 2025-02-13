<?php 
$conn = mysqli_connect("sql12.freesqldatabase.com", "sql12762573", "u5rQcSVurh", "sql12762573"); 
// $conn0 = mysqli_connect("localhost", "root", "", "phpdasar"); 
// $conn2 = mysqli_connect("sql213.infinityfree.com", "if0_38298252", "newLPifa1", "if0_38298252_XXX"); 

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
};

function add($data){
    global $conn;
    // var_dump($_POST);
    // id
    $name = htmlspecialchars($data["name"]);
    $email = htmlspecialchars($data["email"]);
    $status = htmlspecialchars($data["graduation"]);
    $image = htmlspecialchars($data["image"]);
    $prodi = htmlspecialchars($data["prodi"]);
    // Tangkap NIM dari form
    $nim = htmlspecialchars($data["nim"]); // Contoh input: "20/455604/PN/16504"
    // Pisahkan data berdasarkan tanda '/'
    $nim_parts = explode("/", $nim);
    // Validasi apakah NIM memiliki 4 bagian
    if (count($nim_parts) === 4) {
        $angkatan = $nim_parts[0]; // Bagian pertama
        $niu = $nim_parts[1];      // Bagian kedua
        $fakultas = $nim_parts[2]; // Bagian ketiga
        $nif = $nim_parts[3];      // Bagian keempat
    }
    // else {
    //     die("Format NIM tidak valid. Harus berformat '20/455604/PN/16504'.");
    // }
    // query insert data
    $query = "INSERT INTO mahasiswa VALUES 
    ('', '$name', '$angkatan', '$niu', '$fakultas', '$nif', '$prodi', '$email', '$status', '$image')";
    mysqli_query($conn, $query);
    // cek apakah data berhasil ditambahkan atau tidak
    if (mysqli_affected_rows($conn) > 0){
        $input = "<script>
            alert('Data BERHASIL ditambahkan!');
            document.location.href = 'index.php';
        </script>";
        return $input;
    } else {
        $error_message = mysqli_error($conn);
        $input = "<script>
            alert('Data GAGAL ditambahkan!\nError: $error_message');
            document.location.href = 'add.php';
        </script>";
        return $input;
        // ERROR belum muncul karena MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT bukan MYSQLI_REPORT_OFF (masih belajar)
    }
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    // cek apakah data berhasil ditambahkan atau tidak
    if (mysqli_affected_rows($conn) > 0){
        $input = "<script>
            alert('Data BERHASIL dihapus!');
            document.location.href = 'index.php';
        </script>";
        return $input;
    } else {
        $error_message = mysqli_error($conn);
        $input = "<script>
            alert('Data GAGAL dihapus!\nError: $error_message');
            document.location.href = 'add.php';
        </script>";
        return $input;
        // ERROR belum muncul karena MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT bukan MYSQLI_REPORT_OFF (masih belajar)
    }
}

function edit($data){
    global $conn;
    // var_dump($_POST);
    $id = $data["id"];
    $name = htmlspecialchars($data["name"]);
    $email = htmlspecialchars($data["email"]);
    $status = htmlspecialchars($data["graduation"]);
    $image = htmlspecialchars($data["image"]);
    $prodi = htmlspecialchars($data["prodi"]);
    // Tangkap NIM dari form
    $nim = htmlspecialchars($data["nim"]); // Contoh input: "20/455604/PN/16504"
    // Pisahkan data berdasarkan tanda '/'
    $nim_parts = explode("/", $nim);
    // Validasi apakah NIM memiliki 4 bagian
    if (count($nim_parts) === 4) {
        $angkatan = $nim_parts[0]; // Bagian pertama
        $niu = $nim_parts[1];      // Bagian kedua
        $fakultas = $nim_parts[2]; // Bagian ketiga
        $nif = $nim_parts[3];      // Bagian keempat
    }
    // else {
    //     die("Format NIM tidak valid. Harus berformat '20/455604/PN/16504'.");
    // }
    // query insert data
    $query = "UPDATE mahasiswa SET 
    nama='$name', 
    angkatan='$angkatan', 
    niu='$niu', 
    fakultas='$fakultas', 
    nif='$nif', 
    prodi='$prodi', 
    email='$email', 
    status='$status', 
    gambar='$image'
    WHERE id = $id";
    mysqli_query($conn, $query);
    // cek apakah data berhasil ditambahkan atau tidak
    if (mysqli_affected_rows($conn) > 0){
        $input = "<script>
            alert('Data BERHASIL diubah!');
            document.location.href = 'index.php';
        </script>";
        return $input;
    } else {
        $error_message = mysqli_error($conn);
        $input = "<script>
            alert('Data GAGAL diubah!\nError: $error_message');
            document.location.href = 'add.php';
        </script>";
        return $input;
        // ERROR belum muncul karena MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT bukan MYSQLI_REPORT_OFF (masih belajar)
    }
};

function search($keyword){
    $query = "SELECT * FROM mahasiswa 
                WHERE
            nama LIKE '%$keyword%' OR
            fakultas LIKE '%$keyword%' OR
            prodi LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            niu LIKE '%$keyword%' OR
            nif LIKE '%$keyword%'
            ";
    return query($query);
}

// DROPDOWN SHORT, AUTO typing, FILTER, back all
?>

<!-- BELUM TERPAKAI -->
<?php
// // Cek apakah koneksi berhasil
// if (!$conn) {
//     die("Koneksi gagal: " . mysqli_connect_error());
// };
// // Cek hasil query
// if (!$result) {
//     die("Query gagal: " . mysqli_error($conn));
// };
?>