<?php 

session_start();

$title = str_replace('&', '-', $_POST['titulo']);
$category = str_replace('&', '-', $_POST['categoria']);
$description = str_replace('&', '-', $_POST['descricao']);

$text = $_SESSION['id'] . '&' . $title . '&' . $category . '&' . $description . PHP_EOL;
echo $text;

//abrindo, escrevendo, fechando o arquivo:
$file = fopen('file.hd', 'a');

fwrite($file, $text);

fclose($file);

//echo $text;

header('Location: abrir_chamado.php');
?>