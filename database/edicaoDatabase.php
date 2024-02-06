<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="shortcut icon" href="../images/icon.ico" type="image/x-icon">
<title>Edição</title>
<?php

include_once("conexao.php");

if ($_POST) {
    $titulo = $_POST["tituloEdicao"];
    $observacao = $_POST["observacaoEdicao"];
    $data = $_POST["dataEdicao"];
    $res = $pdo->prepare("UPDATE tarefas SET titulo = :titulo, observacao = :observacao, data = :data, hora = :hora, intdia = :intdia WHERE id = :id");

    $res->bindValue(":titulo", $titulo);
    $res->bindValue(":observacao", $observacao);
    $res->bindValue(":data", $data);
    $res->bindValue(":id", $_GET["id"]);
    if (isset($_POST["dInteiroEdicao"])) {
        $dInt = 1;
    } else {
        $dInt = 0;
    }
    $res->bindValue(":hora", ($dInt == "1") ? null : $_POST["horaEdicao"]);
    $res->bindValue(":intdia", $dInt);
    $res->execute();

    if ($res->rowCount() > 0) {
        echo '<div class="alert alert-success" role="alert">
    Cadastro realizado com sucesso!
  </div>';
    }
}




if ($_FILES["anexoEdicao"]["error"] != 4)/*Verificando se o upload está vazio*/ {
    $idAnexo = $_POST["idAnexo"];

    $tarefa = $pdo->prepare("SELECT path FROM arquivos WHERE id = :id");

    $tarefa->bindParam(':id', $idAnexo);

    $tarefa->execute();

    $tarefa = $tarefa->fetchAll(PDO::FETCH_ASSOC);

    if ($tarefa) {
        foreach ($tarefa as $selecionada) {
            $path = $selecionada['path'];
        }
    }

    if (unlink($path)) {
        echo "Arquivo excluído com sucesso.";

        $anexo = $_FILES["anexoEdicao"];

        if ($anexo['size'] > 2097152)
            die('Arquivo grande! MAX: 2MB');

        if ($anexo['error'])
            die('Falha ao Enviar arquivo!');

        $pasta = "archive/";
        $nomeArquivo = $anexo['name'];
        $novoNomeArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
        $path = $pasta . $novoNomeArquivo . '.' . $extensao;

        $uploadResposta = move_uploaded_file($anexo['tmp_name'], $path);

        if (!$uploadResposta)
            die('Arquivo não enviado com sucesso!');

        $arq = $pdo->prepare("UPDATE arquivos SET nome = :nome, path = :path WHERE id = :idAnexo");
        $arq->bindValue(":nome", $nomeArquivo);
        $arq->bindValue(":path", $path);
        $arq->bindValue(":idAnexo", $idAnexo);
        $arq->execute();

        if ($arq->rowCount() == 0)
            die("Arquivo não cadastrado com sucesso!");
        echo " Editado com sucesso";
        header('location: ../index.php?taskDetail=' . $_GET["id"] . '&insert=true');
    } else {
        echo "Erro ao excluir o arquivo.";
    }


    
}
header('location: ../index.php?taskDetail=' . $_GET["id"] . '&insert=true');
