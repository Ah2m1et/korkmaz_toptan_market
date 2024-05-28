<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Kullanıcı sipariş sayısını ve toplam harcamalarını almak için SQL sorguları
$user_id = $_SESSION['user_id'];
$orderCountQuery = "SELECT COUNT(*) as order_count FROM orders WHERE user_id='$user_id'";
$orderCountResult = $conn->query($orderCountQuery);
$orderCount = $orderCountResult->fetch_assoc()['order_count'];

$totalSpentQuery = "SELECT SUM(o.quantity * p.price) as total_spent 
                    FROM orders o 
                    JOIN products p ON o.product_id = p.id 
                    WHERE o.user_id='$user_id'";
$totalSpentResult = $conn->query($totalSpentQuery);
$totalSpent = $totalSpentResult->fetch_assoc()['total_spent'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background: url('images/marketIcYan.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .blur-background {
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
            margin-top: 50px;
            background: rgba(255, 255, 255, 0.8); 
            color: black;
        }
    </style>
</head>
<body>
<div class="blur-background"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Dashboard</h3>
                </div>
                <div class="card-body">
                    <p class="lead text-center">Hoş geldiniz, <?php echo htmlspecialchars($username); ?>!</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Sipariş Sayısı</h5>
                                    <p class="card-text"><?php echo $orderCount; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Toplam Harcama</h5>
                                    <p class="card-text"><?php echo number_format($totalSpent, 2); ?> TL</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="add_order.php" class="btn btn-primary">Yeni Sipariş Ekle</a>
                        <a href="orders.php" class="btn btn-secondary">Siparişlerim</a>
                        <a href="logout.php" class="btn btn-danger">Çıkış Yap</a>
                    </div>
                </div>
            </div>



            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="text-center">Son Siparişler</h4>
                </div>
                <div class="card-body">
                    <?php
                    $recentOrdersQuery = "SELECT o.*, p.name as product_name, p.price 
                                          FROM orders o 
                                          JOIN products p ON o.product_id = p.id 
                                          WHERE o.user_id='$user_id' 
                                          ORDER BY o.order_date DESC LIMIT 5";
                    $recentOrdersResult = $conn->query($recentOrdersQuery);
                    if ($recentOrdersResult->num_rows > 0) {
                        echo '<ul class="list-group">';
                        while ($order = $recentOrdersResult->fetch_assoc()) {
                            echo '<li class="list-group-item">';
                            echo '<strong>' . $order['order_date'] . '</strong> - ' . $order['product_name'] . ' - ' . $order['quantity'] . ' x ' . $order['price'] . ' TL';
                            echo '</li>';
                        }
                        echo '</ul>';
                    } else {
                        echo '<p class="text-center">Henüz siparişiniz yok.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php include 'includes/footer.php'; ?>



