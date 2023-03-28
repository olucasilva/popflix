<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="styles/style.css" />
  <link rel="stylesheet" href="styles/header.css">
  <script src="scripts/script.js"></script>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=PT+Sans&display=swap" rel="stylesheet">
</head>

<body>
  <section id="container">
    <?php
    include 'components/header.php';

    echo "<div class='movies-rows'>";
    for ($j = 0; $j < 5; $j++) {
      $id = 5;
      include 'components/elementMovie.php';
    }
    echo "</div>";
    include 'components/movieDetails.php';

    echo "<div class='movies-rows'>";
    for ($j = 5; $j < 10; $j++) {
      $id = 10;
      include 'components/elementMovie.php';
    }
    $id = $j;
    echo "</div>";
    include 'components/movieDetails.php';
    ?>
  </section>
</body>

</html>