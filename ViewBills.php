<?php 
    include_once "header.php";
    include_once "classes/Admin.php";
    $admin = new Admin();
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
        <?php foreach($admin->viewBills() as $bill) { ?>
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
        </table>
</body>
</html>