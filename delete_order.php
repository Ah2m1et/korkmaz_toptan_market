<?php
session_start();
include 'includes/db.php';
include 'includes/navbar.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$sql = "DELETE FROM orders WHERE id='$id' AND user_id='$user_id'";
if ($conn->query($sql) === TRUE) {
    header("Location: orders.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
<?php include 'includes/footer.php'; ?>

