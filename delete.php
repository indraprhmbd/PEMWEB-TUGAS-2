<?php
require_once(__DIR__ . "/connection.php");

if (!isset($_GET['id'])) {
    echo "<script>
            alert('ID tidak ditemukan!');
            window.location.href = 'index.php';
          </script>";
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM film WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menghapus data!');
            window.location.href = 'index.php';
          </script>";
}

// 4️⃣ Tutup koneksi
$stmt->close();
$connection->close();
?>
