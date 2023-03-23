<?php
    session_start();

    $answer='Ask me a question';
    $question = '';
    $previous_question = '';

    if (isset($_POST['txtQuestion']) ){
        $question = $_POST['txtQuestion'];
    }

    if (isset($_SESSION['previous_question'])) {
        $previous_question = $_SESSION['previous_question'];
    }

    $responses = [
            'Ask Again Later',
            'Yes',
            'No',
            'It appears to be so',
            'Reply is hazy, please try again',
            'Yes, definitely',
            'What is you really want to know',
            'My sources say no',
            'Signs point to yes',
            'don\'t count on it',
            'Cannot predict now',
            'As I see it, yes',
            'Better not tell you now',
            'Concentrate and ask again'

    ];

    if (empty($question)){
        $answer = 'Ask me a question';
    } else if (substr($question,  -1) != '?') {
        $answer = 'Please ask me a question with a proper question mark at the end!';
    } else if ($question == $previous_question){
        $answer = 'Please ask me a different question';
    } else {
        $answer = $responses[mt_rand(0, 14)];
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magic 8 Ball</title>
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
        <h3>Magic 8 Ball</h3>
        <p>
            <marquee behavior="" direction=""><?= $answer ?></marquee>

        </p>
        <form action="8ball.php" method="post">
            <label>Ask a Question</label>
            <br>
            <input type="text" name="txtQuestion" id="txtQuestion">
            <br>
            <input type="submit" value="Ask the 8 Ball!">


        </form>


    </section>

    <!-- Footer includes link -->
    <?php include('../includes/footer.php') ?>
</body>
</html>