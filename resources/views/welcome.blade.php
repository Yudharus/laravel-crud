<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            min-height: 100vh;
            position: relative;
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 60px;
            line-height: 60px; /* Vertically center the text */
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Manajemen Produk - Rio Franata - 10118003 - ATOL-UL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <!-- <a class="nav-link" href="{{ route('login') }}">Login</a> -->
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2>Selamat datang di Sistem Manajemen Produk</h2>
            <p>Dibuat untuk memenuhi Tugas Ujian Tengah Semester Mata Kuliah Aplikasi Teknologi Online.</p>
            <button class="btn btn-primary">
                <a class="nav-link" href="{{ route('login') }}">Login</a>

            </button>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('images/logo.jpg') }}" alt="Product Management" class="img-fluid">
        </div>
    </div>
</div>

<footer class="footer bg-light text-center p-3">
    <p>&copy; Rio Franata - 10118003 - ATOL-UL</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
