<?php
// Coletar id
$indice = $_GET['indice'];

$dados = file_get_contents('ARQdiscursivas.json');
$dados = json_decode($dados);

//deletar a linha com indice
unset($dados[$indice]);

$dados = json_encode($dados, JSON_PRETTY_PRINT);
file_put_contents('ARQdiscursivas.json', $dados);

header('location: DISCindex.php');
?>