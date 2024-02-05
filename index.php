<?php
if (isset($_GET['insert'])) {
    echo '<div class="position-fixed bottom-0 end-0 p-3 " style="z-index: 11">
    <div id="myToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-success-subtle">
        <strong class="me-auto">Aviso</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Tarefa criada com sucesso
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    var myToast = new bootstrap.Toast(document.getElementById("myToast"));
    myToast.show();
  </script>';
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="images/icon.ico" type="image/x-icon">
    <title>Task Manager</title>
</head>

<body>
    
    <header class="container-fluid"><!--CABEÇALHO-->
    <div id="divEsquerda">
        <img src="images/iconWhite.png" alt="icon" id="iconTask">
        <h4 id="taskTitle">Task Manager</h4>
    </div>
    <div id="divDireita">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#novaTarefa" id="buttonAddTarefa">
            Criar nova tarefa
        </button>
    </div>
        
        
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
        <h6 id="h6Footer">Projeto Realizado por <strong>Carlos Daniel Verdeiro</strong> - 2024</h6>
    </footer>

    
    <?php
    include_once("templates/criarTarefaModal.php");
    ?>

</body>

</html>