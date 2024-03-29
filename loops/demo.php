<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loops Demo</title>
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
        <h3>Loops Demo</h3>

    <?php
        $number = 100;
        print $number;
        echo  "<br/><strong>" . $number . "</strong>";
        echo "<br/><strong>$number</strong>";
        echo  '<br/><strong>' . $number . '</strong>';
        echo  "<br/><strong>$number</strong>";
        echo  "<br/><strong>$number</strong>";
        $result = "<br/><strong>";
        $result .= $number;
        $result .= "<strong>";

        $number1 = 100;
        $number2 = 50;
        $result1 = $number1+$number2;
        $result2 = $number1-$number2;
        $result3 = $number1*$number2;
        $result4 = $number1/$number2;

        echo  "<br/><strong>$number1 + $number2 = $result1</strong> ";
        echo  "<br/><strong>$number1 - $number2 = $result2</strong> ";
        echo  "<br/><strong>$number1 * $number2 = $result3</strong> ";
        echo  "<br/><strong>$number1 / $number2 = $result4</strong> ";

        // --- Loops ---
        // while
        $i = 1;
        while ($i<7){
            echo "<h$i>Hello World</h$i>";
            $i++;
        }

        $i=6;
        while ($i > 0) {
            echo "<h$i>Hello World</h$i>";
            $i--;
        }

        // do while
        $i = 6;
        do {
            echo "<h$i>Hello World</h$i>";
            $i--;
        } while ($i > 0);

        // for
        for ($i = 1; $i <= 6; $i++)
            echo "<h$i>Hello World</h$i>";

        // String functions
        echo "<br><br><br>";
        $full_name = "Bob Smith";
        $position = strpos($full_name, ' ');
        echo "<br>The White space is in the $position position";

        echo "<br>".strtoupper($full_name);
        echo "<br>".strtolower($full_name);

        $name_parts=explode(' ', $full_name);
        echo "<br>First Name: " . $name_parts[0];


    ?>

    </section>

    <!-- Footer includes link -->
    <?php include('../includes/footer.php') ?>
</body>
</html>