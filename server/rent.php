<?php
$i = 0;

foreach ($_COOKIE as $key) {
  $i++;
  break;
}
if ($i != 0) {
  date_default_timezone_set('America/Sao_Paulo');

  $dataFilmes = file_get_contents('../data/movies.json');
  $itemsFilmes = json_decode($dataFilmes);

  $dataSeries = simplexml_load_file('../data/series.xml')->series;

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
        $totalS += $data->price;
      }
    }
  }
  $totalT = 0;
  $totalT = $totalF + $totalS;

  //api para pegar localizacao
  try {
    $url = "http://ip-api.com/json";
    $response = file_get_contents($url);
    $data = json_decode($response, true);
  } catch (Exception $e) {
    echo $e;
  }
  $cidade = isset($data['city']) ? $data['city'] : 'Não identificado';
  $totalT = "R$" . number_format($totalT, 2, ',', '.');
  $totalS = "R$" . number_format($totalS, 2, ',', '.');
  $totalF = "R$" . number_format($totalF, 2, ',', '.');
  $timestamp = date("d-m-Y_H_i_s");

  //escreve os dados em arquivo txt
  $dir = "../data/nf/";
  $file = "notaFiscal_$timestamp.txt";
  $file_path = $dir . $file;

  $fp = fopen($file_path, 'a+');
  if ($fp) {
    fwrite($fp, "Nome: " . $personName . "\n");
    fwrite($fp, "Email: " . $email . "\n");
    fwrite($fp, "Cidade: " . $cidade . "\n");
    fwrite($fp, "Data: " . date("d-m-Y H:i:s") . "\n");
    fwrite($fp, "------------------------------------" . "\n");
    fwrite($fp, "Filmes alugados: " . $titles . "\n");
    fwrite($fp, "ID dos filmes alugados: " . $id . "\n");
    fwrite($fp, "Valor pago nos filmes: " . $totalF . "\n");
    fwrite($fp, "------------------------------------" . "\n");
    fwrite($fp, "Series alugadas: " . $titlesSeries . "\n");
    fwrite($fp, "ID das series alugadas: " . $idsSeries . "\n");
    fwrite($fp, "Valor pago nas series: " . $totalS . "\n");
    fwrite($fp, "------------------------------------" . "\n");
    fwrite($fp, "Valor total: " . $totalT . "\n");
    fclose($fp);
  }

  foreach ($_COOKIE as $key => $value) {
    // Define uma data de validade passada para o cookie
    setcookie($key, '', time() - 3600, '/');
  }
}
include '../components/finaly.php';
?>