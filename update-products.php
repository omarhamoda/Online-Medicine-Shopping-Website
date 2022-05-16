<?php
    if(isset($_POST['submit'])) {
        include "controllers/UpdateController.php";
        $updateProduct = new UpdateController();
        $updateData = array($_POST['name'], $_POST['category'], $_POST['description'], $_POST['price'], $_POST['quantity'], $_GET['id']);
        $updateProduct->updateProduct($updateData);
    }
    include_once "header.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "stylesheet/addproduct.css">
    <title>Update Product</title>
</head>
<body>
    <?php
    include_once "controllers/ProductController.php";
    $productDetails = new ProductController();
     foreach($productDetails->viewProductDetails($_GET['id']) as $productDetails) { ?>
        <div class = "add-products-form">
            <form action = "update-products.php?id=<?php echo $productDetails['id']; ?>" method = "post">
                <input type = "text" name = "name" placeholder = "Product Name" value = "<?php echo $productDetails['name']; ?>">
                <input type = "text" name = "category" placeholder = "Product Category" value = "<?php echo $productDetails['category']; ?>">
                <input type = "text" name = "description" placeholder = "Description" value = "<?php echo $productDetails['description']; ?>">
                <input type = "text" name = "price" placeholder = "Price" value = "<?php echo $productDetails['price']; ?>">
                <input type = "text" name = "quantity" placeholder = "Quantity" value = "<?php echo $productDetails['quantity']; ?>">
                <button type = "submit" name = "submit" id = "butt">Update</button>
            </form>
        </div>
    <?php } ?>
</body>
</html>