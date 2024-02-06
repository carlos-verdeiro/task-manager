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

                    <form method="post" action="database/edicaoDatabase.php" enctype="multipart/form-data"><!--Formulário para criar tarefa-->
<!--------------------------------------------AQUIIIIIIIIIIIIIIIIIIIIIIIIIII---------------------------------------------------->
                        <div class="form-floating mb-3"><!--Título principal da tarefa-->
                            <input type="text" class="form-control" name="tituloEdicao" id="tituloEdicao" placeholder="Título" minlength="3" maxlength="40" required>
                            <label for="tituloEdicao">Título</label>
                        </div>

                        <div class="form-floating mb-3"><!--Observção da tarefa, é feita usando a tag textarea-->
                            <textarea type="text" class="form-control" name="observacaoEdicao" id="observacaoEdicao" placeholder="Observação" maxlength="500" ></textarea>
                            <label for="observacaoEdicao">Observação</label>
                        </div>

                        <div class="form-floating mb-3"><!--Input com a data que será realizada a tarefa-->

                            <input type="date" name="dataEdicao" class="form-control" id="dataEdicao" placeholder="Data" required>
                            <label for="dataEdicao">Data:</label>

                        </div>

                        <div class="form-floating mb-3"><!--Horário que será realizado a terefa-->
                            <input type="time" name="horaEdicao" id="horaEdicao" class="form-control" required >
                            <label for="horaEdicao" class="form-label">Hora:</label>
                        </div>

                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group"><!--Verificação do usuário que desativa o campo Horário-->
                            <input type="checkbox" class="btn-check" id="dInteiroEdicao" name="dInteiroEdicao" autocomplete="off" onchange="trocar()">
                            <label class="btn btn-outline-info" for="dInteiroEdicao">Dia inteiro</label>
                        </div>

                        <div class="mb-3">
                            <label for="anexoEdicao" class="form-label">Anexar imagem (Max: 2MB):</label>
                            <input class="form-control" type="file" id="anexoEdicao" name="anexoEdicao" accept="image/*">
                        </div>
                        <div class="text-danger form-control" role="alert" id="errorSpanFileEdicao">O arquivo é maior que 2MB</div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="rmAnexoEdicao">Remover anexo</button>
                    <button type="reset" class="btn btn-danger">Limpar campos</button>
                    <button type="submit" class="btn btn-success" id="submitModalEdicao">Criar tarefa</button>
                </div>
                </form>
            </div>
        </div>
        <script src="js\editar.js"></script>
    </div>