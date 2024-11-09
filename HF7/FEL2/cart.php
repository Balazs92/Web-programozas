<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Load the cart from the cookie
$cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : array();

$action = isset($_POST['action']) ? $_POST['action'] : null;
$product = isset($_POST['product']) ? $_POST['product'] : null;
$price = isset($_POST['price']) ? $_POST['price'] : null;

if ($action == 'add') {
    // Add to the cart
    $found = false;
    foreach ($cart as &$item) {
        if ($item['product'] == $product) {
            $item['quantity']++;
            $found = true;
            break;
        }
    }
    if (!$found) {
        $cart[] = array('product' => $product, 'price' => $price, 'quantity' => 1);
    }
    setcookie('cart', json_encode($cart), time() + 3600, "/");
    header('Location: index.php');
    exit();
} elseif ($action == 'remove') {
    // Remove from the cart
    foreach ($cart as $key => &$item) {
        if ($item['product'] == $product && $item['price'] == $price) {
            if ($item['quantity'] > 1) {
                $item['quantity']--;
            } else {
                unset($cart[$key]);
            }
            break;
        }
    }
    // Re-index the array after removal
    $cart = array_values($cart);
    setcookie('cart', json_encode($cart), time() + 3600, "/");
    header('Location: view_cart.php');
    exit();
}
?>
