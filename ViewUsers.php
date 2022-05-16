<?php 
    include_once "header.php";
    include_once "controllers/AdminController.php";
    $admin = new AdminController();
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
            <th>id</th>
            <th>First Name</th>
            <th>Second Name</th>
            <th>UserName</th>
            <th>Password</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Type</th>
            </tr></thead>
        <?php foreach($admin->viewUsers() as $account) { ?>
            <tbody><tr>
            <td><?php echo $account['id']; ?></th>
            <td><?php echo $account['fname']; ?></th>
            <td><?php echo $account['lname']; ?></th>
            <td><?php echo $account['username']; ?></th>
            <td><?php echo $account['password']; ?></th>
            <td><?php echo $account['phone']; ?></th>
            <td><?php echo $account['address']; ?></th>
            <td><?php echo $account['type']; ?></th>
            </tr></tbody>
        <?php } ?>
        </table>
</body>
</html>