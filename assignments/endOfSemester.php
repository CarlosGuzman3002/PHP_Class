<?php
// -- Assignment - End of Semester Countdown Timer
$SEC_PER_MIN = 60;
$SEC_PER_Hour = 60 * $SEC_PER_MIN;
$SEC_PER_Day = 24 * $SEC_PER_Hour;
$SEC_PER_Year = 365 * $SEC_PER_Day;
$NOW = time();

$END_SEMESTER = mktime( 0 , 0, 0, 5, 20, 2023);
$seconds = $END_SEMESTER - $NOW;
// Calculate the number of years
$years = floor($seconds / $SEC_PER_Year);
// remove years and seconds from total seconds
$seconds = $seconds - ($SEC_PER_Year * $years);
// Calculate the number of days
$days = floor( $seconds/$SEC_PER_Day );
// remove days in seconds from total seconds
$seconds = $seconds - ($SEC_PER_Day * $days);
// Calculate the number of hours
$hours = floor( $seconds/$SEC_PER_Hour );
// remove hours in seconds from total seconds
$seconds = $seconds - ($SEC_PER_Hour * $hours);
// Calculate the number of minutes
$minutes = floor( $seconds/$SEC_PER_MIN );
// remove minutes in seconds from total seconds
$seconds = $seconds - ($SEC_PER_MIN * $minutes);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countdown Timer</title>
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
        <h3>Assignment - End of Semester Countdown Timer</h3>
        <p>Now: <?= $NOW?></p>
        <p>End of semester: <?= $END_SEMESTER ?></p>
        <p>
            Years: <?= $years ?>
            | Days: <?= $days ?>
            | Hours: <?= $hours ?>
            | Minutes: <?= $minutes ?> </p>

        <p> Current Date: <?= date( "Y-m-d H:m:s")  ?></p>
    </section>

    <!-- Footer includes link -->
    <?php include('../includes/footer.php') ?>
</body>
</html>