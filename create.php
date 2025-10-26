<?php
    require_once(__DIR__ . "/connection.php");

    if(!$connection){
        die("Koneksi gagal" . mysqli_connect_error());
    }
    echo "<br>";

        $judul = $_POST["judul"];
        $genre = $_POST["genre"];
        $sutradara = $_POST["sutradara"];
        $tahun = $_POST["tahun"];

        $sql = "INSERT INTO film (judul, genre, sutradara, tahun) VALUES (?,?,?,?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sssi",$judul, $genre, $sutradara, $tahun);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Data berhasil ditambahkan!');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menambahkan data!');
                    window.location.href = 'tambah.php';
                  </script>";
        }

        $stmt->close();
        $connection->close();
    ?>