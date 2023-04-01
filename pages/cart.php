<?php
if (isset($_GET['key']) && isset($_GET['value'])) {
  setcookie($_GET['key'], $_GET['value'], time() + 1800); // expira em 1 hora
}
// $firstName = $_POST['first-name'];
// $birthDate = new DateTime($_POST['birth-date']);
// $todayDate = new DateTime(date('y-m-d'));
// $intervall = date_diff($birthDate, $todayDate);
// $age = $intervall->format('%y anos');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../styles/cart.css" />
  <link rel="stylesheet" href="../styles/header.css" />
  <script src="../scripts/script.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
  <title>Filmes Alugados - Pobreflix</title>
</head>

<body onload="cartUpdate()">

  <?php

  include '../components/header.php';
  $moviesData = file_get_contents('../data/movies.json');
  $movies = json_decode($moviesData, true);

  ?>
  <section id='container'>
    <section id='items'>
      <?php
      $total = 0;

      foreach ($movies as $array) {
        foreach ($_COOKIE as $key => $ids) {
          if ($array['id'] == $key) {
            $poster_path = $array['poster_path'];
            $title = $array['title'];
            $price = "R$" . number_format($array['price'], 2, ',', '.');
            $total += $array['price'];
            include '../components/cartItem.php';
          }
        }
      }
      ?>
    </section>
    <section id='price'>
      <div class="total-price">
        Precço Total:
        <?php
        echo "R$" . number_format($total, 2, ',', '.');
        ?>
        <form action="../pages/rent.php">
          <input type='submit' value='Alugar'>
          </input>
        </form>
      </div>
    </section>
  </section>
</body>

</html>