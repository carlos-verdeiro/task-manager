<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/criarTarefa.css">
    <link rel="stylesheet" href="css/exibirTarefas.css">
    <link rel="shortcut icon" href="images/calendario.ico" type="image/x-icon">
    <title>Gerenciador de tarefas</title>
</head>

<body>
    <header class="container-fluid"><!--CABEÇALHO-->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novaTarefa">
            Criar nova tarefa
        </button>
    </header>

    <main class="container-fluid row mx-auto text-center"> <!--PRINCIPAL-->
        <section id="detalhes" class="container-fluid col">
            ...
        </section>

        <section id="tarefas" class="container-fluid col p-3 overflow-auto">
            <div class="blocoTarefa container-sm shadow-lg border border-black"><!--MODELO 1-->
                <div class="header">
                    <h4 class="titulo">Títuloo</h4>
                    <p class="hora">18:48</p>
                    <p class="data">29/01/2023</p>
                </div>
                <div class="corpo">
                    <p class="obs">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, sint deserunt error enim itaque eos, soluta beatae laboriosam quas reiciendis, magnam voluptatibus quia magni sequi. Aliquam qui ipsa ullam consequuntur. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque accusantium dolor pariatur sapiente natus minima culpa repellat suscipit fuga nisi ipsam similique enim blanditiis eum labore modi vero, officiis sit.</p>
                </div>
                <div class="rodapeAnexo text-success">
                    <svg viewBox="0 0 384 512" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M365.3 93.38l-74.63-74.64C278.6 6.743 262.3 0 245.4 0L64-.0001c-35.35 0-64 28.65-64 64l.0065 384c0 35.35 28.65 64 64 64H320c35.2 0 64-28.8 64-64V138.6C384 121.7 377.3 105.4 365.3 93.38zM320 464H64.02c-8.836 0-15.1-7.163-16-15.1L48 64.13c-.0004-8.837 7.163-16 16-16h160L224 128c0 17.67 14.33 32 32 32h79.1v288C336 456.8 328.8 464 320 464z" />
                    </svg>
                    <p>Com anexo</p>
                </div>
            </div>
            <div class="blocoTarefa container-sm shadow-lg border border-black"><!--MODELO 2-->
                <div class="header">
                    <p class="hora">18:48:34</p>
                    <p class="data">29/01/2023</p>
                </div>
                <div class="corpo">
                    <h4 class="titulo">Títuloo</h4>
                </div>
                <div class="rodapeAnexo text-danger">
                    <svg viewBox="0 0 384 512" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M365.3 93.38l-74.63-74.64C278.6 6.742 262.3 0 245.4 0H64C28.65 0 0 28.65 0 64l.0065 384c0 35.34 28.65 64 64 64H320c35.2 0 64-28.8 64-64V138.6C384 121.7 377.3 105.4 365.3 93.38zM336 448c0 8.836-7.164 16-16 16H64.02c-8.838 0-16-7.164-16-16L48 64.13c0-8.836 7.164-16 16-16h160L224 128c0 17.67 14.33 32 32 32h79.1V448zM229.1 233.3L192 280.9L154.9 233.3C146.8 222.8 131.8 220.9 121.3 229.1C110.8 237.2 108.9 252.3 117.1 262.8L161.6 320l-44.53 57.25c-8.156 10.47-6.25 25.56 4.188 33.69C125.7 414.3 130.8 416 135.1 416c7.156 0 14.25-3.188 18.97-9.25L192 359.1l37.06 47.65C233.8 412.8 240.9 416 248 416c5.125 0 10.31-1.656 14.72-5.062c10.44-8.125 12.34-23.22 4.188-33.69L222.4 320l44.53-57.25c8.156-10.47 6.25-25.56-4.188-33.69C252.2 220.9 237.2 222.8 229.1 233.3z" />
                    </svg>
                    <p>Sem anexo</p>
                </div>
            </div>

        </section>
    </main>

    <footer class="container-fluid"><!--RODAPÉ-->
        ...
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
    <?php
    include_once("templates/criarTarefaModal.php");
    ?>

</body>

</html>