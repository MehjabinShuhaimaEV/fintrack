<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MyApp</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            background: #f5f6fa;
            font-family: "Poppins", sans-serif;
        }

        .login-card {
            max-width: 400px;
            margin: 80px auto;
            padding: 35px;
            border-radius: 15px;
            background: #ffffff;
            box-shadow: 0px 5px 25px rgba(0, 0, 0, 0.12);
        }

        .login-title {
            font-weight: 700;
            font-size: 26px;
        }

        .form-control {
            height: 45px;
            border-radius: 10px;
        }

        .password-wrapper {
            position: relative;
        }

        .toggle-eye {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
        }

        .btn-dark {
            border-radius: 10px;
            height: 45px;
            font-weight: 600;
        }

        .small-text {
            font-size: 13px;
            color: #666;
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper .form-control {
            padding-right: 45px;
            /* Gives space for eye icon */
        }

        .toggle-eye {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            /* Proper size */
            color: #666;
            padding: 5px;
        }

        #togglePassword {
            margin-top: 15px;
        }
    </style>
</head>

<body>

    <div class="login-card">

        <h3 class="text-center login-title">Welcome Back</h3>
        <p class="text-center small-text mb-4">Please login to your account</p>

        <form action="<?= base_url('auth/check') ?>" method="post">

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email" required>
            </div>

            <!-- Password with Eye Icon -->
            <div class="mb-3 password-wrapper">
                <label class="form-label fw-semibold">Password</label>

                <input type="password" name="password" id="passwordField" class="form-control"
                    placeholder="Enter password" required>

                <i class="bi bi-eye-slash toggle-eye" id="togglePassword"></i>
            </div>


            <button type="submit" class="btn btn-dark w-100 mt-3">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </button>

            <div class="text-center mt-3">
                <span class="small-text">Don't have an account?</span>
                <a href="<?= base_url('register') ?>" class="fw-semibold" style="text-decoration:none;">Sign Up</a>
            </div>

        </form>

        

    </div>


    <!-- Show/Hide Password Script -->
    <script>
        const passwordField = document.getElementById("passwordField");
        const togglePassword = document.getElementById("togglePassword");

        togglePassword.addEventListener("click", function () {
            const type = passwordField.type === "password" ? "text" : "password";
            passwordField.type = type;

            this.classList.toggle("bi-eye");
            this.classList.toggle("bi-eye-slash");
        });
    </script>

</body>

</html>