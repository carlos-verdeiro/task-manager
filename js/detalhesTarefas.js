document.getElementById('excluir').addEventListener('click', function() {
    urlParams =new URLSearchParams(window.location.search)
    window.location.href = `templates/actions/excluir.php?taskDetail=${urlParams.get('taskDetail')}`;
});

  document.getElementById('concluida').addEventListener('click', function() {
    urlParams =new URLSearchParams(window.location.search);
    window.location.href = `templates/actions/concluir.php?taskDetail=${urlParams.get('taskDetail')}`;
});
