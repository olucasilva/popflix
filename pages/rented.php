<?php


if (isset($_GET['key']) && isset($_GET['value'])) {
  setcookie($_GET['key'], $_GET['value'], time() + 1800); // expira em 1 hora
  $cookie_nome = 'detailed';
  unset($_COOKIE[$cookie_nome]);
  setcookie($cookie_nome, '', time() - 100000, '/');
}
$firstName = $_POST['first-name'];
$birthDate = new DateTime($_POST['birth-date']);
$todayDate = new DateTime(date('y-m-d'));
$intervall = date_diff($birthDate, $todayDate);
$age = $intervall->format('%y anos');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../styles/response_cadastro.css" />
  <link rel="stylesheet" href="../styles/header.css"/>
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
      <section>
      <div class="container">
        <div class="divText">
          <p>
            <b>
              <?php echo $firstName . ',' ?>
            </b>
      </p>
      <p>
          Obrigado por utilizar a Pobreflix, estes foram os filmes selecionados:

      </p>
    </div>
  </div>
  <?php
  foreach ($movies as $array) {
    if (in_array($array, $_COOKIE)) {
      echo "foi";
    }
  }

  // $j = 0;
  // foreach ($movies as $movie) {
  //   foreach ($_COOKIE as $nome) {
  //     if ($movie[$i]['id'] == $_COOKIE[$nome]) {
  //       $link[$j] = $movie[$i]['poster_path'];
  //       print_r($link);
  //       $j++;
  //     }
  //   }
  

  // }
  
  include '../components/imgRented.php';

  ?>
    
  </section>
</body>

</html>