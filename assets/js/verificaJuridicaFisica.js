
var divCPF = document.getElementById("divCPF");
var divCNPJ = document.getElementById("divCNPJ");
var opcF = document.getElementById("iFisica");
var opcJ = document.getElementById("iJuridica");

divCNPJ.style.display = 'none';

opcJ.onclick = function(){

    divCPF.style.display = 'none';
    divCNPJ.style.display = 'block';
}

opcF.onclick = function(){
    divCPF.style.display = 'block';
    divCNPJ.style.display = 'none';
}


