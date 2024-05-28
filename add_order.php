<?php
session_start();
include 'includes/db.php';
include 'includes/navbar.php';

$message = '';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO orders (user_id, product_id, quantity) VALUES ('$user_id', '$product_id', '$quantity')";
    if ($conn->query($sql) === TRUE) {
        $message = "Ürün başarıyla eklendi.";
    } else {
        $message = "Hata: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Yeni Sipariş Ekle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Yeni Sipariş Ekle</h2>
    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php endif; ?>
    <form method="post" action="">
        <div class="form-group">
            <label for="product_id">Ürün:</label>
            <select class="form-control" id="product_id" name="product_id" required>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?> - <?php echo $row['price']; ?> TL</option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Adet:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <button type="submit" class="btn btn-primary">Sipariş Ver</button>
    </form>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php include 'includes/footer.php'; ?>
