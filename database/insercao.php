<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="shortcut icon" href="../images/icon.ico" type="image/x-icon">
<title>Cadastro</title>
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
    $idCriadoTarefa = $pdo->lastInsertId();//Recupera o ultimo id inserido
    echo'<div class="alert alert-success" role="alert">
    Cadastro realizado com sucesso!
  </div>';
  
  if ($_FILES["anexo"]["error"] != 4)/*Verificando se o upload está vazio*/ {
    include_once("uploadArquivo.php");//Fazendo upload do arquivo para o servidor
}else{
    header('location: ../index.php?taskDetail='.$idCriadoTarefa.'&insert=true');
}
  
}