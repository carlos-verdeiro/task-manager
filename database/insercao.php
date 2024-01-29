<?php

include_once("conexao.php");

/*
Existem dois métodos de inserção:

É para quando precisa fazer uma substituição por parâmetro

$res = $pdo->prepare("INSERT INTO tarefas(titulo, observacao, data, hora, intdia, anexo) VALUES (:t, :o, :d, :h, :i, :a);"); 

Para substituir os parâmetros, possuem dois tipos:

$res->bindValue(:t,"teste");  Aceita todo tipo de valor: variável, diretamente, função.

$titulo = "teste";
$res->bindparam(":t","$titulo");  Aceita somente variáveis.

$pdo->query(); 

É quando não precisa fazer nenhuma preparação ou substituição
*/
$res = $pdo->prepare("INSERT INTO tarefas(titulo, observacao, data, hora, intdia) VALUES (:t, :o, :d, :h, :i);"); 

$res->bindValue(":t", $_POST["titulo"]);
$res->bindValue(":o", $_POST["observacao"]);
$res->bindValue(":d", $_POST["data"]);
if (isset($_POST["dInteiro"])) {
    $dInt = "1";
}else{
    $dInt = "0";
}
$res->bindValue(":h",($dInt == "1") ? null : $_POST["hora"]);
$res->bindValue(":i",$dInt);
$res->execute();

if ($res->rowCount() > 0) {
    echo"Cadastro relizado com sucesso!";
}

if ($_FILES["anexo"]["error"] != 4)/*Verificando se o upload está vazio*/ {
    include_once("uploadArquivo.php");//Fazendo upload do arquivo para o servidor
}
