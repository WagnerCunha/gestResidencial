/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var janela;
function abrirLocaliza(url, target){
    janela = window.open (url, target, 'left=0, top=0, height=650, width=800, scrollbars=yes,resizable=yes');
    janela.window.resizeTo(screen.width / 1.5, screen.height - 100);
    janela.focus();
}

function retornaPai(id, cliente, fone, idCidade, cidade, uf) {

    var pai = window.opener.document;

    var campos = '${param.campos}';
    var idCampoId = campos.split('!!')[0];
    var idCampoCliente = campos.split('!!')[1];

    if (idCampoId.trim() != "") {
        pai.getElementById(idCampoId).value = id;
        pai.getElementById(idCampoCliente).value = cliente;
    } else {
        if (pai.getElementById("cliente") != null)
            pai.getElementById("cliente").value = cliente;
        if (pai.getElementById("idCliente") != null)
            pai.getElementById("idCliente").value = id;
        if (pai.getElementById("foneCli") != null)
            pai.getElementById("foneCli").value = fone;
        if (pai.getElementById("idCidade") != null)
            pai.getElementById("idCidade").value = idCidade;
        if (pai.getElementById("cidade") != null)
            pai.getElementById("cidade").value = cidade;
        if (pai.getElementById("uf") != null)
            pai.getElementById("uf").value = uf;

    }


    window.close();

}
