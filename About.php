<?php
// Include the header
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Career Guidance Chatbot</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <!-- Custom CSS -->
    <style>
        /* About Section Styling */
        .about-section {
            padding: 80px 0;
            text-align: center;
            background-color: #f8f9fa;
        }

        .about-title {
            font-size: 45px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .about-text {
            font-size: 18px;
            color: #555;
            max-width: 800px;
            margin: auto;
        }

        /* Image Styling */
        .about-img {
            width: 100%;
            max-width: 500px;
            border-radius: 15px;
            margin-top: 20px;
        }

        /* Blog Button */
        .btn-blog {
            background: #ff4d4d;
            color: white;
            font-size: 18px;
            padding: 10px 25px;
            border-radius: 30px;
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-blog:hover {
            background: #cc0000;
        }
    </style>
</head>
<body>

<!-- About Section -->
<div class="about-section">
    <h2 class="about-title">About Career Guidance Chatbot</h2>
    <p class="about-text">
        JNTUCareers is a career guidance system designed to help students and professionals
        find the best career path based on their skills and interests. Whether you're looking for
        career advice, relevant courses, or job recommendations, JNTUCareers is your one-stop destination
        for making informed career decisions.
    </p>
    <img src="./img/about.png" alt="Career Guidance" class="about-img">
    <br>
    <a href="blog.php" class="btn-blog">Explore Our Blog</a>
</div>

</body>
</html>
