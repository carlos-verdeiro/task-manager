<?php

$anexo = $_FILES["anexo"];

if ($anexo['size'] > 2097152)
    die('Arquivo grande! MAX: 2MB');

if ($anexo['error'])

    die('Falha ao Enviar arquivo!');


$pasta = "archive/";
$nomeArquivo = $anexo['name'];
$novoNomeArquivo = uniqid();
$extensao = strtolower/*Deixa tudo em minúsculo*/(pathinfo/*Informações de path(caminho)*/($nomeArquivo, PATHINFO_EXTENSION/*Especifica que que somente a extensão*/));
$path = $pasta . $novoNomeArquivo . '.' . $extensao;

$uploadResposta = move_uploaded_file($anexo['tmp_name'], $path);

if (!$uploadResposta)
    die('Arquivo não enviado com sucesso!');


$arq = $pdo->prepare("INSERT INTO arquivos(nome, path) VALUES (:nArquivo, :pArquivo)");

$arq ->bindValue(":nArquivo", $nomeArquivo);
$arq ->bindValue(":pArquivo", $path);

$arq -> execute();

if ($arq->rowCount() > 0){
    echo"arquivo enviado com sucesso!";
}

/*
$ligacao = $pdo->prepare("UPDATE tarefas SET idAnexo = ");

$ligacao ->bindValue(":nArquivo", $nomeArquivo);
$ligacao ->bindValue(":pArquivo", $path);

$ligacao -> execute();

UPDATE tabela_filha
SET coluna_chave_estrangeira = novo_valor
WHERE condição_para_selecionar_as_linhas;

*/


//FALTA CONECTAR COM CHAVE ESTRANGEIRA-------------------------------