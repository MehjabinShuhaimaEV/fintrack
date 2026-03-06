<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>

    <!-- Bootstrap CDN -->
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

<!-- MAIN CONTENT -->
<div class="container mt-5">

    <h2 class="mb-3">About Us</h2>

    <p>
        Welcome to <strong>My Website</strong>, where we are dedicated to providing quality service and a great user experience.
        Our goal is to create simple, clean, and user-friendly applications using modern technologies.
    </p>

    <h4 class="mt-4">Our Mission</h4>
    <p>
        To deliver innovative and efficient web solutions that help individuals and businesses grow.
    </p>

    <h4 class="mt-4">Our Vision</h4>
    <p>
        To become a leading name in web development by maintaining high standards and customer satisfaction.
    </p>

    <h4 class="mt-4">Why Choose Us?</h4>
    <ul>
        <li>Professional and responsive designs</li>
        <li>User-friendly interfaces</li>
        <li>Dedicated support</li>
        <li>Affordable and reliable services</li>
    </ul>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
