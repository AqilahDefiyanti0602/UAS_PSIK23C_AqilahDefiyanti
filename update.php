<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "mahasiswa_db");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Update data mahasiswa
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', alamat='$alamat' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diperbarui!";
    } else {
        echo "Error: " . $conn->error;
    }
    header("Location: index.php");
    exit();
}

$conn->close();
?>
