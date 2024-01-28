<?php
try {
    //Criação do construtor, deve-se passar 4 parâmetro:
    //dbname;host
    //usuario e senha
    $pdo = new PDO("mysql:dbname=taskmanager;host=localhost", "root", "");

    //PDOException é para erros relacionados ao banco de dados
} catch (PDOException $e) {
    //A variável $e é responsável pela mensagem de erro
    echo "Erro com banco de dados: " . $e->getMessage();
}
//Esse é apara qualquer outro erro que não seja de banco de dados
catch (Exception $e) {
    echo "Erro genérico: " . $e->getMessage();
}
//------------CONEXÃO------------