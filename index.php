<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="images/calendario.ico" type="image/x-icon">
    <title>Gerenciador de tarefas</title>
</head>

<body>
    
    <header class="container-fluid"><!--CABEÇALHO-->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novaTarefa">
            Criar nova tarefa
        </button>
    </header>

    <main class="container-fluid row mx-auto text-center p-0"> <!--PRINCIPAL-->






        <section id="detalhes" class="container-fluid p-2 col overflow-y-auto"><!--Detalhes da tarefa selecionada-->
            <?php include_once("templates/detalhesTarefas.php")?>
        </section>






        <section id="tarefas" class="container-fluid p-2 col overflow-auto"><!--Lista de tarefas existentes-->
            <?php include_once("templates/exibirTarefas.php")?>
        </section>




    </main>

    <footer class="container-fluid"><!--RODAPÉ-->
        ...
    </footer>

    
    <?php
    include_once("templates/criarTarefaModal.php");
    ?>

</body>

</html>