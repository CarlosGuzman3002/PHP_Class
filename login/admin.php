<?php
    session_start();

    if (
        !isset($_SESSION['ROLEID'])
        || $_SESSION['ROLEID'] != 3
    ){
        $_SESSION['error'] = "Session has expired";
        header("Location:index.php");
    }

    $error_message = '';
    $fullname = '';
    $email = '';
    $password = '';
    $verify_password = '';
    $role = '';
    $member_key = sprintf(
            '%04X%04X%04X%04X%04X%04X%04X%04X',
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(16384, 20479),
            mt_rand(32768, 49151),
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(0, 65535)
    );


    if (isset($_POST['submit'])) {
        // validation
        // Full Name
        if (isset($_POST['txt_fullname']) && !empty($_POST['txt_fullname'])) {
            $fullname = $_POST['txt_fullname'];
        }
        else {
            $error_message = 'Full Name is required';
        }
        // Email
        if (isset($_POST['txt_email']) && !empty($_POST['txt_email'])) {
            $email = $_POST['txt_email'];
        }
        else {
            $error_message = 'Email is required';
        }
        // Password
        if (isset($_POST['txt_password']) && !empty($_POST['txt_password'])) {
            $password = $_POST['txt_password'];
        }
        else {
            $error_message = 'Password is required';
        }
        // Verify Pass
        if ($password == $_POST['txt_verify_password']) {
            $verify_password = $_POST['txt_verify_password'];
        }
        else {
            $error_message = 'Passwords must match';
        }
        // Role
        if (isset($_POST['txt_role']) && !empty($_POST['txt_role'])) {
            $role = $_POST['txt_role'];
        }
        else {
            $error_message = 'User role is required';
        }


        //-- If all data validations pass, then we insert new record into the database
        if (empty($error_message)) {
            include ('../includes/db_conn.php');
            try {
                $db = new PDO($db_dsn, $db_username, $db_password, $db_options);

                $sql = $db->prepare("
                    Select 
                        member_id
                    from
                        phpclass.member_login
                    where
                        email = :Email
                ");
                $sql->bindValue(':Email', $email);
                $sql->execute();
                $row = $sql->fetch();
                if ($row != null){
                    $error_message = $email . " already exists";
                } else {

                    $sql = $db->prepare("
                    INSERT INTO phpclass.member_login
                        (name, email, password, role_id, member_key)
                    VALUES (:Name, :Email, :Password, :RoleId, :MemberKey)
                    ");
                    $sql->bindValue(':Name', $fullname);
                    $sql->bindValue(':Email', $email);
                    $sql->bindValue(':Password', md5($password . $member_key));
                    $sql->bindValue(':RoleId', $role);
                    $sql->bindValue(':MemberKey', $member_key);

                    $sql->execute();

                    $error_message = "New Member Added";
                    $fullname = '';
                    $email = '';
                    $password = '';
                    $verify_password = '';
                    $role = '';
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
                exit();
            }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
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
        <h3>Admin Page</h3>

        <?php if (isset($error_message) && !empty($error_message)) { ?>
            <p class="error"> <?= $error_message ?> </p>
        <?php } ?>

        <form method="post">
            <table border="1" width="100">
                <tr height="50">
                    <th colspan="2"><h3>Add New Member</h3></th>
                </tr>

                <tr height="50">
                    <th>Full Name</th>
                    <td>
                        <input type="text" name="txt_fullname" id="txt_fullname" size="50" value="<?= $fullname ?>" > <!--value=< ?= $movie['movie_title'] ?> -->
                    </td>
                </tr>

                <tr height="50">
                    <th>Email</th>
                    <td>
                        <input type="email" name="txt_email" id="txt_email" size="50" value="<?= $email ?>" > <!--value=< ?= $movie['movie_title'] ?> -->
                    </td>
                </tr>
                <tr height="50">
                    <th>Password</th>
                    <td>
                        <input type="password" name="txt_password" id="txt_password" size="50" value="<?= $password ?>" >
                    </td>
                </tr>

                <tr height="50">
                    <th>Password Verify</th>
                    <td>
                        <input type="password" name="txt_verify_password" id="txt_verify_password" size="50" value="<?= $verify_password ?>" >
                    </td>
                </tr>

                <tr height="50">
                    <th>User Role</th>
                    <td>
                        <select name="txt_role" id="txt_role">
                            <option value="1" <?php if ($role == 1) {echo "selected";} ?> >Member</option>
                            <option value="2" <?php if ($role == 2) {echo "selected";} ?> >Operator</option>
                            <option value="3" <?php if ($role == 3) {echo "selected";} ?> >Admin</option>
                        </select>
                    </td>
                </tr>

                <tr height="100">
                    <td colspan="2">
                        <input type="submit" value="Add Member" name="submit">
                    </td>
                </tr>

            </table>

        </form>

    </section>

    <!-- Footer includes link -->
    <?php include('../includes/footer.php') ?>
</body>
</html>