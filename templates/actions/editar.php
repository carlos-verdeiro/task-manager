<link rel="stylesheet" href="css/editar.css">
<!-- Modal Criador de tarefa -->
<div class="modal fade" id="edicao" tabindex="-1" aria-labelledby="edicao" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="h1TitleEdicao">Edição de tarefa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="post" action="database/edicaoDatabase.php?id=<?php echo $idAtual;?>" enctype="multipart/form-data"><!--Formulário para criar tarefa-->
                        <div class="form-floating mb-3"><!--Título principal da tarefa-->
                            <input value="<?php echo $titulo;?>" type="text" class="form-control" name="tituloEdicao" id="tituloEdicao" placeholder="Título" minlength="3" maxlength="40" required>
                            <label for="tituloEdicao">Título</label>
                        </div>

                        <div class="form-floating mb-3"><!--Observção da tarefa, é feita usando a tag textarea-->
                            <textarea type="text" class="form-control" name="observacaoEdicao" id="observacaoEdicao" placeholder="Observação" maxlength="500" ><?php echo $observacao;?></textarea>
                            <label for="observacaoEdicao">Observação</label>
                        </div>
                        <div class="form-floating mb-3"><!--Input com a data que será realizada a tarefa-->
                            <input value="<?php echo $dataPura;?>" type="date" name="dataEdicao" class="form-control" id="dataEdicao" placeholder="Data" required>
                            <label for="dataEdicao">Data:</label>

                        </div>

                        <div class="form-floating mb-3"><!--Horário que será realizado a terefa-->
                            <input <?php ;if ($intDia == 1) {
                                echo 'disabled value=""';
                            }else{
                                echo'value="'.$horaPura.'"';
                            }
                            ?> type="time" name="horaEdicao" id="horaEdicao" class="form-control" required >
                            <label for="horaEdicao" class="form-label">Hora:</label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group"><!--Verificação do usuário que desativa o campo Horário-->
                            <input <?php if ($intDia == 1) {
                                echo "checked";
                            }
                            ?> type="checkbox" class="btn-check" id="dInteiroEdicao" name="dInteiroEdicao" autocomplete="off" onchange="trocarEdicao()">
                            <label class="btn btn-outline-info" for="dInteiroEdicao">Dia inteiro</label>
                        </div>

                        <div class="mb-3">
                            <label for="anexoEdicao" class="form-label">Anexar outra imagem (Max: 2MB):</label>
                            <input value="oioioi" class="form-control" type="file" id="anexoEdicao" name="anexoEdicao" accept="image/*">
                        </div>
                        <div class="text-danger form-control" role="alert" id="errorSpanFileEdicao">O arquivo é maior que 2MB</div>


                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" id="rmAnexoEdicao">Remover anexo</button>
                            <button type="reset" class="btn btn-danger">Resetar</button>
                            <button type="submit" class="btn btn-success" id="submitModalEdicao">Atualizar tarefa</button>
                        </div>
                        <input type="hidden" name="idAnexo" value="<?php echo $idAnexo;?>">
                    </form>
                </div>
            </div>
        </div>
        <script src="js\editar.js"></script>
    </div>