<?php
session_start();
include 'includes/db.php';
include 'includes/navbar.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$order_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE orders SET product_id='$product_id', quantity='$quantity' WHERE id='$order_id' AND user_id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: orders.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql_order = "SELECT * FROM orders WHERE id='$order_id' AND user_id='$user_id'";
$result_order = $conn->query($sql_order);
$order = $result_order->fetch_assoc();

$sql_products = "SELECT * FROM products";
$result_products = $conn->query($sql_products);

if (!$order) {
    echo "Sipariş bulunamadı.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Order</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Siparişi Düzenle</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="product_id">Ürün Adı:</label>
            <select class="form-control" id="product_id" name="product_id" required>
                <?php while ($product = $result_products->fetch_assoc()): ?>
                    <option value="<?php echo $product['id']; ?>" <?php if ($product['id'] == $order['product_id']) echo 'selected'; ?>>
                        <?php echo $product['name']; ?> - <?php echo $product['price']; ?> TL
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Adet:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $order['quantity']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Değişiklikleri Kaydet</button>
    </form>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php include 'includes/footer.php'; ?>
