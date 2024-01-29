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

if ($arq->rowCount() == 0)//Verifica de alguma linha foi alterada

    die("Arquivo não cadastrado com sucesso!");


//-------------UPDATE DA CHAVE ESTRANGEIRA-----------------
$idCriadoArquivo = $pdo->lastInsertId(); // Recupera o último id inserido

$ligacao = $pdo->prepare("UPDATE tarefas SET idAnexo = :idArquivo WHERE id = :idTarefa");

$ligacao->bindValue(":idArquivo", $idCriadoArquivo, PDO::PARAM_INT);
$ligacao->bindValue(":idTarefa", $idCriadoTarefa, PDO::PARAM_INT);

$ligacao->execute();
