<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Services</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">My Website</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="<?= base_url('/') ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_URL('product') ?>">product</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_URL('about') ?>">About</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_URL('services') ?>">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_URL('contact') ?>">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- SERVICES SECTION -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Our Services</h2>

    <div class="row">

        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h4>Web Development</h4>
                <p>We build modern, fast, and responsive websites using PHP, CodeIgniter, and React.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h4>API Integration</h4>
                <p>Secure RESTful API development and integration for mobile and web applications.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h4>UI/UX Design</h4>
                <p>Clean and modern user interface designs for web applications.</p>
            </div>
        </div>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
