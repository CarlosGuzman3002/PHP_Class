<?php

include('../includes/db_conn.php');

try {
    // this query process from the database is like ordering a pizza
    $db = new PDO($db_dsn, $db_username, $db_password, $db_options); // 1st Calling Pizza Hut
    $sql = $db ->prepare( "SELECT * FROM phpclass.movielist;"); // 2nd Placing your order
    $sql -> execute(); // 3rd baking the pizza
    $movies = $sql -> fetchAll(); // 4th pizza deliver

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
    <title>Movie List Database</title>
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
        <h3>My Movie List</h3>

        <?php if (isset($_GET['success']) && !empty($_GET['success'])) { ?>
            <div>
                <p class="success">Movie added/updated successfully!</p>
            </div>
        <?php }  ?>

        <?php if (isset($_GET['delete']) && !empty($_GET['delete'])) { ?>
            <div>
                <p class="success">Movie deleted successfully!</p>
            </div>
        <?php }  ?>
        <table border="1" width="80%" align="center">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Rating</th>
            </tr>
            <?php foreach ($movies as $movie) {?>

            <tr>
                <td><?= $movie['movie_id']  ?></td>
                <td><a style="color: #264653" href="update.php?id=<?=$movie['movie_id']?>"><?= $movie['movie_title']  ?></a></td>
                <td><?= $movie['movie_rating']  ?></td>
            </tr>
            <?php } ?>

        </table>


        <div>
            <a href="add.php" style="color: blue">Add New Movie</a>
        </div>

    </section>

    <!-- Footer includes link -->
    <?php include('../includes/footer.php') ?>
</body>
</html>
