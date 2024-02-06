const checkDInteiroEdicao = document.getElementById("dInteiroEdicao");
const horaEdicao = document.getElementById("horaEdicao");
const errorSpanEdicao = document.getElementById("errorSpanFileEdicao");
const inptAnexoEdicao = document.getElementById("anexoEdicao");
const submitModalEdicao =  document.getElementById("submitModalEdicao");
const rmAnexoEdicao = document.getElementById("rmAnexoEdicao");
var erroAnexoEdicao = 0;


function trocar() {
    if (checkDInteiroEdicao.checked) {
        horaEdicao.disabled = true;
        horaEdicao.value = "";
    } else {
        horaEdicao.removeAttribute("disabled");
    }
}


//----------VALIDAÇÃO------------

const fileEdicao = document.getElementById("anexoEdicao");

fileEdicao.addEventListener("change", function(e) {
    const fileSizeEdicao = e.target.files[0].size /1024 /1024;//Conversão para MB

/*target: referencia o evento
files[0]: o arquivo do input
size: o tamanho*/
if (fileSizeEdicao>2) {
    erroAnexoEdicao = 1;
    errorSpanEdicao.style.display ="contents";//torna visível
    console.log("Arquivo muito grande.");
    submitModalEdicao.disabled = true;
}else{
    erroAnexoEdicao = 0;
    errorSpanEdicao.style.display ="none";//torna invisível
    console.log("Arquivo tamanho bom.");
    submitModalEdicao.disabled = false;
}
})

//-------------LIMPAR ANEXO------------

rmAnexoEdicao.addEventListener("click", function() {
    
    inptAnexoEdicao.value="";
    console.log("Arquivo resetado");

})