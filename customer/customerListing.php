<?php

include('../includes/db_conn.php');

try {
    // this query process from the database is like ordering a pizza
    $db = new PDO($db_dsn, $db_username, $db_password, $db_options); // 1st Calling Pizza Hut
    $sql = $db ->prepare( "SELECT * FROM phpclass.customer;"); // 2nd Placing your order
    $sql -> execute(); // 3rd baking the pizza
    $customers = $sql -> fetchAll(); // 4th pizza deliver

//    echo "<pre>";
//    print_r($rows); // last, eating your pizza
//    echo "</pre>";
//    exit;


} catch (PDOException $e) {
    echo $e -> getMessage();
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Listing</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/layout.css">
</head>
<body>
<div id="wrapper">

    <!-- Header includes link -->
    <?php include('../includes/header.php') ?>

    <!-- Nav includes link - Navigation menu to all course assignments -->
    <?php include('../includes/nav.php') ?>


    <section class="main">
        <h3>Customer Listing</h3>

        <?php if (isset($_GET['added']) && !empty($_GET['added'])) { ?>
            <div>
                <p class="success">Customer added successfully!</p>
            </div>
        <?php }  ?>

        <?php if (isset($_GET['updated']) && !empty($_GET['updated'])) { ?>
            <div>
                <p class="success">Customer updated successfully!</p>
            </div>
        <?php }  ?>

        <?php if (isset($_GET['delete']) && !empty($_GET['delete'])) { ?>
            <div>
                <p class="success">Customer deleted successfully!</p>
            </div>
        <?php }  ?>
        <table border="1" width="80%" align="center" >
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
            <?php foreach ($customers as $customer) {?>

                <tr> <!-- Links to the update page -->
                    <td><a style="color: #264653" href="customerUpdate.php?id=<?=$customer['customerId']?>"><?= $customer['customerId']  ?></a></td>
                    <td><a style="color: #264653" href="customerUpdate.php?id=<?=$customer['customerId']?>"><?= $customer['FirstName']  ?></a></td>
                    <td><a style="color: #264653" href="customerUpdate.php?id=<?=$customer['customerId']?>"><?= $customer['LastName']  ?></a></td>
                    <td><?= $customer['Address']  ?></td>
                    <td><?= $customer['City']  ?></td>
                    <td><?= $customer['State']  ?></td>
                    <td><?= $customer['Zip']  ?></td>
                    <td><?= $customer['Phone']  ?></td>
                    <td><?= $customer['Email']  ?></td>
                    <td><?= str_repeat('*', strlen($customer['Password'])) ?></td>
                </tr>
            <?php } ?>

        </table>


        <div>
            <a href="customerAdd.php" style="color: blue">Add New Customer</a>
        </div>

    </section>

    <!-- Footer includes link -->
    <?php include('../includes/footer.php') ?>
</body>
</html>
