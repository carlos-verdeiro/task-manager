<link rel="shortcut icon" href="../../images/icon.ico" type="image/x-icon">
<title>Concluir</title>

<?php

include_once "../../database/conexao.php";

$id = $_GET['taskDetail'];

$conclusao = $pdo ->prepare("UPDATE tarefas SET status = :status WHERE id=:id");

$conclusao -> bindValue(':status', 1);
$conclusao -> bindValue(':id', $id);

$conclusao -> execute();

if ($conclusao -> rowCount() > 0) {
    header('location: ../../index.php?taskDetail='.$id.'&insert=true');
}else {
    $conclusao = $pdo ->prepare("UPDATE tarefas SET status = :status WHERE id=:id");

    $conclusao -> bindValue(':status', 0);
    $conclusao -> bindValue(':id', $id);
    
    $conclusao -> execute();
    header('location: ../../index.php?taskDetail='.$id.'&insert=true');
}