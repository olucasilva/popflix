<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css" />
    <script src="scripts/script.js"></script>
  </head>
  <body>
    <section id="container">
      <h1>PobreFlix
      </h1>
<?php
    echo "<div class='movies-rows'>
    <div class='movies-list'>";
    for ($j=0; $j < 5; $j++) { 
        $id = 5;
        include 'components/elementMovie.php';
    }
    echo "</div>";
    echo "</div>";
    include 'components/movieDetails.php';

    echo "<div class='movies-rows'>
    <div class='movies-list'>";
    for ($j=5; $j < 10; $j++) { 
        $id = 10;
        include 'components/elementMovie.php';
    }
    $id = $j;
    echo "</div>";
    echo "</div>";
    include 'components/movieDetails.php';
?>
    </section>
  </body>
</html>
