var checkDInteiro = document.getElementById("dInteiro");
var hora = document.getElementById("hora");

function trocar() {
    if (checkDInteiro.checked) {
        hora.disabled="true";
    } else {
        hora.removeAttribute("disabled");
    }
}