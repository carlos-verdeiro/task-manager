const checkDInteiro = document.getElementById("dInteiro");
const hora = document.getElementById("hora");
const errorSpan = document.getElementById("errorSpanFile");
const inptAnexo = document.getElementById("anexo");
const submitModal =  document.getElementById("submitModal");
const rmAnexo = document.getElementById("rmAnexo");
var erroAnexo = 0;


function trocar() {
    if (checkDInteiro.checked) {
        hora.disabled="true";
        hora.value="";
    } else {
        hora.removeAttribute("disabled");
    }
}



//----------VALIDAÇÃO------------

const file = document.getElementById("anexo");

file.addEventListener("change", function(e) {
    const fileSize = e.target.files[0].size /1024 /1024;//Conversão para MB

/*target: referencia o evento
files[0]: o arquivo do input
size: o tamanho*/
if (fileSize>2) {
    erroAnexo = 1;
    errorSpan.style.display ="contents";//torna visível
    console.log("Arquivo muito grande.");
    submitModal.disabled = true;
}else{
    erroAnexo = 0;
    errorSpan.style.display ="none";//torna invisível
    console.log("Arquivo tamanho bom.");
    submitModal.disabled = false;
}
})

//-------------LIMPAR ANEXO------------

rmAnexo.addEventListener("click", function() {
    
    inptAnexo.value="";
    console.log("Arquivo resetado");

})