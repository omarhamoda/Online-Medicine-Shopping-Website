
<?php
    include_once "header.php";
    include_once "controllers/ProductController.php";
    include_once "controllers/ValidationController.php";
    $productt = new ProductController();
    $validation = new ValidationController();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "stylesheet/ViewProduct2.css">
    <title>
        <?php
            echo $productt->viewProductName($_GET['id']);
        ?>
    </title>
</head>
<body>
    <?php foreach ($productt->viewProductDetails($_GET['id']) as $product) { ?>
        <div class = "ViewGoods1">
           <img src = "data:image/jpeg;base64,<?php echo base64_encode($product['picture'])?>" width = "380px" height= "350px">
        </div>
        <?php if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) { ?>
            <?php if ($validation->checkAccountPermissions() == "admin") { ?>
                    <div class = "ViewGoods2">
                        <a href = "update-products.php?id=<?php echo $_GET['id'];?>"><button id = "butt1">Update</button></a>
                        <a href = "delete-products.php?id=<?php echo $_GET['id'];?>"><button id = "butt2">Delete</button></a>
                    </div>
                <?php } ?>
                <div class = "ViewGoods6">
                    <a href = "addToCart.php?id=<?php echo $_GET['id']; ?>"><button id = "butt1">Add To Cart</button></a>
                </div>
        <?php } else { ?>
                <div class = "ViewGoods6">
                    <a href = "signup.php"><button id = "butt1">Order</button></a>
                </div>
            <?php } ?>
            <div class = "ViewGoods3">
                <h3 id = "price"><?php echo $product['price']; ?> $</h3>
            </div>
            <div class = "ViewGoods8">
                <h3 id = "quantity"><?php echo $product['quantity']; ?> Pieces</h3>
            </div>
            <div class = "ViewGoods4">
                <h2 id = "name">Name: </h2>
                <h3 id = "name2"><?php echo $product['name'] ?></h2>
            </div>
            <div class = "ViewGoods7">
                <h2 id = "category">Category: </h2>
                <h3 id = "category2"><?php echo $product['category']; ?></h2>
            </div>
            <div class = "ViewGoods5">
                <h2 id = "desc">Description: </h2>
                <h3 id = "desc2"><?php echo $product['description']; ?></h2>
            </div>
    <?php } ?>
</body>
</html>