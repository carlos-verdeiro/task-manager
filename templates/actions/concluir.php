<title>Conclusão</title>

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