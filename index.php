<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KORKMAZ TOPTAN MARKET</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background: url('images/marketDisYan.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            z-index: -1; 
        }
        .card {
            margin-top: 100px;
            z-index: 1;
        }
        .container {
            position: relative;
            z-index: 2;
        }
    </style>
</head>
<body>
<div class="overlay"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div>
                    <img src="images/logo.jpg" alt="Logo" width="500" height="200">
                    </div>
                    <h3 class="text-center">müşterilerimize en iyi hizmeti sunmak için buradayız</h3>  
                </div>
                <div class="card-body">
                    <p class="lead text-center">Hoş geldiniz! Sipariş oluşturmak için lütfen giriş yapın veya kayıt olun.</p>
                    <div class="text-center">
                        <a href="login.php" class="btn btn-primary btn-block">Giriş Yap</a>
                        <a href="register.php" class="btn btn-secondary btn-block">Kayıt Ol</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php include 'includes/footer.php'; ?>
