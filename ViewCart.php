<?php
    include_once "controllers/CartValidationController.php";
    include_once "controllers/CartController.php";
    include_once "controllers/ProductController.php";
    $cartC = new CartController();
    $productC = new ProductController();
    $validationC = new CartValidationController();
    if(isset($_GET['delete'])) {
            header("Location: delete-cart.php");
    }
    if(isset($_GET['order'])) {
                include_once "controllers/AddController.php";
                $addBill = new AddController();
                $addBill->addBill($_COOKIE['id']);
    }
    include_once "header.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "stylesheet/viewCart.css">
    <title>
        Cart
    </title>
</head>
<body>
    <div class="Cart">
        <?php
            foreach($cartC->viewCartDetails($_COOKIE['id']) as $cart) {
                if($cart['product1'] != null) { ?>
                    <div class="Product">
                        <h3 id="name"><?php echo $productC->viewProductName($cart['product1']); ?></h3>
                        <h3 id ="price"><?php echo $productC->viewProductPrice($cart['product1']); ?>$</h3>
                    </div>
            <?php }
                if($cart['product2'] != null) { ?>
                    <div class="Product">
                        <h3 id="name"><?php echo $productC->viewProductName($cart['product2']); ?></h3>
                        <h3 id ="price"><?php echo $productC->viewProductPrice($cart['product2']); ?>$</h3>
                    </div>
            <?php }
                if($cart['product3'] != null) { ?>
                    <div class="Product">
                        <h3 id="name"><?php echo $productC->viewProductName($cart['product3']); ?></h3>
                        <h3 id ="price"><?php echo $productC->viewProductPrice($cart['product3']); ?>$</h3>
                    </div>
            <?php } ?>
                <div class="Cost">
                    <h3 id="totalCost">Total Cost: <?php echo $cart['totalCost']; ?></h3>
                </div>
                <form action = "ViewCart.php" mehod = "post" class="Order">
                    <input type = "submit" name = "order" value = "Order"></input>
                    <input type = "submit" name = "delete" value = "Delete"></input>
                </form>
        <?php } ?>
    </div>
</body>
</html>