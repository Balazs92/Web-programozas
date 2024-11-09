<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : array();
$totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
<h1>Shopping Cart</h1>

<?php if (empty($cart)): ?>
    <p>Your cart is empty.</p>
<?php else: ?>
    <ul>
        <?php foreach ($cart as $item): ?>
            <li>
                <?php echo htmlspecialchars($item['product']) . " - $" . htmlspecialchars($item['price']) . " (" . htmlspecialchars($item['quantity']) . ")"; ?>
                <form action="cart.php" method="post" style="display:inline;">
                    <input type="hidden" name="product" value="<?php echo htmlspecialchars($item['product']); ?>">
                    <input type="hidden" name="price" value="<?php echo htmlspecialchars($item['price']); ?>">
                    <button type="submit" name="action" value="remove">Remove</button>
                </form>
            </li>
            <?php $totalPrice += $item['price'] * $item['quantity']; ?>
        <?php endforeach; ?>
    </ul>
    <p>Total Price: $<?php echo $totalPrice; ?></p>
<?php endif; ?>

<a href="index.php">Back to Products</a>
</body>
</html>


