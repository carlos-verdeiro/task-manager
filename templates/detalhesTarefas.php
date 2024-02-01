<link rel="stylesheet" href="css/detalhesTarefas.css">
<?php

include_once("database/conexao.php");
if ($_GET) {
    $idAtual = $_GET['taskDetail'];


    $tarefa = $pdo->prepare("SELECT * FROM tarefas WHERE id = $idAtual");

    $tarefa->execute();

    $tarefa = $tarefa->fetchAll(PDO::FETCH_ASSOC);

    if ($tarefa) {
        foreach ($tarefa as $selecionada){
            
        }
    } else {
        echo include"images/empty.svg";
    }
} else {
    echo include"images/empty.svg";
}