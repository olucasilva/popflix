<?php
$dir = "../data/nf/";
$file = $_GET['file'];
$file_path = $dir . $file;
if (is_readable($file_path)) {
  ob_clean();
  header('Content-Type: text/plain');
  header('Content-Length: ' . filesize($file_path));
  header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
  readfile($file_path);
  exit;
}
?>