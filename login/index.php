<?php

session_start();

include('../includes/db_conn.php');

if (
    isset($_POST['login_email']) && !empty($_POST['login_email'])
    && isset($_POST['login_password']) && !empty($_POST['login_password'])
){

    $login_email = $_POST['login_email'];
    $login_password = $_POST['login_password'];

    try {
        $db = new PDO($db_dsn, $db_username, $db_password, $db_options);
        $sql = $db->prepare("
            SELECT password, role_id, member_key
            FROM 
                phpclass.member_login
            where
                email = :Email
        ");
        $sql->bindValue(":Email", $login_email);
        $sql->execute();
        $row = $sql->fetch();

    if ( $row != null){
        $hashed_password = md5($login_password . $row['member_key']);

        if ($hashed_password == $row['password'] && $row['role_id'] == 3) {
            $_SESSION['UID'] = $row['member_key'];
            $_SESSION['ROLEID'] = $row['role_id'];
            header("Location:admin.php");

        } else if ($hashed_password == $row['password'] && $row['role_id'] != 3) {
            $_SESSION['UID'] = $row['member_key'];
            $_SESSION['ROLEID'] = $row['role_id'];
            header("Location:member.php");

        } else {
            $error_message = "Wrong Username or Password";
        }
    } else {
        $error_message = "Wrong Username or Password";
    }

//    } catch (PDOException $e) {
//        echo $e->getMessage();
//        exit;
//    }

//    if (strtolower($login_email) == 'admin@test.com' && $login_password == 'p@ss') {
//        $_SESSION['UID'] = 1;
//        header("Location:admin.php");
//    } else if (strtolower($login_email) == 'member@test.com' && $login_password == 'p@ss'){
//        unset($_SESSION['UID']);
//        header("Location:member.php");
//    } else {
//        unset($_SESSION['UID']);
//        $error_message = "Wrong Username of or Password";
//    }

    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
} // end if


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        <?php if (isset($error_message) && !empty($error_message)) { ?>
            <p class="error"><?= $error_message ?> </p>
        <?php } ?>

        <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])) { ?>
            <p class="error"><?= $_SESSION['error'] ?> </p>
        <?php } ?>

        <form method="post">
            <table border="1" width="100">
                <tr height="50">
                    <th colspan="2"><h3>Login</h3></th>
                </tr>
                <tr height="50">
                    <th>Email</th>
                    <td>
                        <input type="email" name="login_email" id="login_email" size="50" value="" required> <!--value=< ?= $movie['movie_title'] ?> -->
                    </td>
                </tr>
                <tr height="50">
                    <th>Password</th>
                    <td>
                        <input type="password" name="login_password" id="login_password" size="50" value="" required>
                    </td>
                </tr>

                <tr height="100">
                    <td colspan="2">
                        <input type="submit" value="Login">
                    </td>
                </tr>

            </table>

        </form>

    </section>

    <!-- Footer includes link -->
    <?php include('../includes/footer.php') ?>
</body>
</html>