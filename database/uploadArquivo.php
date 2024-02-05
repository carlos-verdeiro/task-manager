<?php

$anexo = $_FILES["anexo"];

if ($anexo['size'] > 2097152)
    die('Arquivo grande! MAX: 2MB');

if ($anexo['error'])
    die('Falha ao Enviar arquivo!');

$pasta = "archive/";
$nomeArquivo = $anexo['name'];
$novoNomeArquivo = uniqid();
$extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
$path = $pasta . $novoNomeArquivo . '.' . $extensao;

$uploadResposta = move_uploaded_file($anexo['tmp_name'], $path);

if (!$uploadResposta)
    die('Arquivo não enviado com sucesso!');

$arq = $pdo->prepare("INSERT INTO arquivos(nome, path) VALUES (:nArquivo, :pArquivo)");
$arq->bindValue(":nArquivo", $nomeArquivo);
$arq->bindValue(":pArquivo", $path);
$arq->execute();

if ($arq->rowCount() == 0)
    die("Arquivo não cadastrado com sucesso!");

//-------------UPDATE DA CHAVE ESTRANGEIRA-----------------
$idCriadoArquivo = $pdo->lastInsertId();

$ligacao = $pdo->prepare("UPDATE tarefas SET idAnexo=:idArquivo WHERE id=:idTarefa");
$ligacao->bindValue(":idArquivo", $idCriadoArquivo);
$ligacao->bindValue(":idTarefa", $idCriadoTarefa);
$ligacao->execute();

header('location: ../index.php?taskDetail='.$idCriadoTarefa.'&insert=true');
?>
