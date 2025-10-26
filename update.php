<?php
require_once(__DIR__ . "/connection.php");

if (!$connection) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$id         = $_POST["id"];
$judul      = $_POST["judul"];
$genre      = $_POST["genre"];
$sutradara  = $_POST["sutradara"];
$tahun      = $_POST["tahun"];

$sql = "UPDATE film 
        SET judul = ?, genre = ?, sutradara = ?, tahun = ?
        WHERE id = ?";

$stmt = $connection->prepare($sql);
$stmt->bind_param("sssii", $judul, $genre, $sutradara, $tahun, $id);

if ($stmt->execute()) {
    echo "<script>
            alert('Data berhasil diperbarui!');
            window.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal memperbarui data!');
            window.location.href = 'edit.php?id=$id';
          </script>";
}

$stmt->close();
$connection->close();
?>
