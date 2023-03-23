<?php
if (
        isset($_POST['movie_name']) && !empty($_POST['movie_name'])
        && isset($_POST['movie_rating']) && !empty($_POST['movie_rating'])
    ){

    $title = $_POST['movie_name'];
    $rating = $_POST['movie_rating'];



    // -- db stuff
    include('../includes/db_conn.php');
    try {
        $db = new PDO($db_dsn, $db_username, $db_password, $db_options);
        $sql = $db->prepare("
            insert into
                phpclass.movielist (movie_title, movie_rating)
                values (:Title, :Rating)
        
        ");
        $sql->bindValue(':Title', $title);
        $sql->bindValue(':Rating', $rating);
        $sql->execute();

        header("Location:list.php?success=1");


    } catch (PDOException $e){
        echo $e->getMessage();
        exit();
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Movie</title>
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
        <form method="post">

            <table border="1" width="100">
                <tr height="50">
                    <th colspan="2"><h3>Add New Movie</h3></th>
                </tr>
                <tr height="50">
                    <th>Movie Name</th>
                    <td>
                        <input type="`text`" name="movie_name" id="movie_name" size="50">
                    </td>
                </tr>
                <tr height="50">
                    <th>Movie Rating</th>
                    <td>
                        <input type="`text`" name="movie_rating" id="movie_rating" size="10">
                    </td>
                </tr>

                <tr height="100">
                    <td colspan="2">
                        <input type="submit" value="Add Movie">
                    </td>
                </tr>

            </table>

        </form>

    </section>

    <!-- Footer includes link -->
    <?php include('../includes/footer.php') ?>
</body>
</html>