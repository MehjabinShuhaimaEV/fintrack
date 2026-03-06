<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | FinTrack</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            background: linear-gradient(135deg, #e6f2ff, #ffffff);
            font-family: "Poppins", sans-serif;
        }

        .flash-container {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 2000;
    width: 420px;
    max-width: 90%;
}

.flash-msg {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 18px;
    border-radius: 12px;
    color: #fff;
    font-size: 15px;
    font-weight: 500;
    box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.15);
    margin-bottom: 12px;
    animation: slideDown 0.4s ease-out;
    border-left: 6px solid;
}

.flash-msg.success {
    background: linear-gradient(135deg, #38c172, #2d995b);
    border-color: #1f7a45;
}

.flash-msg.error {
    background: linear-gradient(135deg, #e3342f, #cc1f1a);
    border-color: #a31313;
}

.flash-msg i {
    font-size: 20px;
}

@keyframes slideDown {
    0% {
        opacity: 0;
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}


        .login-wrapper {
            max-width: 900px;
            margin: 70px auto;
            padding: 20px;
        }
        .head{
            text-align: center;
            margin-bottom: 30px;

        }

        .login-card {
            display: flex;
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.12);
            overflow: hidden;
        }

        .login-left {
            flex: 1;
            padding: 45px 40px;
        }

        .login-right {
            flex: 1;
            background: #9e8edd;
            /* background: #fbfbfbff; */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .login-right img {
            width: 85%;
            max-width: 330px;
            filter: drop-shadow(0px 6px 14px rgba(0, 0, 0, 0.2));
        }

        .login-title {
            font-weight: 800;
            font-size: 32px;
            color: #003d71;
        }

        .tagline {
            color: #555;
            font-size: 14px;
        }

        .form-control {
            height: 46px;
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #0056b3;
            border-radius: 10px;
            height: 46px;
            font-weight: 600;
            border: none;
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            padding-right: 40px;
        }

        .toggle-eye {
            margin-top: 14px;
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #555;
        }

        .admin-link {
            display: block;
            text-align: center;
            margin-top: 18px;
            font-weight: 500;
            color: #0056b3;
            text-decoration: none;
        }

        .admin-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .login-card {
                flex-direction: column;
            }

            .login-right {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- Flash Messages -->
    <div class="flash-container position-fixed top-0 start-50 translate-middle-x mt-3"
        style="z-index: 1050; width: 400px; max-width: 90%;">

        <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success shadow-sm">
            <?= session()->getFlashdata('success') ?>
        </div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger shadow-sm">
            <?= session()->getFlashdata('error') ?>
        </div>
        <?php endif; ?>

    </div>
    <div class="flash-container">
    <?php if(session()->getFlashdata('success')): ?>
        <div class="flash-msg success">
            <i class="bi bi-check-circle"></i>
            <span><?= session()->getFlashdata('success') ?></span>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="flash-msg error">
            <i class="bi bi-exclamation-triangle"></i>
            <span><?= session()->getFlashdata('error') ?></span>
        </div>
    <?php endif; ?>
</div>
        

    <div class="login-wrapper">
        <div class="login-card">

            <!-- LEFT SIDE -->
            <div class="login-left">
                <div class="head">
                <h2 class="login-title">FinTrack</h2>
                <p class="tagline mt-2 mb-3">Track your income & expenses with smarter insights.</p>
                </div>
                <form action="<?= base_url('/check') ?>" method="post">

                    <div class="mb-3">
                        <label class="fw-semibold">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                    </div>

                    <div class="mb-3 password-wrapper">
                        <label class="fw-semibold">Password</label>
                        <input type="password" name="password" id="passwordField" class="form-control"
                            placeholder="Enter password" required>
                        <i class="bi bi-eye-slash toggle-eye" id="togglePassword"></i>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-2">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </button>

                    <!-- ADMIN LOGIN LINK -->
                    

                    <div class="text-center mt-3">
                        <span>Don't have an account?</span>
                        <a href="<?= base_url('/register') ?>" style="text-decoration:none;">Sign Up</a>
                    </div>
                    <a href="<?= base_url('admin') ?>" class="admin-link">
                        <i class="bi bi-person-badge"></i> Login as Admin
                    </a>

                </form>
            </div>

            <!-- RIGHT SIDE (Improved Finance Image) -->
            <div class="login-right">
                 <img src="<?= base_url('assets/images/login-bg.jpeg') ?>" class="img-fluid" alt="Login Background">
            

            </div>

        </div>
    </div>

    <script>
        const passwordField = document.getElementById("passwordField");
        const togglePassword = document.getElementById("togglePassword");

        togglePassword.addEventListener("click", function () {
            const type = passwordField.type === "password" ? "text" : "password";
            passwordField.type = type;

            this.classList.toggle("bi-eye");
            this.classList.toggle("bi-eye-slash");
        });

        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(a => a.remove());
        }, 4000);
        document.querySelector('form').addEventListener('submit', function(e) {
       const btn = this.querySelector('button[type="submit"]');
       btn.disabled = true;
       btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Logging in...';
   });
   document.querySelector('form').addEventListener('submit', function(e) {
       const btn = this.querySelector('button[type="submit"]');
       btn.disabled = true;
       btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Logging in...';
   });
    </script>

</body>

</html>
