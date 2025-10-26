<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Tambah Film Baru</title>
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
            <h1 class="main-title text-success my-5 text-center">TAMBAH FILM</h1>

            <form action="create.php" method="POST">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul">
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <select class="form-select" id="genre" name="genre" required>
                        <option value="" disabled selected>Pilih genre</option>
                        <option value="Romance">Romance</option>
                        <option value="Action">Action</option>
                        <option value="Horror">Horror</option>
                        <option value="Comedy">Comedy</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sutradara" class="form-label">Sutradara</label>
                    <input type="text" class="form-control" id="sutradara" name="sutradara" required placeholder="Masukkan Sutradara">
                </div>
                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun Rilis</label>
                    <input type="number" class="form-control" id="tahun" name="tahun" min="1888" max="2025" required placeholder="Masukkan Tahun Rilis">
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