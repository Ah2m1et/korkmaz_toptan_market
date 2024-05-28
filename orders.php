<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Siparişlerin toplam tutarını hesapla
$sql_total = "SELECT SUM(products.price * orders.quantity) AS total_amount
              FROM orders
              JOIN products ON orders.product_id = products.id
              WHERE orders.user_id='$user_id'";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_assoc();
$total_amount = $row_total['total_amount'];

// Kullanıcının siparişlerini getir
$sql_orders = "SELECT orders.id, products.name AS product_name, orders.quantity, orders.order_date 
               FROM orders 
               JOIN products ON orders.product_id = products.id 
               WHERE orders.user_id='$user_id'";
$result_orders = $conn->query($sql_orders);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Siparişlerim</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Siparişlerim</h2>
    <div class="mb-3">
        <h4>Toplam Tutar: <?php echo number_format($total_amount, 2); ?> TL</h4>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ürün Adı</th>
                <th>Adet</th>
                <th>Sipariş Tarihi</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result_orders->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['order_date']; ?></td>
                <td>
                    <a href="edit_order.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Düzenle</a>
                    <a href="delete_order.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Sil</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>

<?php include 'includes/footer.php'; ?>