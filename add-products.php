
<?php
    if(isset($_POST['submit'])) {
        $image = file_get_contents($_FILES['image']['tmp_name']);
        $image = addslashes($image);
        $data = array($_POST['name'], $_POST['category'], $_POST['description'], $image, $_POST['price'],  $_POST['quantity'],  $_POST['supplier']);
        include_once "controllers/AddController.php";
        $product = new AddController();
        $product->addProduct($data);
    }
    include_once "header.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "stylesheet/addproduct.css">
    <title>Add Products</title>
</head>
<body>
    <div class = "add-products-form">
        <form action = "add-products.php" method = "post" enctype = "multipart/form-data">
            <input type = "text" name = "name" placeholder = "Product Name">
            <input type = "text" name = "category" placeholder = "Product Category">
            <input type = "text" name = "description" placeholder = "Description">
            <input type = "text" name = "price" placeholder = "Price">
            <input type = "text" name = "quantity" placeholder = "Quantity">
            <input type = "text" name = "supplier" placeholder = "Supplier ID">
            <input type = "file" name = "image">
            <button type = "submit" name = "submit" id = "butt">Add</button>
        </form>
    </div>
</body>
</html>