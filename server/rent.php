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