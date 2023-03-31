<?php

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
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
  <title>Filmes Alugados - Pobreflix</title>
</head>

<body>
  <?php
  include '../components/headerRented.php';
  $moviesData = file_get_contents('../data/movies.json');
  $movie = json_decode($moviesData, true);
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

  include '../components/imgRented.php';

  ?>
    
  </section>
</body>

</html>