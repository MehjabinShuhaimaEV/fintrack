<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>

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

<!-- CONTACT PAGE CONTENT -->
<div class="container mt-5">

    <h2 class="text-center mb-4">Contact Us</h2>

    <div class="row">
        <!-- Contact Info -->
        <div class="col-md-5">
            <h4>Get in Touch</h4>
            <p>If you have any questions, feel free to reach out to us.</p>

            <p><strong>Email:</strong> support@mywebsite.com</p>
            <p><strong>Phone:</strong> +91 98765 43210</p>
            <p><strong>Address:</strong> Chennai, India</p>
        </div>

        <!-- Contact Form -->
        <div class="col-md-7">
            <div class="card p-4 shadow-sm">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Your Name</label>
                        <input type="text" class="form-control" placeholder="Enter your name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" placeholder="Enter your email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" rows="4" placeholder="Type your message"></textarea>
                    </div>

                    <button class="btn btn-dark w-100">Send Message</button>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
