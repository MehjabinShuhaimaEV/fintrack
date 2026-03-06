<!-- Bootstrap -->
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        position: relative;
        overflow-x: hidden;
    }

    /* Animated Background Elements */
    body::before,
    body::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
        animation: float 20s infinite ease-in-out;
        pointer-events: none;
    }

    body::before {
        width: 500px;
        height: 500px;
        top: -150px;
        left: -150px;
        animation-delay: 0s;
    }

    body::after {
        width: 400px;
        height: 400px;
        bottom: -100px;
        right: -100px;
        animation-delay: 5s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-40px) rotate(180deg); }
    }

    /* Flash Messages */
    .flash-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 2000;
        max-width: 400px;
    }

    .flash-msg {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 18px;
        border-radius: 12px;
        color: #fff;
        font-size: 14px;
        font-weight: 500;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
        margin-bottom: 12px;
        animation: slideIn 0.4s ease-out;
        backdrop-filter: blur(10px);
    }

    .flash-msg.success {
        background: linear-gradient(135deg, #10b981, #059669);
        border-left: 4px solid #047857;
    }

    .flash-msg.error {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        border-left: 4px solid #b91c1c;
    }

    @keyframes slideIn {
        0% {
            opacity: 0;
            transform: translateX(100px);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Main Container - WIDER */
    .register-container {
        width: 100%;
        max-width: 950px;
        position: relative;
        z-index: 10;
    }

    .register-card {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        padding: 40px 50px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        display: flex;
        gap: 50px;
        align-items: center;
    }

    /* Left Side - Logo & Info */
    .register-left {
        flex: 0 0 350px;
        text-align: center;
    }

    .logo-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }

    .logo-icon i {
        font-size: 40px;
        color: #fff;
    }

    .register-title {
        font-size: 28px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 10px;
    }

    .register-subtitle {
        color: #6b7280;
        font-size: 15px;
        margin-bottom: 30px;
    }

    /* Features List */
    .features-list {
        text-align: left;
        margin-top: 30px;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 16px;
        color: #4b5563;
        font-size: 14px;
    }

    .feature-icon {
        width: 36px;
        height: 36px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 16px;
        flex-shrink: 0;
    }

    /* Right Side - Form */
    .register-right {
        flex: 1;
    }

    /* Social Login - Side by Side */
    .social-login {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        margin-bottom: 24px;
    }

    .btn-social {
        height: 44px;
        border: 1.5px solid #e5e7eb;
        border-radius: 10px;
        background-color: #fff;
        color: #374151;
        font-weight: 500;
        font-size: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .btn-social:hover {
        border-color: #667eea;
        background-color: #f9fafb;
        transform: translateY(-1px);
    }

    .btn-social i {
        font-size: 16px;
    }

    /* Divider */
    .divider {
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 20px 0;
    }

    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background-color: #e5e7eb;
    }

    .divider span {
        color: #9ca3af;
        font-size: 13px;
    }

    /* Form Row - TWO COLUMNS */
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    /* Form Styling */
    .form-label {
        font-weight: 600;
        color: #374151;
        font-size: 13px;
        margin-bottom: 6px;
        display: block;
    }

    .form-control {
        height: 44px;
        border-radius: 10px;
        border: 1.5px solid #e5e7eb;
        padding: 10px 14px;
        font-size: 14px;
        transition: all 0.3s ease;
        background-color: #f9fafb;
        width: 100%;
    }

    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        background-color: #fff;
        outline: none;
    }

    .form-control.is-valid {
        border-color: #10b981;
        background-color: #f0fdf4;
    }

    .form-control.is-invalid {
        border-color: #ef4444;
        background-color: #fef2f2;
    }

    .mb-3 {
        margin-bottom: 16px;
    }

    /* Password Wrapper */
    .password-wrapper {
        position: relative;
    }

    .password-wrapper .form-control {
        padding-right: 42px;
    }

    .toggle-eye {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #6b7280;
        font-size: 16px;
        transition: color 0.3s;
    }

    .toggle-eye:hover {
        color: #667eea;
    }

    /* Password Strength Indicator */
    .password-strength {
        margin-top: 6px;
        height: 3px;
        background-color: #e5e7eb;
        border-radius: 2px;
        overflow: hidden;
        display: none;
    }

    .password-strength-bar {
        height: 100%;
        width: 0%;
        transition: all 0.3s ease;
        border-radius: 2px;
    }

    .password-strength.weak .password-strength-bar {
        width: 33%;
        background-color: #ef4444;
    }

    .password-strength.medium .password-strength-bar {
        width: 66%;
        background-color: #f59e0b;
    }

    .password-strength.strong .password-strength-bar {
        width: 100%;
        background-color: #10b981;
    }

    .password-hint {
        font-size: 11px;
        color: #6b7280;
        margin-top: 4px;
    }

    /* Submit Button */
    .btn-register {
        width: 100%;
        height: 48px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border: none;
        border-radius: 10px;
        color: #fff;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        margin-top: 8px;
    }

    .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
    }

    .btn-register:active {
        transform: translateY(0);
    }

    .btn-register:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }

    /* Terms Checkbox */
    .form-check {
        margin-bottom: 0;
    }

    .form-check-input {
        width: 18px;
        height: 18px;
        margin-top: 2px;
        border: 1.5px solid #d1d5db;
        cursor: pointer;
    }

    .form-check-input:checked {
        background-color: #667eea;
        border-color: #667eea;
    }

    .form-check-label {
        font-size: 12px;
        color: #6b7280;
        cursor: pointer;
        line-height: 1.4;
    }

    .form-check-label a {
        color: #667eea;
        text-decoration: none;
    }

    .form-check-label a:hover {
        text-decoration: underline;
    }

    /* Login Link */
    .login-link {
        text-align: center;
        margin-top: 16px;
        color: #6b7280;
        font-size: 13px;
    }

    .login-link a {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s;
    }

    .login-link a:hover {
        color: #764ba2;
        text-decoration: underline;
    }

    /* Validation Feedback */
    .invalid-feedback {
        font-size: 11px;
        margin-top: 4px;
        display: none;
    }

    .form-control.is-invalid ~ .invalid-feedback {
        display: block;
    }

    /* Loading Spinner */
    .spinner-border-sm {
        width: 16px;
        height: 16px;
        border-width: 2px;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .register-card {
            flex-direction: column;
            gap: 30px;
            padding: 35px 40px;
        }

        .register-left {
            flex: none;
        }

        .features-list {
            display: none;
        }
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }

        .register-card {
            padding: 30px 25px;
        }

        .social-login {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 576px) {
        body {
            padding: 20px 15px;
        }

        .register-title {
            font-size: 24px;
        }

        .flash-container {
            right: 10px;
            left: 10px;
            max-width: 100%;
        }
    }
</style>


<!-- Flash Messages -->
<!-- Flash Messages -->
<div class="flash-container"></div>

<div class="register-container">
    <div class="register-card">
        
        <!-- Left Side - Logo & Features -->
        <div class="register-left">
            <div class="logo-icon">
                <i class="bi bi-graph-up-arrow"></i>
            </div>
            <h1 class="register-title">FinTrack</h1>
            <p class="register-subtitle">Smart Financial Management for Everyone</p>

            <div class="features-list">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div>
                        <strong>Bank-Level Security</strong><br>
                        <small>Your data is encrypted</small>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-graph-up"></i>
                    </div>
                    <div>
                        <strong>Real-Time Analytics</strong><br>
                        <small>Track spending instantly</small>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-phone"></i>
                    </div>
                    <div>
                        <strong>Multi-Platform</strong><br>
                        <small>Access anywhere, anytime</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="register-right">
            <h2 style="font-size: 22px; font-weight: 700; color: #1f2937; margin-bottom: 20px;">Create Your Account</h2>

            <!-- Social Login -->
            <div class="social-login">
                <button type="button" class="btn btn-social">
                    <i class="bi bi-google"></i>
                    Google
                </button>
                <button type="button" class="btn btn-social">
                    <i class="bi bi-microsoft"></i>
                    Microsoft
                </button>
            </div>

            <div class="divider">
                <span>or continue with email</span>
            </div>

            <!-- Registration Form -->
            <form action="<?=base_url('/save')?>" method="post" id="registerForm">

                <!-- Two Column Layout -->
                <div class="form-row">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="John Doe" required>
                        <div class="invalid-feedback">Name must be at least 3 characters</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="john@example.com" required>
                        <div class="invalid-feedback">Enter a valid email address</div>
                    </div>
                </div>

                <div class="form-row">
                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="password-wrapper">
                            <input type="password" name="password" id="passwordField" class="form-control"
                                placeholder="••••••••" required>
                            <i class="bi bi-eye-slash toggle-eye" id="togglePassword"></i>
                        </div>
                        <div class="password-strength" id="passwordStrength">
                            <div class="password-strength-bar"></div>
                        </div>
                        <div class="password-hint">Min 6 chars with uppercase, lowercase & number</div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <div class="password-wrapper">
                            <input type="password" name="confirm_password" id="confirmPasswordField" class="form-control"
                                placeholder="Re-enter password" required>
                            <i class="bi bi-eye-slash toggle-eye" id="toggleConfirmPassword"></i>
                        </div>
                        <div class="invalid-feedback">Passwords do not match</div>
                    </div>
                </div>

                <!-- Terms & Conditions -->
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="termsCheck" required>
                    <label class="form-check-label" for="termsCheck">
                        I agree to the <a href="#">Terms of Service</a> and 
                        <a href="#">Privacy Policy</a>
                    </label>
                </div>

                <button type="submit" class="btn btn-register" id="submitBtn">
                    <i class="bi bi-person-plus"></i> Create Account
                </button>

                <!-- Login Link -->
                <div class="login-link">
                    Already have an account? <a href="/">Sign In</a>
                </div>

            </form>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        const $form = $("#registerForm");
        const $nameField = $("input[name='name']");
        const $emailField = $("input[name='email']");
        const $passwordField = $("#passwordField");
        const $confirmPasswordField = $("#confirmPasswordField");
        const $submitBtn = $("#submitBtn");
        const $passwordStrength = $("#passwordStrength");

        // Flash message function
        function showFlash(type, message) {
            const $flash = $(`<div class="flash-msg ${type}">
                                <i class="bi ${type === 'success' ? 'bi-check-circle' : 'bi-exclamation-triangle'}"></i>
                                <span>${message}</span>
                              </div>`);
            $(".flash-container").append($flash);
            setTimeout(() => $flash.fadeOut(() => $flash.remove()), 4000);
        }

        function markInvalid($field) {
            $field.addClass("is-invalid").removeClass("is-valid");
        }

        function markValid($field) {
            $field.addClass("is-valid").removeClass("is-invalid");
        }

        function validateName() {
            const name = $nameField.val().trim();
            const regex = /^[A-Za-z ]{3,}$/;
            if (!regex.test(name)) {
                markInvalid($nameField);
                return false;
            }
            markValid($nameField);
            return true;
        }

        function validateEmail() {
            const email = $emailField.val().trim();
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!regex.test(email)) {
                markInvalid($emailField);
                return false;
            }
            markValid($emailField);
            return true;
        }

        // function validatePassword() {
        //     const pass = $passwordField.val();
        //     const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;
            
        //     // Show strength indicator
        //     $passwordStrength.show();
            
        //     // Calculate strength
        //     let strength = 0;
        //     if (pass.length >= 6) strength++;
        //     if (pass.match(/[a-z]/)) strength++;
        //     if (pass.match(/[A-Z]/)) strength++;
        //     if (pass.match(/[0-9]/)) strength++;
        //     if (pass.match(/[^a-zA-Z0-9]/)) strength++;
            
        //     $passwordStrength.removeClass('weak medium strong');
        //     if (strength <= 2) {
        //         $passwordStrength.addClass('weak');
        //     } else if (strength <= 3) {
        //         $passwordStrength.addClass('medium');
        //     } else {
        //         $passwordStrength.addClass('strong');
        //     }
            
        //     if (!regex.test(pass)) {
        //         markInvalid($passwordField);
        //         return false;
        //     }
        //     markValid($passwordField);
        //     return true;
        // }

        function validateConfirmPassword() {
            const pass = $passwordField.val();
            const confirm = $confirmPasswordField.val();
            if (pass !== confirm || confirm.length === 0) {
                markInvalid($confirmPasswordField);
                return false;
            }
            markValid($confirmPasswordField);
            return true;
        }

        // Real-time validation
        $nameField.on("blur", validateName);
        $emailField.on("blur", validateEmail);
        $passwordField.on("keyup", validatePassword);
        $confirmPasswordField.on("keyup", validateConfirmPassword);

        // Password toggle
        $("#togglePassword").click(function() {
            const type = $passwordField.attr("type") === "password" ? "text" : "password";
            $passwordField.attr("type", type);
            $(this).toggleClass("bi-eye bi-eye-slash");
        });

        $("#toggleConfirmPassword").click(function() {
            const type = $confirmPasswordField.attr("type") === "password" ? "text" : "password";
            $confirmPasswordField.attr("type", type);
            $(this).toggleClass("bi-eye bi-eye-slash");
        });

        // Form submit
        // $form.submit(function(e) {
        //     let valid = validateName() & validateEmail() & validatePassword() & validateConfirmPassword();

        //     if (!valid) {
        //         e.preventDefault();
        //         showFlash("error", "Please fix the highlighted fields before submitting.");
        //         return false;
        //     }

        //     // Show loader
        //     $submitBtn.prop("disabled", true).html('<span class="spinner-border spinner-border-sm"></span> Creating Account...');
        // });

        // Social login handlers
        $('.btn-social').click(function() {
            const provider = $(this).text().trim();
            showFlash("error", `${provider} authentication is not yet configured.`);
        });
    });
</script>
