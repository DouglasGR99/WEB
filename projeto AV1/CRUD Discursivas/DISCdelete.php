<?php
// Coletando id
$indice = $_GET['indice'];

// Carrega o conteúdo do arquivo JSON
$dados = file_get_contents('ARQdiscursivas.json');
$dados = json_decode($dados);

// Remove o item que foi selecionado
unset($dados[$indice]);

// Codifica os dados para formato JSON e salva no arquivo
$dados = json_encode($dados, JSON_PRETTY_PRINT);
file_put_contents('ARQdiscursivas.json', $dados);

header('location: DISCindex.php');
?>