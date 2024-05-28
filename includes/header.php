<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Korkmaz Toptan Market</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background: url('images/marketIcYan.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #000;
        }
        .background-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            z-index: -1;
        }
        .carousel-item img {
            height: 500px;
            object-fit: cover;
        }
        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.75);
        }
        .navbar-dark .navbar-nav .nav-link:hover {
            color: rgba(255, 255, 255, 1);
        }


    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="background-overlay"></div>
