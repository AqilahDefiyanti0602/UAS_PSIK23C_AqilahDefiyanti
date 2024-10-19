<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "mahasiswa_db");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tambah data mahasiswa
if (isset($_POST['insert'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO mahasiswa (nama, nim, alamat) VALUES ('$nama', '$nim', '$alamat')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Location: index.php"); // Redirect ke halaman utama
    exit();
}

// Hapus data mahasiswa
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM mahasiswa WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus!";
    } else {
        echo "Error: " . $conn->error;
    }
    header("Location: index.php");
    exit();
}

$conn->close();
?>
