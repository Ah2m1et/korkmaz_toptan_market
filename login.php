<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifier = $_POST['identifier']; // Bu hem kullanıcı adı hem de e-posta olabilir
    $password = $_POST['password'];

    // Kullanıcı adı veya e-posta ile kullanıcıyı bul
    $sql = "SELECT * FROM users WHERE username='$identifier' OR email='$identifier'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "No user found";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background: url('images/marketDis.jpg') no-repeat center center fixed;
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
                    <h3 class="text-center">Giriş Yap</h3>
                </div>
                <div class="card-body">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="identifier">Username or Email:</label>
                            <input type="text" class="form-control" id="identifier" name="identifier" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                        <a href="index.php" class="btn btn-secondary btn-block">Geri Dön</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php include 'includes/footer.php'; ?>
