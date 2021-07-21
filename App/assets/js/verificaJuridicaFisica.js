var divCPF = document.getElementById("divCPF");
var divCNPJ = document.getElementById("divCNPJ");
var ocultaPessoaFisica = document.getElementById("iFisica");
var ocultaPessoaJuridica = document.getElementById("iJuridica");

divCNPJ.style.display = 'none';

ocultaPessoaJuridica.onclick = function(){

    divCPF.style.display = 'none';
    divCNPJ.style.display = 'block';
}

ocultaPessoaFisica.onclick = function(){
    divCPF.style.display = 'block';
    divCNPJ.style.display = 'none';
}


