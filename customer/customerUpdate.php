<?php

include('../includes/db_conn.php');

// Verify case to save the data from table to the database
if (
    isset($_POST['FirstName']) && !empty($_POST['FirstName'])
    && isset($_POST['LastName']) && !empty($_POST['LastName'])
    && isset($_POST['Address']) && !empty($_POST['Address'])
    && isset($_POST['City']) && !empty($_POST['City'])
    && isset($_POST['State']) && !empty($_POST['State'])
    && isset($_POST['Zip']) && !empty($_POST['Zip'])
    && isset($_POST['Phone']) && !empty($_POST['Phone'])
    && isset($_POST['Email']) && !empty($_POST['Email'])
    && isset($_POST['password_verify']) && !empty($_POST['password_verify'])
    && isset($_POST['customerId']) && !empty($_POST['customerId'])
){
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $address = $_POST['Address'];
    $city = $_POST['City'];
    $state = $_POST['State'];
    $zip = $_POST['Zip'];
    $phone = $_POST['Phone'];
    $email = $_POST['Email'];
    $password = $_POST['password_verify'];
    $id = $_POST['customerId'];

    // -- db stuff

    try {
        $db = new PDO($db_dsn, $db_username, $db_password, $db_options);
        $sql = $db->prepare("
            update phpclass.customer SET
                    FirstName = :FirstName, 
                    LastName = :LastName, 
                    Address = :Address, 
                    City = :City, 
                    State = :State, 
                    Zip = :Zip, 
                    Phone = :Phone, 
                    Email = :Email, 
                    Password = :Password                                  
            where 
                customerId = :Id
        ");
        $sql->bindValue(':FirstName', $firstName);
        $sql->bindValue(':LastName', $lastName);
        $sql->bindValue(':Address', $address);
        $sql->bindValue(':City', $city);
        $sql->bindValue(':State', $state);
        $sql->bindValue(':Zip', $zip);
        $sql->bindValue(':Phone', $phone);
        $sql->bindValue(':Email', $email);
        $sql->bindValue(':Password', $password);
        $sql->bindValue(':Id', $id);
        $sql->execute();

        header("Location:customerListing.php?updated=1");


    } catch (PDOException $e){
        echo $e->getMessage();
        exit();
    }
} // end if

// Verify case to print data from database to the table
if (isset($_GET['id'])){
    $id = $_GET['id'];
//    echo $id;
//    exit();
    try {
        $db = new PDO($db_dsn, $db_username, $db_password, $db_options);
        $sql = $db->prepare("
            SELECT *
            FROM 
                phpclass.customer
            where
                customerId = :Id
        ");
        $sql->bindValue(":Id", $id);
        $sql->execute();
        $customer = $sql->fetch();


    }catch (PDOException $e){
        $e->getMessage();
        exit();
    }

}else {
    header("Location:customerListing.php");
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Customer</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/layout.css">
    <script type="text/javascript">
        function DeleteCustomer(fname, lname, id){

            if (confirm("Do you really want to delete " + fname + " " + lname + "?")){
                document.location.href = "customerDelete.php?id="+id;
            }
        }

    </script>
</head>
<body>
<div id="wrapper">

    <!-- Header includes link -->
    <?php include('../includes/header.php') ?>

    <!-- Nav includes link - Navigation menu to all course assignments -->
    <?php include('../includes/nav.php') ?>


    <section class="main">
        <form method="post">

            <input type="hidden" name="customerId" id="customerId" value="<?= $customer['customerId'] ?>">

            <table border="1" width="100">
                <tr height="50">
                    <th colspan="2"><h3>Update Customer</h3></th>
                </tr>
                <tr height="50">
                    <th>First Name</th>
                    <td>
                        <input type="text" name="FirstName" id="FirstName" size="50" value="<?= $customer['FirstName'] ?>" required >
                    </td>
                </tr>
                <tr height="50">
                    <th>Last Name</th>
                    <td>
                        <input type="text" name="LastName" id="LastName" size="50" value="<?= $customer['LastName'] ?>" required>
                    </td>
                </tr>
                <tr height="50">
                    <th>Address</th>
                    <td>
                        <input type="text" name="Address" id="Address" size="50" value="<?= $customer['Address'] ?>" required>
                    </td>
                </tr>
                <tr height="50">
                    <th>City</th>
                    <td>
                        <input type="text" name="City" id="City" size="50" value="<?= $customer['City'] ?>" required>
                    </td>
                </tr>
                <tr height="50">
                    <th>State</th>
                    <td>
                        <input type="text" name="State" id="State" minlength="2" maxlength="2" size="50" value="<?= $customer['State'] ?>" required>
                    </td>
                </tr>
                <tr height="50">
                    <th>Zip</th>
                    <td>
                        <input type="text" name="Zip" id="Zip" size="50" pattern="[0-9]{5}" title="5 Digit Zip Code" value="<?= $customer['Zip'] ?>" required placeholder="5 Digit Zip Code">
                    </td>
                </tr>
                <tr height="50">
                    <th>Phone
                    <td> <!-- \(\d{3}\)\d{3}\-\d{4} -->
                        <input type="tel" name="Phone" id="Phone" size="50" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="###-###-####" value="<?= $customer['Phone'] ?>" required placeholder="###-###-####">
                    </td>
                </tr>
                <tr height="50">
                    <th>Email</th>
                    <td>
                        <input type="email" name="Email" id="Email" size="50" value="<?= $customer['Email'] ?>" required placeholder>
                    </td>
                </tr>
                <tr height="50">
                    <th>Password</th>
                    <td>
                        <input type="password" name="Password" id="Password" minlength="8" size="50" value="<?= $customer['Password'] ?>" required>
                    </td>
                </tr>
                <tr height="50">
                    <th>Password Verification</th>
                    <td>
                        <input type="password" name="password_verify" id="password_verify" minlength="8" size="50" required>

                        <input type="button" value="Delete Customer" onclick="DeleteCustomer('<?= $customer['FirstName'] ?>', '<?= $customer['LastName'] ?>', '<?= $customer['customerId'] ?>')" />

                    </td>
                </tr>

                <tr height="100">
                    <td colspan="2">
                        <input type="submit" value="Update Customer">
                    </td>
                </tr>
            </table>
        </form>
        <script>
            // Password Verification
            document.getElementById('password_verify').addEventListener("input", function () {
                if (this.value !== document.getElementById('Password').value) {
                    this.setCustomValidity("Passwords must match");
                } else  {
                    this.setCustomValidity("");
                }

            });
        </script>

    </section>

    <!-- Footer includes link -->
    <?php include('../includes/footer.php') ?>
</body>
</html>