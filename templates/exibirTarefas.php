<?php

include_once"database/conexao.php";

$sql = "SELECT * FROM tarefas";
$result = $pdo->query($sql);
$result ->execute();

//------------RECEBER AS LINHAS E TRATAR---------