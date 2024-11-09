<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
<h1>Product List</h1>
<ul>
    <li>
        Product 1 - $10&nbsp;
        <form action="cart.php" method="post" style="display:inline;">
            <input type="hidden" name="product" value="Product 1">
            <input type="hidden" name="price" value="10">
            <button type="submit" name="action" value="add">Add to Cart</button>
        </form>
    </li>
    <li>
        Product 2 - $20&nbsp;
        <form action="cart.php" method="post" style="display:inline;">
            <input type="hidden" name="product" value="Product 2">
            <input type="hidden" name="price" value="20">
            <button type="submit" name="action" value="add">Add to Cart</button>
        </form>
    </li>
    <li>
        Product 3 - $30&nbsp;
        <form action="cart.php" method="post" style="display:inline;">
            <input type="hidden" name="product" value="Product 3">
            <input type="hidden" name="price" value="30">
            <button type="submit" name="action" value="add">Add to Cart</button>
        </form>
    </li>
</ul>

<form action="view_cart.php" method="get"> <button type="submit">View Cart</button> </form>
</body>
</html>

