<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Manajemen Data Mahasiswa</h1>

    <!-- Form Input Data Mahasiswa -->
    <form action="process.php" method="POST">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required><br><br>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" required><br><br>

        <input type="submit" name="insert" value="Tambah Data">
    </form>

    <h2>Data Mahasiswa</h2>
    <!-- Tabel Tampilan Data -->
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Email</th>
            <th>Alamat</th>
        </tr>

        <?php
        // Koneksi ke database
        $conn = new mysqli("localhost", "root", "", "mahasiswa_db");
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Tampilkan semua data mahasiswa
        $sql = "SELECT * FROM mahasiswa";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['Nama'] . "</td>";
                echo "<td>" . $row['NIM'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['Alamat'] . "</td>";
                echo "<td>
                    <a href='edit.php?ID=" . $row['ID'] . "'>Edit</a> |
                    <a href='process.php?delete=" . $row['ID'] . "' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
