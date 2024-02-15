<link rel="shortcut icon" href="../../images/icon.ico" type="image/x-icon">
<title>Excluir</title>

<?php

if (isset($_GET['taskDetail'])) {

    include_once "../../database/conexao.php";

    $idTarefa = $_GET['taskDetail'];

    $exclusao = $pdo->prepare("SELECT idAnexo FROM tarefas WHERE id = :idTarefa ");

    $exclusao->bindParam(':idTarefa', $idTarefa);

    $exclusao->execute();

    if ($exclusao->rowCount() > 0) {
        $resultado = $exclusao->fetch(PDO::FETCH_ASSOC);
        $arquivo = $resultado['idAnexo'];

        $exclusao = $pdo->prepare("DELETE FROM tarefas WHERE id = :idTarefa ");
        $exclusao->bindParam(':idTarefa', $idTarefa);
        $exclusao->execute();

        $select = $pdo->prepare("SELECT path FROM arquivos WHERE id = :idAnexo ");
        $select->bindParam(':idAnexo', $arquivo);
        $select->execute();
        $resultado = $select->fetch(PDO::FETCH_ASSOC);

        if ($resultado['path']) {
            $path = '../../database/' . $resultado['path'];

            $exclusao = $pdo->prepare("DELETE FROM arquivos WHERE id = :idAnexo ");
            $exclusao->bindParam(':idAnexo', $arquivo);
            $exclusao->execute();

            if (unlink($path)) {
                echo "Arquivo excluído com sucesso.";
            } else {
                echo "Erro ao excluir o arquivo.";
            }
        }

        echo '<div class="alert alert-success" role="alert">
        Realizado com sucesso!
        </div>';
    } else {
        echo '<div class="alert alert-warning" role="alert">
            Ops!
            </div>';
    }
}

header('location: ../../index.php?insert=true');