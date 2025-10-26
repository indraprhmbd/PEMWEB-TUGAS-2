<?php
// $orderBy = $_GET['sort'] ?? 'id';
// $orderDir = $_GET['order'] ?? 'asc';
// $query = "SELECT * FROM film ORDER BY $orderBy $orderDir";

include 'connection.php';

// Validasi kolom yang bisa disort
$allowedColumns = ['id', 'judul', 'genre', 'tahun', 'sutradara'];

// Ambil parameter sort dan order
$orderBy = isset($_GET['sort']) && in_array($_GET['sort'], $allowedColumns) ? $_GET['sort'] : 'id';
$orderDir = isset($_GET['order']) && $_GET['order'] === 'desc' ? 'desc' : 'asc';

// Query dengan ORDER BY dinamis
$query = mysqli_query($connection, "SELECT * FROM film ORDER BY $orderBy $orderDir");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Daftar Film</title>

    <style>
        html {
            overflow: hidden;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }

        .btn:hover {
            transform: scale(1.05);
            transition: transform ease 0.3s;
        }

        @media (max-width:768px) {
            #main-image {
                display: none;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-success">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="">Manajemen Film</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active text-light" aria-current="page" href="">Home</a>
                    <a class="nav-link text-light" href="tambah.php">Tambah Film</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-9 my-5">
                <div class="row mb-3">
                    <h1>Selamat Datang di Manajemen Film</h1>
                    <h5>Ini adalah daftar film anda.</h5>
                </div>
                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>
                                    <a href="?sort=id&order=<?php echo ($orderBy == 'id' && $orderDir == 'asc') ? 'desc' : 'asc'; ?>" class="text-light text-decoration-none">
                                        No
                                        <?php if ($orderBy == 'id') echo $orderDir == 'asc' ? '▲' : '▼'; ?>
                                    </a>
                                </th>
                                <th>
                                    <a href="?sort=judul&order=<?php echo ($orderBy == 'judul' && $orderDir == 'asc') ? 'desc' : 'asc'; ?>" class="text-light text-decoration-none">
                                        Judul Film
                                        <?php if ($orderBy == 'judul') echo $orderDir == 'asc' ? '▲' : '▼'; ?>
                                    </a>
                                </th>
                                <th>
                                    <a href="?sort=genre&order=<?php echo ($orderBy == 'genre' && $orderDir == 'asc') ? 'desc' : 'asc'; ?>" class="text-light text-decoration-none">
                                        Genre
                                        <?php if ($orderBy == 'genre') echo $orderDir == 'asc' ? '▲' : '▼'; ?>
                                    </a>
                                </th>
                                <th>
                                    <a href="?sort=tahun&order=<?php echo ($orderBy == 'tahun' && $orderDir == 'asc') ? 'desc' : 'asc'; ?>" class="text-light text-decoration-none">
                                        Tahun
                                        <?php if ($orderBy == 'tahun') echo $orderDir == 'asc' ? '▲' : '▼'; ?>
                                    </a>
                                </th>
                                <th>
                                    <a href="?sort=sutradara&order=<?php echo ($orderBy == 'sutradara' && $orderDir == 'asc') ? 'desc' : 'asc'; ?>" class="text-light text-decoration-none">
                                        Sutradara
                                        <?php if ($orderBy == 'sutradara') echo $orderDir == 'asc' ? '▲' : '▼'; ?>
                                    </a>
                                </th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody class="table-group-divider">
                            <?php

                            include 'connection.php';

                            // validasi
                            $allowedColumns = ['id', 'judul', 'genre', 'tahun', 'sutradara'];

                            //ambil parameter
                            $orderBy = isset($_GET['sort']) && in_array($_GET['sort'], $allowedColumns) ? $_GET['sort'] : 'id';
                            $orderDir = isset($_GET['order']) && $_GET['order'] === 'desc' ? 'desc' : 'asc';

                            $query = mysqli_query($connection, "SELECT * FROM film ORDER BY $orderBy $orderDir");

                            if (mysqli_num_rows($query) == 0) {
                                echo "<tr><td colspan='6' class='text-center'>Tidak Ada Data Film.</td></tr>";
                            } else {
                                $no = 1;
                                while ($data = mysqli_fetch_assoc($query)) {
                            ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['judul']; ?></td>
                                        <td><?php echo $data['genre']; ?></td>
                                        <td><?php echo $data['tahun']; ?></td>
                                        <td><?php echo $data['sutradara']; ?></td>
                                        <td>
                                            <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                                        </td>
                                    </tr>
                            <?php
                                    $no++;
                                }
                            }
                            ?>
                        </tbody>

                    </table>
                </div>

            </div>
            <div class="col-md-3 my-5 justify-content-center">
                <img src="https://plus.unsplash.com/premium_photo-1684923604860-64e661f2ff72?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fG1vdmllfGVufDB8fDB8fHww&auto=format&fit=crop&q=60&w=" alt="" class="img-fluid" id="main-image" style="min-height: 80vh;">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>