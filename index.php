<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Guidance - Home</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap">

    <!-- Custom Styles -->
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0A0A0A 0%, #1C2526 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #D1D1D1;
        }

        /* Header */
        header {
            position: sticky;
            top: 0;
            background: linear-gradient(90deg, #151515, #2A2A2A);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.4);
            z-index: 1000;
            animation: slideDown 0.8s ease-out;
        }

        .navbar {
            padding: 15px 20px;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: 700;
            color: #D1D1D1;
            transition: color 0.3s ease;
        }

        .navbar-brand:hover {
            color: #FFD700;
        }

        .nav-link {
            color: #D1D1D1;
            font-weight: 400;
            margin-left: 20px;
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #FFD700;
        }

        .nav-link.active {
            color: #FFD700;
            font-weight: 600;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: #FFD700;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .btn-logout {
            background: #FF0000;
            color: #D1D1D1;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .btn-logout:hover {
            background: #CC0000;
            transform: translateY(-2px);
        }

        .btn-logout:focus {
            outline: 3px solid #CC0000;
            outline-offset: 2px;
        }

        /* Welcome Message */
        .welcome {
            text-align: center;
            font-size: 20px;
            font-weight: 400;
            color: #D1D1D1;
            margin: 40px auto;
            padding: 15px;
            background: #151515;
            border: 2px solid #FF0000;
            border-radius: 10px;
            max-width: 500px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
            opacity: 0;
            animation: fadeIn 1s ease-out 0.2s forwards;
        }

        /* Hero Section */
        .hero-container {
            max-width: 600px;
            margin: 60px auto;
            padding: 40px;
            background: #151515;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
            opacity: 0;
            animation: fadeIn 1s ease-out 0.2s forwards;
        }

        .hero-container h1 {
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #D1D1D1;
            opacity: 0;
            animation: slideInUp 0.8s ease-out 0.4s forwards;
        }

        .hero-container p {
            font-size: 18px;
            color: #A0A0A0;
            margin-bottom: 30px;
            opacity: 0;
            animation: fadeIn 0.6s ease-out 0.6s forwards;
        }

        .hero-container .btn {
            padding: 12px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 200px;
            margin: 10px;
            display: inline-block;
            opacity: 0;
        }

        .hero-container .btn-start {
            background: #FF0000;
            color: #D1D1D1;
            border: none;
            animation: scaleIn 0.6s ease-out 0.8s forwards;
        }

        .hero-container .btn-start:hover {
            background: #CC0000;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(204, 0, 0, 0.3);
        }

        .hero-container .btn-start::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.4);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.5s ease, height 0.5s ease;
        }

        .hero-container .btn-start:active::after {
            width: 300px;
            height: 300px;
        }

        .hero-container .btn-alumni {
            background: #2A2A2A;
            color: #D1D1D1;
            border: 2px solid #FFD700;
            animation: scaleIn 0.6s ease-out 0.9s forwards;
        }

        .hero-container .btn-alumni:hover {
            background: #FFD700;
            color: #151515;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(255, 215, 0, 0.3);
        }

        .hero-container .btn-alumni::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.4);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.5s ease, height 0.5s ease;
        }

        .hero-container .btn-alumni:active::after {
            width: 300px;
            height: 300px;
        }

        .hero-container .btn:focus {
            outline: 3px solid #FFD700;
            outline-offset: 2px;
        }

        /* Keyframes */
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

        /* Accessibility */
        @media (prefers-reduced-motion: reduce) {
            header, .welcome, .hero-container, .hero-container h1, .hero-container p, .hero-container .btn {
                animation: none;
                opacity: 1;
                transform: none;
            }
            .hero-container .btn:hover, .btn-logout:hover {
                transform: none;
                box-shadow: none;
            }
            .hero-container .btn::after {
                display: none;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-container h1 {
                font-size: 32px;
            }
            .hero-container p {
                font-size: 16px;
            }
            .hero-container .btn {
                width: 180px;
                font-size: 16px;
                padding: 10px;
            }
            .welcome {
                font-size: 18px;
                margin: 30px 20px;
            }
            .hero-container {
                margin: 40px 20px;
                padding: 30px;
            }
        }

        @media (max-width: 576px) {
            .hero-container h1 {
                font-size: 28px;
            }
            .hero-container .btn {
                width: 160px;
                margin: 8px;
            }
            .hero-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Welcome Message -->
    <div class="container">
        <?php if (isset($_SESSION['username'])): ?>
            <p class="welcome">Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!</p>
        <?php endif; ?>
    </div>

    <!-- Hero Section -->
    <div class="hero-container">
        <h1>Start Your Career Journey</h1>
        <p>Get personalized job recommendations and connect with our alumni network.</p>
        <a href="career_input.php" class="btn btn-start">Get Started</a>
        <a href="alumni.php" class="btn btn-alumni">View Alumni</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>