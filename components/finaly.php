<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="../styles/finaly.css" />
  <link rel="stylesheet" href="../styles/style.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=PT+Sans&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />

  <script src="../scripts/cart.js"></script>

  <title>PopFlix - Filmes</title>
</head>

<body onload="clearCart()">
  <div class='finaly'>
    <label>
      <center>Compra efetuada com sucesso! Baixe a nota fiscal clicando <a
          href="../components/download.php?file=<?php echo $file ?>">aqui</a></center>
    </label>
    <br>
    <form action="../">
      <button id="finaly" onclick="submit()">Voltar ao início</button>
    </form>
  </div>
</body>