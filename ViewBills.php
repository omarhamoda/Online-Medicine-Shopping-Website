<?php 
    include_once "header.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "stylesheet/viewUsers.css">
    <title>
        Users
    </title>
</head>
<body>
        <table class = "table-content">
            <thead><tr>
            <th>Bill Id</th>
            <th>User Id</th>
            <th>User First Name</th>
            <th>First Product Id</th>
            <th>First Product URL</th>
            <th>Second Product Id</th>
            <th>Second Product URL</th>
            <th>Third Product Id</th>
            <th>Third Product URL</th>
            <th>Total Cost</th>
            </tr></thead>
        <?php
        include_once "controllers/AccountController.php";
        $accountC = new AccountController();
        if($accountC->viewAccountTypeById() == "admin"){
            include_once "controllers/AdminController.php";
            $admin = new AdminController();
        foreach($admin->viewBills() as $bill) { ?>
            <tbody><tr>
            <td><?php echo $bill['id']; ?></th>
            <td><?php echo $bill['userId']; ?></th>
            <td><?php echo $bill['fname']; ?></th>
            <td><?php echo $bill['product1']; ?></th>
            <td><a href = "View.php?id=<?php echo $bill['product1']; ?>">Go to Product</a></th>
            <td><?php echo $bill['product2']; ?></th>
            <td><a href = "View.php?id=<?php echo $bill['product2']; ?>">Go to Product</a></th>
            <td><?php echo $bill['product3']; ?></th>
            <td><a href = "View.php?id=<?php echo $bill['product3']; ?>">Go to Product</a></th>
            <td><?php echo $bill['totalCost']; ?></th>
            </tr></tbody>
        <?php } ?>
       <?php } else { 
            include_once "controllers/BillController.php";
            $userBill = new BillController(); 
            foreach($userBill->viewUserBills($_COOKIE['id']) as $bill) { ?>
                <tbody><tr>
                <td><?php echo $bill['id']; ?></th>
                <td><?php echo $bill['userId']; ?></th>
                <td><?php echo $bill['fname']; ?></th>
                <td><?php echo $bill['product1']; ?></th>
                <td><a href = "View.php?id=<?php echo $bill['product1']; ?>">Go to Product</a></th>
                <td><?php echo $bill['product2']; ?></th>
                <td><a href = "View.php?id=<?php echo $bill['product2']; ?>">Go to Product</a></th>
                <td><?php echo $bill['product3']; ?></th>
                <td><a href = "View.php?id=<?php echo $bill['product3']; ?>">Go to Product</a></th>
                <td><?php echo $bill['totalCost']; ?></th>
                </tr></tbody>
            <?php } ?>
        <?php } ?>
        </table>
</body>
</html>