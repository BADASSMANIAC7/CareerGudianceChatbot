<?php
session_start();
include 'config.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $error = "Please enter both email and password.";
    } else {
        $query = "SELECT id, username, password FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_bind_result($stmt, $user_id, $username, $hashed_password);
            mysqli_stmt_fetch($stmt);

            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $username;
                header("Location: index.php");
                exit();
            } else {
                $error = "Invalid email or password.";
            }
        } else {
            $error = "User not found.";
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Career Guidance</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap">

    <!-- Custom Styles -->
    <style>
        <style>
    /* Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #1c1c1c 0%, #2a2a2a 100%);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        color: #f1f1f1;
        position: relative;
        overflow-x: hidden;
    }

    .particle {
        position: absolute;
        width: 6px;
        height: 6px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        pointer-events: none;
        animation: float 6s infinite ease-in-out;
    }

    @keyframes float {
        0% { transform: translateY(0); opacity: 0.4; }
        100% { transform: translateY(-100vh); opacity: 0; }
    }

    header {
        position: sticky;
        top: 0;
        background: linear-gradient(90deg, #1e7e34, #145c2d);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        z-index: 1000;
        animation: slideDown 0.8s ease-out;
    }

    .navbar {
        padding: 15px 20px;
    }

    .navbar-brand {
        font-size: 24px;
        font-weight: 700;
        color: white;
        transition: color 0.3s ease;
    }

    .navbar-brand:hover {
        color: #ffd700;
    }

    .nav-link {
        color: white;
        font-weight: 400;
        margin-left: 20px;
        position: relative;
        transition: color 0.3s ease, transform 0.3s ease;
    }

    .nav-link:hover {
        color: #ffd700;
        transform: scale(1.1);
    }

    .nav-link.active {
        color: #ffd700;
        font-weight: 600;
    }

    .nav-link.active::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 2px;
        bottom: -5px;
        left: 0;
        background: #ffd700;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -5px;
        left: 0;
        background: #ffd700;
        transition: width 0.3s ease;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .login-container {
        max-width: 400px;
        margin: 100px auto;
        padding: 30px;
        background: #2b2b2b;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        opacity: 0;
        animation: fadeIn 1s ease-out 0.2s forwards;
    }

    .login-container.error-shake {
        animation: shake 0.5s ease-in-out;
    }

    .login-container h3 {
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 20px;
        color: #4caf50;
        opacity: 0;
        animation: slideInUp 0.8s ease-out 0.4s forwards;
    }

    .form-group {
        position: relative;
        margin-bottom: 20px;
        opacity: 0;
        animation: fadeIn 0.6s ease-out forwards;
    }

    .form-group:nth-child(1) { animation-delay: 0.6s; }
    .form-group:nth-child(2) { animation-delay: 0.7s; }

    .form-control {
        padding: 12px;
        border: 1px solid #444;
        border-radius: 8px;
        background-color: #2d2d2d;
        color: #f1f1f1;
        transition: border-color 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
    }

    .form-control::placeholder {
        color: #aaa;
    }

    .form-control:focus {
        background-color: #2d2d2d;
        border-color: #4caf50;
        box-shadow: 0 0 8px rgba(76, 175, 80, 0.3);
        outline: none;
        color: #fff;
    }

    .form-control:valid {
        border-color: #4caf50;
    }

    .form-control:invalid:not(:placeholder-shown) {
        border-color: #e74c3c;
    }

    .form-label {
        position: absolute;
        top: 12px;
        left: 12px;
        font-size: 16px;
        color: #aaa;
        transition: all 0.2s ease;
        pointer-events: none;
        background: transparent;
    }

    .form-control:focus + .form-label,
    .form-control:not(:placeholder-shown) + .form-label {
        top: -10px;
        left: 10px;
        font-size: 12px;
        color: #4caf50;
        background-color: #2b2b2b;
        padding: 0 5px;
    }

    .btn-login {
        padding: 12px;
        font-size: 18px;
        font-weight: 600;
        border-radius: 8px;
        background: #4caf50;
        color: white;
        border: none;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        opacity: 0;
        animation: scaleIn 0.6s ease-out 0.8s forwards;
    }

    .btn-login:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(76, 175, 80, 0.3);
        background: #3e8e41;
    }

    .btn-login:focus {
        outline: 3px solid #3e8e41;
        outline-offset: 2px;
    }

    .btn-login::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: width 0.5s ease, height 0.5s ease;
    }

    .btn-login:active::after {
        width: 300px;
        height: 300px;
    }

    .error {
        color: #e74c3c;
        font-size: 14px;
        margin-bottom: 15px;
        opacity: 0;
        animation: fadeIn 0.5s ease-out forwards;
    }

    .signup-link {
        margin-top: 20px;
        font-size: 15px;
        opacity: 0;
        animation: fadeIn 0.6s ease-out 0.9s forwards;
        color: #ccc;
    }

    .signup-link a {
        color: #4caf50;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .signup-link a:hover {
        color: #3e8e41;
        text-decoration: underline;
    }

    @keyframes slideDown {
        0% { transform: translateY(-100%); }
        100% { transform: translateY(0); }
    }

    @keyframes fadeIn {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }

    @keyframes slideInUp {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes scaleIn {
        0% { opacity: 0; transform: scale(0.85); }
        100% { opacity: 1; transform: scale(1); }
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-10px); }
        50% { transform: translateX(10px); }
        75% { transform: translateX(-5px); }
    }

    @media (prefers-reduced-motion: reduce) {
        header, .login-container, .login-container h3, .form-group, .form-control, .btn-login, .error, .signup-link {
            animation: none;
            opacity: 1;
            transform: none;
        }

        .btn-login:hover, .nav-link:hover {
            transform: none;
            box-shadow: none;
        }
    }

    @media (max-width: 768px) {
        .login-container {
            margin: 60px 20px;
            padding: 20px;
        }

        .login-container h3 {
            font-size: 24px;
        }

        .btn-login {
            font-size: 16px;
            padding: 10px;
        }

        .form-control {
            padding: 10px;
        }

        .form-label {
            font-size: 14px;
        }

        .form-control:focus + .form-label,
        .form-control:not(:placeholder-shown) + .form-label {
            font-size: 10px;
            top: -8px;
        }
    }

    @media (max-width: 576px) {
        .login-container {
            margin: 40px 15px;
        }
    }
</style>

    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="main.php">CareerBot</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="main.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">Sign Up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Login Form -->
    <div class="container">
        <div class="login-container <?= !empty($error) ? 'error-shake' : '' ?>">
            <h3 class="text-center">Login to Your Account</h3>

            <?php if (!empty($error)) : ?>
                <p class="error" role="alert" aria-live="assertive"><?= htmlspecialchars($error); ?></p>
            <?php endif; ?>

            <form method="POST" action="login.php">
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder=" " required>
                    <label for="email" class="form-label">Email</label>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder=" " required>
                    <label for="password" class="form-label">Password</label>
                </div>
                <button type="submit" class="btn btn-login">Login</button>
            </form>

            <p class="signup-link text-center">
                Don't have an account? <a href="signup.php">Sign Up</a>
            </p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Particle Effect and Form Validation -->
    <script>
        // Particle Effect
        function createParticle() {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + 'vw';
            particle.style.animationDuration = Math.random() * 3 + 3 + 's';
            document.body.appendChild(particle);
            setTimeout(() => particle.remove(), 6000);
        }
        setInterval(createParticle, 300);

        // Real-time Input Validation
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('input', () => {
                if (input.checkValidity()) {
                    input.classList.add('valid');
                    input.classList.remove('invalid');
                } else if (input.value) {
                    input.classList.add('invalid');
                    input.classList.remove('valid');
                } else {
                    input.classList.remove('valid', 'invalid');
                }
            });
        });
    </script>
</body>
</html>