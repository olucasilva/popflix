<?php
if (isset($_GET['key']) && isset($_GET['value'])) {
  setcookie($_GET['key'], $_GET['value'], time() + 1800); // expira em 1 hora
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../styles/cart.css" />
  <link rel="stylesheet" href="../styles/header.css" />
  <script src="../scripts/cart.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
  <title>Filmes Alugados - Pobreflix</title>
</head>

<body onload="cartUpdate()">

  <?php

  include '../components/header.php';
  $data = file_get_contents('../data/movies.json');
  $items = json_decode($data);

  ?>
  <section id='container'>
    <section id='items'>
      <?php
      $total = 0;

      foreach ($items as $item) {
        foreach ($_COOKIE as $key => $ids) {
          if ($item->id == $key) {
            $id = $item->id;
            $poster_path = $item->poster_path;
            $title = $item->title;
            $price = "R$" . number_format($item->price, 2, ',', '.');
            $total += $item->price;
            include '../components/cartItem.php';
          }
        }
      }
      $data = "../data/series.xml";
      $items = simplexml_load_file($data)->series;
      $items = $items->serie;
      foreach ($items as $item) {
        foreach ($_COOKIE as $key => $ids) {
          if ($item->id == $key) {
            $id = $item->id;
            $poster_path = $item->poster_path;
            $title = $item->name;
            $price = "R$" . number_format(floatval($item->price), 2, ',', '.');
            $total += $item->price;
            include '../components/cartItem.php';
          }
        }
      }
      $atribute=null;
      if ($total == 0) {
        echo "<div class='cart-item'>
        <div class='item-img'>Nada por aqui...
        </div>";
        $atribute='disabled';
      }
      ?>
    </section>
    <section id='price'>
      <div class="total-price">
        Preço total:
        <?php
        echo "R$" . number_format($total, 2, ',', '.');
        ?>
        <form action="../pages/rent.php">
          <input type='submit' value='Alugar' <?php echo $atribute?>>
          </input>
        </form>
      </div>
    </section>
  </section>
</body>

</html>