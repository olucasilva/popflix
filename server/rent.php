<?php
date_default_timezone_set('America/Sao_Paulo');
$dataFilmes = file_get_contents('../data/movies.json');
$itemsFilmes = json_decode($dataFilmes);

$dataSeries = simplexml_load_file('../data/series.xml')->series->serie;

$total = 0;

function gravar($email, $name, $titles, $price, $totalF, $cidade, $id, $idsSeries, $nameS, $priceS, $totalS, $totalT)
{
  $totalT = "R$" . number_format($totalT, 2, ',', '.');
  $totalS = "R$" . number_format($totalS, 2, ',', '.');
  $totalF = "R$" . number_format($totalF, 2, ',', '.');
  $timestamp = date("d-m-Y_H_i_s");
  $arquivo = "./notaFiscal_$timestamp.txt";
  $fp = fopen($arquivo, 'a+');
  fwrite($fp, "Nome: " . $name);
  fwrite($fp, "\n");
  fwrite($fp, "Email: " . $email);
  fwrite($fp, "\n");
  fwrite($fp, "Cidade: " . $cidade);
  fwrite($fp, "\n");
  fwrite($fp, "Data: " . date("d-m-Y H:i:s"));
  fwrite($fp, "\n");
  fwrite($fp, "Filmes alugados: " . $titles);
  fwrite($fp, "\n");
  fwrite($fp, "ID dos filmes alugados: " . $id);
  fwrite($fp, "\n");
  fwrite($fp, "Valor pago nos filmes: " . $totalF);
  fwrite($fp, "\n");
  fwrite($fp, "Series alugados: " . $nameS);
  fwrite($fp, "\n");
  fwrite($fp, "ID das series alugadas: " . $idsSeries);
  fwrite($fp, "\n");
  fwrite($fp, "Valor pago nas series: " . $totalS);
  fwrite($fp, "\n");
  fwrite($fp, "Valor pago: " . $totalT);
  fclose($fp);

}

function getItems($itemsFilmes, $dataSeries)
{
  if (isset($_POST['firstname'], $_POST['email'])) {
    $email = $_POST['email'];
    $name = $_POST['firstname'];
  }

  $ids = "";
  $titles = "";
  foreach ($itemsFilmes as $item) {
    foreach ($_COOKIE as $key => $ids) {
      if ($item->id == $key) {
        $id = $id . "\n" . $item->id;
        $titles = $titles . "\n" . $item->title;
        $price = "R$" . number_format($item->price, 2, ',', '.');
        $totalF += $item->price;
      }
    }
  }


  $nameS = "";
  $idsSeries = "";

  foreach ($dataSeries as $data) {
    foreach ($_COOKIE as $key => $ids) {
      if ($data->id == $key) {
        $idsSeries = $idsSeries . "\n" . $data->id;
        $nameS = $nameS . "\n" . $dataSeries->$name;
        $priceS = floatval($data->price);
        $priceS = "R$" . number_format($priceS, 2, ',', '.');
        $totalS += $data->price;
      }
    }
  }
  $totalT = $totalF + $totalS;

  $url = "http://ip-api.com/json";
  $response = file_get_contents($url);
  $data = json_decode($response, true);
  $cidade = isset($data['city']) ? $data['city'] : 'Não identificado';

  gravar($email, $name, $titles, $price, $totalF, $cidade, $id, $idsSeries, $nameS, $priceS, $totalS, $totalT);
}
getItems($itemsFilmes, $dataSeries);



// Incluir rotina para:
//   Gravar em arquivo texto: 
//     -Dados do cliente
//     -Data completa com o nome da cidade
//     -Ids dos selecionados 
//     -Valor total
foreach ($_COOKIE as $key => $value) {
  // Define uma data de validade passada para o cookie
  setcookie($key, '', time() - 3600, '/');
}
?>
<script >
  const cart = Object.entries(localStorage);
  let i = 0;
  // Itera sobre cada item utilizando forEach
  cart.forEach(([key, value]) => {
    localStorage.removeItem(key, value);
  });
  window.location.href = "http://localhost/";
</script>