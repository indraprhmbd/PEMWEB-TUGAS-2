<?php
require_once(__DIR__ . "/connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: index.php");
    exit;
}

$sql = "SELECT * FROM film WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<script>
            alert('Data tidak ditemukan!');
            window.location.href = 'index.php';
          </script>";
    exit;
}

$data = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Edit Film</title>

    <style>
        .btn:hover{
            transform: scale(1.05);
            transition: transform ease 0.3s;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-success">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="index.php">Manajemen Film</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-light" href="index.php">Home</a>
                    <a class="nav-link text-light active" aria-current="page" href="tambah.php">Tambah Film</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid justify-content-center">
        <div class="container">
            <h1 class="main-title text-success my-5 text-center">EDIT FILM</h1>

            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                <div class="mb-3">
                    <label class="form-label">Judul Film</label>
                    <input type="text" class="form-control" name="judul" value="<?php echo $data['judul']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Genre</label>
                    <select class="form-select" name="genre" required>
                        <option value="Romance" <?php if ($data['genre'] == 'Romance') echo 'selected'; ?>>Romance</option>
                        <option value="Action" <?php if ($data['genre'] == 'Action') echo 'selected'; ?>>Action</option>
                        <option value="Horror" <?php if ($data['genre'] == 'Horror') echo 'selected'; ?>>Horror</option>
                        <option value="Comedy" <?php if ($data['genre'] == 'Comedy') echo 'selected'; ?>>Comedy</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tahun</label>
                    <input type="number" class="form-control" name="tahun" min="1888" max="2025" value="<?php echo $data['tahun']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Sutradara</label>
                    <input type="text" class="form-control" name="sutradara" value="<?php echo $data['sutradara']; ?>" required>
                </div>

                <div class="justify-content-center row">
                    <button type="submit" class="btn btn-success text-center">Simpan</button>
                </div>
            </form>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>