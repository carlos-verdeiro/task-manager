<!-- Modal Criador de tarefa -->
<div class="modal fade" id="novaTarefa" tabindex="-1" aria-labelledby="novaTarefa" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Criar tarefa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="get"><!--Formulário para criar tarefa-->

                        <div class="form-floating mb-3"><!--Título principal da tarefa-->
                            <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título" minlength="3" maxlength="40" required>
                            <label for="titulo">Título</label>
                        </div>

                        <div class="form-floating mb-3"><!--Observção da tarefa, é feita usando a tag textarea-->
                            <textarea type="text" class="form-control" name="observacao" id="observacao" placeholder="Observação" maxlength="500"></textarea>
                            <label for="observacao">Observação</label>
                        </div>

                        <div class="form-floating mb-3"><!--Input com a data que será realizada a tarefa-->

                            <input type="date" name="data" class="form-control" id="data" placeholder="Data" required>
                            <label for="titulo">Data:</label>

                        </div>

                        <div class="form-floating mb-3"><!--Horário que será realizado a terefa-->
                            <input type="time" name="hora" id="hora" class="form-control" required >
                            <label for="hora" class="form-label">Hora:</label>
                        </div>

                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group"><!--Verificação do usuário que desativa o campo Horário-->
                            <input type="checkbox" class="btn-check" id="dInteiro" name="dInteiro" autocomplete="off" onchange="trocar()">
                            <label class="btn btn-outline-warning" for="dInteiro">Dia inteiro</label>
                        </div>

                        <div class="mb-3">
                            <label for="anexo" class="form-label">Anexo:</label>
                            <input class="form-control" type="file" id="anexo" name="anexo">
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Limpar campos</button>
                    <button type="submit" class="btn btn-primary">Criar tarefa</button>
                </div>
                </form>
            </div>
        </div>
        <script src="js\criarTarefa.js"></script>
    </div>