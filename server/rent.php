<?php
date_default_timezone_set('America/Sao_Paulo');
$dataFilmes = file_get_contents('../data/movies.json');
$itemsFilmes = json_decode($dataFilmes);

$dataSeries = simplexml_load_file('../data/series.xml')->series;


function gravar($email, $personName, $titles, $totalF, $id, $idsSeries, $titlesSeries, $totalS, $totalT)
{
  $url = "http://ip-api.com/json";
  $response = file_get_contents($url);
  $data = json_decode($response, true);
  $cidade = isset($data['city']) ? $data['city'] : 'Não identificado';

  $totalT = "R$" . number_format($totalT, 2, ',', '.');
  $totalS = "R$" . number_format($totalS, 2, ',', '.');
  $totalF = "R$" . number_format($totalF, 2, ',', '.');
  $timestamp = date("d-m-Y_H_i_s");
  $arquivo = "./notaFiscal_$timestamp.txt";
  $fp = fopen($arquivo, 'a+');
  fwrite($fp, "Nome: " . $personName);
  fwrite($fp, "\n");
  fwrite($fp, "Email: " . $email);
  fwrite($fp, "\n");
  fwrite($fp, "Cidade: " . $cidade);
  fwrite($fp, "\n");
  fwrite($fp, "Data: " . date("d-m-Y H:i:s"));
  fwrite($fp, "\n");
  fwrite($fp, "------------------------------------");
  fwrite($fp, "\n");
  fwrite($fp, "Filmes alugados: " . $titles);
  fwrite($fp, "\n");
  fwrite($fp, "ID dos filmes alugados: " . $id);
  fwrite($fp, "\n");
  fwrite($fp, "Valor pago nos filmes: " . $totalF);
  fwrite($fp, "\n");
  fwrite($fp, "------------------------------------");
  fwrite($fp, "\n");
  fwrite($fp, "Series alugados: " . $titlesSeries);
  fwrite($fp, "\n");
  fwrite($fp, "ID das series alugadas: " . $idsSeries);
  fwrite($fp, "\n");
  fwrite($fp, "Valor pago nas series: " . $totalS);
  fwrite($fp, "\n");
  fwrite($fp, "------------------------------------");
  fwrite($fp, "\n");
  fwrite($fp, "Valor pago: " . $totalT);
  fclose($fp);

}

function getItems($itemsFilmes, $dataSeries)
{
  if (isset($_POST['firstname'], $_POST['email'])) {
    $email = $_POST['email'];
    $personName = $_POST['firstname'];
  }
  $totalF = 0;
  $id = "";
  $titles = "";
  foreach ($itemsFilmes as $item) {
    foreach ($_COOKIE as $key => $n) {
      if ($item->id == $key) {
        $id = $id . "\n\t - " . $item->id;
        $titles = $titles . "\n\t - " . $item->title;
        $totalF += $item->price;
      }
    }
  }

  $totalS = 0;
  $titlesSeries = "";
  $idsSeries = "";

  foreach ($dataSeries->children() as $data) {
    foreach ($_COOKIE as $key => $ids) {
      if ($data->id == $key) {
        $idsSeries = $idsSeries . "\n\t - " . $data->id;
        $titlesSeries = $titlesSeries . "\n\t - " . $data->name;
        $totalS += floatval($data->price);
      }
    }
  }
  $totalT = 0;
  $totalT = $totalF + $totalS;


  gravar($email, $personName, $titles, $totalF, $id, $idsSeries, $titlesSeries, $totalS, $totalT);
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