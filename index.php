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
  <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
</head>

<body onload="cartUpdate()">
  <?php
  include 'components/header.php';
  ?>
  <section id="container">
    <?php
    $moviesData = file_get_contents('data/movies.json');
    $movieJson = json_decode($moviesData);

    $i = 0;
    $detailId = 1;

    foreach ($movieJson as $movie) {
      if ($i == 0) {
        echo "<div class='movies-rows' id='row$detailId'>";
      }
      include 'components/elementMovie.php';
      $i++;
      if ($i == 5) {
        echo "</div>";
        include 'components/movieDetails.php';
        $i = 0;
        $detailId++;
      }
    }
    if ($i != 0) {
      echo "</div>";
      include 'components/movieDetails.php';
    }
    ?>
    <script>
      for (let i = 0; i < localStorage.length; i++) {
        const movie = document.getElementById(localStorage.key(i));
        try {
          movie.classList.add('oncart');
        } catch (error) {
          console.log(error);
        }
      }
    </script>
  </section>
</body>

</html>