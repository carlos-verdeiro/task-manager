<link rel="stylesheet" href="css/detalhesTarefas.css">

<?php

include_once("database/conexao.php");
if ($_GET) {
    $idAtual = $_GET['taskDetail'];


    $tarefa = $pdo->prepare("SELECT * FROM tarefas WHERE id = $idAtual");

    $tarefa->execute();

    $tarefa = $tarefa->fetchAll(PDO::FETCH_ASSOC);

    if ($tarefa) {
        foreach ($tarefa as $selecionada) {
            $titulo = $selecionada['titulo'];
            $observacao = $selecionada['observacao'];
            $horaPura = $selecionada['hora'];
            $hora = ($selecionada['intdia'] == 1) ? '<p class="hora">Dia inteiro</p>' : '<p class="hora">' . date('H:i', strtotime($selecionada['hora'])) . '</p>'; //Verifica e converte
            $dataPura = $selecionada['data'];
            $dataFormatada = DateTime::createFromFormat('Y-m-d', $selecionada["data"])->format('d/m/Y'); //formata para o padrão brasileiro a data
            $intDia = $selecionada['intdia'];

            if ($selecionada['idAnexo'] != null) {
                $tarefa = $pdo->prepare("SELECT path, nome FROM arquivos WHERE id = :idAnexo");
                $tarefa->bindParam(':idAnexo', $selecionada['idAnexo']);
                $tarefa->execute();

                $resultArquivo = $tarefa->fetch(PDO::FETCH_ASSOC);

                if ($resultArquivo) {
                    $arquivo = $resultArquivo['path'];
                    $nomeArquivo = $resultArquivo['nome'];
                } else {
                    echo "Arquivo não encontrado";
                }
            }


            if ($selecionada['observacao'] != "") {
                echo '<h1 id="tituloDetalhes">' . $selecionada['titulo'] . '</h1>';
            }
            $divHoraData = ($selecionada['observacao'] != "") ? "divHoraData" : "divHoraDataSozinho";
            echo '<div id="' . $divHoraData . '">
            <h4 id="horaDetalhes">' . $hora . '</h4>
            <h4 id="dataDetalhes">' . $dataFormatada . '</h4>
        </div>';

            if ($selecionada['observacao'] != "") {
                echo '<p id="observacaoDetalhes">' . $selecionada['observacao'] . '</p>';
            } else {
                echo '<h1 id="tituloDetalhesSozinho">' . $selecionada['titulo'] . '</h1>';
            }

            echo '
        <div id="divAnexoBotoes">
            ';
            if ($selecionada['idAnexo'] == null) {
                echo '<content id="contentBotoes">
                    <input type="button" value="Concluída" id="concluida" class=" btn btn-outline-success w-100 mb-2">
                    <button type="button" class="btn btn-outline-warning w-100 mb-2" data-bs-toggle="modal" data-bs-target="#edicao" id="buttonEdit" name="edit">Editar</button>
                    <input type="button" value="Excluir" id="excluir" class=" btn btn-outline-danger w-100 mb-2">
                </content>';
            } else {
                echo '<content id="contentAnexo">
                <a href="database/' . $arquivo . '" target="_blank">
                    <img src="database/' . $arquivo . '" alt="Anexo: ' . $nomeArquivo . '" id="anexoDetalhes" class="img-fluid">
                </a>
                </content>
                <content id="contentBotoes">
                    <input type="button" value="Concluída" id="concluida" class=" btn btn-outline-success w-100 mb-2" name="conclusion" >
                    <button type="button" class="btn btn-outline-warning w-100 mb-2" data-bs-toggle="modal" data-bs-target="#edicao" id="buttonEdit" name="edit">Editar</button>
                    <input type="button" value="Excluir" id="excluir" class=" btn btn-outline-danger w-100 mb-2" name="excluded" >
                </content>';
            }





            echo '</div>';
        }
    } else {
        echo '<img src="images/task.svg">';
    }
} else {
    echo '<img src="images/task.svg">';
}

echo '<script src="js/detalhesTarefas.js"></script>';
