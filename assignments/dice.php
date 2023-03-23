<?php

$dice1 = 0;
$dice2 = 0;
$dice3 = 0;

$score1=0;
$score2=0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice Roller</title>
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
        <h2>Dice Roller</h2>
        <br>

    <?php
    // Dice roll for User 1:
    $dice1 = mt_rand(1,6);
    $dice2 = mt_rand(1,6);

    $score1 = $dice1 + $dice2;

        echo "<h3>Your score: $score1 </h3>";
        echo "<img src='../img/dice_".$dice1.".png'>";
        echo "<img src='../img/dice_".$dice2.".png'>";

    // Dice roll for Computer:
    $dice1 = mt_rand(1,6);
    $dice2 = mt_rand(1,6);
    $dice3 = mt_rand(1,6);

    $score2 = $dice1 + $dice2 + $dice3;

    echo "<h3>Computer score: $score2 </h3>";
    echo "<img src='../img/dice_".$dice1.".png'>";
    echo "<img src='../img/dice_".$dice2.".png'>";
    echo "<img src='../img/dice_".$dice3.".png'>";

    if ($score1 > $score2) {
        echo '<h5 style="text-align: center">You Win!</h5>';
    }
    else if ($score1 < $score2) {
        echo '<h5 style="text-align: center">Computer Wins!</h5>';
    }
    else {
        echo '<h4 style="text-align: center">Tie!</h4>';
    }
    ?>
    </section>

    <!-- Footer includes link -->
    <?php include('../includes/footer.php') ?>
</body>
</html>