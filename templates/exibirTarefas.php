<link rel="stylesheet" href="css/exibirTarefas.css">
<?php

include_once("database/conexao.php");

$ligacao = $pdo->prepare("SELECT * FROM tarefas ORDER BY status ASC, data ASC, hora ASC, titulo ASC");

$ligacao->execute();

$linhas = $ligacao->fetchAll(PDO::FETCH_ASSOC); //recebe todas as linhas da tabela que foi retornada

if ($linhas) {
    foreach ($linhas as $linha) { //O foreach vai percorrer todas as linhas da tabela
        $status = $linha['status'];
        $titulo = $linha["titulo"];
        $observacao = $linha["observacao"];
        echo '<a href="?taskDetail='.$linha["id"].'" class="upGet">';
        echo '<content class="blocoTarefa container-sm border border-black" value="' . $linha['id'] . '">';

        $dataFormatada = DateTime::createFromFormat('Y-m-d', $linha["data"])->format('d/m/Y'); //formata para o padrão brasileiro a data
        
        $hora = ($linha['intdia'] == 1) ? '<p class="hora">Dia inteiro</p>' : '<p class="hora">' . date('H:i', strtotime($linha['hora'])) . '</p>';//Verifica e converte
        $rodape = ($linha["idAnexo"] != null) ? '<div class="rodapeAnexo text-success"><img src="images/fileTrue.svg"><p>Com anexo</p>' : ' <div class="rodapeAnexo text-danger"><img src="images/fileFalse.svg"><p>Sem anexo</p>';

        echo '<div class="header">';

        if ($linha['observacao'] == "") {
            echo $hora;
            echo '<p class="data">' . $dataFormatada . '</p>'; //exibe o padrão brasileiro
        } else {
            echo $hora;
            echo '<h4 class="titulo">' . ($status == 0 ? $linha["titulo"] : "<del>" .$linha["titulo"]."</del>" ) . '</h4>';
            echo '<p class="data">' . $dataFormatada . '</p>'; //exibe o padrão brasileiro
        }
        echo '</div>';
        echo '<div class="corpo">';

        if ($linha['observacao'] == "") {
            echo '<h4 class="titulo">' . ($status == 0 ? $linha["titulo"] : "<del>" .$linha["titulo"]."</del>" ) . '</h4>';
        } else {
            echo '<p class="obs">' . $observacao . '</p>';
        }

        echo '</div>';
        echo $rodape;
        echo '</div>';
        echo '</content>';
        echo '</a>';
    }
} else {
    echo '<img src="images/empty.svg" height="100%">';
    echo '
    
  
  <div class="toast position-fixed bottom-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="images/icon.png" class="rounded me-2" alt="calendario" height="20px">
    <strong class="me-auto">Task Manager</strong>
    <small>Aviso</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
  Não existem Tarefas criadas.
  </div>
</div>
    ';
    echo "<script>
    var toastEl = document.querySelector('.toast');
    var toast = new bootstrap.Toast(toastEl);
    
    toast.show();
  </script>";
}
