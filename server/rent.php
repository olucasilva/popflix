<?php
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
sleep(1);
header('Location: http://localhost/');
?>