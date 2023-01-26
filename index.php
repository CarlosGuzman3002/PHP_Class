<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carlos Guzman</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
<div id="wrapper">
    <header>
        <h1><img src="img/myBanner.jpg" alt="Banner" width="1000" height="479"></h1>
    </header>

    <!-- Navigation menu to all course assignments -->
    <nav class="left">
        <ul>
            <h4>Lesson 1</h4>  <!-- Check (work on progress) to be sure if my code is ready to be graded-->
            <li><a href="/">Homepage</a></li>
            <li><a href="#">Loops Demo</a></li>
            <li><a href="#">Countdown Item 1-4</a></li>
        </ul>
    </nav>


    <section class="main">
        <h2>PHP Dynamic Web Applications - 91798</h2>
        <img src="img/myPhoto.jpg" class="leftImage" alt="Profile Photo" width="250" height="250"><br>
        <h4>Carlos Daniel Guzman Ramirez</h4>
        <p>This is me. I'm an international student from Costa Rica. I got a Fully Funded Scholarship from my government to complete my studies of Software Development AAS. at FVTC and I'm aspiring to pursuit a Bachelors Degree in the US too and eventually get a specialization in Artificial Intelligence.</p>
    </section>

    <footer class="foot">
        <p><small>&copy; <?= date("Y") ?> Carlos Guzman, Inc.</small></p> <!--Copyrights-->
        <address>
            <small>I hope you like my work. I work hard every day to make it right</small>
        </address>
    </footer>
</body>
</html>