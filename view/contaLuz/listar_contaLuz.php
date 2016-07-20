<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            body {
                margin:0;
            }
            .style3 {color: #333333}
            .style4 {
                font-size: 14px;
                font-weight: bold;
            }
        </style>
    </head>
    <body onload="desativarBotoes(), setDefault()" >
                <table class="borderLine" width="70%" align="center">
            <tr>
                <td width="82%" align="left"> <span class="style4">Consulta de Navio</span></td>
                <td width="18%">
                    <c:if test="${param.nivel >= 3}">
                        <input name="cadastrar" type="button" class="inputbotao"  onclick="validaSession(function(){abrirCadastro();}, true);" value="Novo Cadastro"/>
                    </c:if> 
                </td>
            </tr>
        </table>
        <br>
                <form action="../NavioControlador?acao=listar" id="formulario" name="formulario" method="post">
                            <table class="borderLine" width="70%" align="center">
            <tr>
                    <td width="110" class="CelulaZebra1">
                        <select name="campoConsulta" class="inputtexto"  id="campoConsulta">
                            <option value="descricao">Descrição</option>
                        </select>
                    </td>
                    
                    <td width="168" class="CelulaZebra1" height="20">
                        <select name="operadorConsulta" class="inputtexto" id="operadorConsulta" >
                            <option value="1" selected>Todas as partes com</option>
                            <option value="2">Apenas com in&iacute;cio</option>
                            <option value="3">Apenas com o fim</option>
                            <option value="4">Igual &agrave; palavra/frase</option>
                        </select>
                    </td>
                    
                    <td class="CelulaZebra1">
                        <input name="valorConsulta" type="text" class="inputtexto"  id="valorConsulta" size="25">
                    <label></label></td>
                    <td width="119" class="CelulaZebra1"><input name="pesquisar" type="button" class="inputbotao" value="  Pesquisar  " onclick="javascript: validaSession(function(){pesquisa();}, true)"  /></td>
                    
                    <td width="134" class="CelulaZebra1">  
                        <select   name="limiteResultados" class="inputtexto"  >
                            <option value="10">10 Resultados</option>
                            <option value="20">20 Resultados</option>
                            <option value="30">30 Resultados</option>
                            <option value="40">40 Resultados</option>
                            <option value="50">50 Resultados</option>
                    </select>
                    </td>
            </tr>
                         </table>
                </form>
   
        <table width="70%" border="0" cellpadding="2" cellspacing="1" class="borderLine" align="center">
            <tr>
                <td width="97%" class="tabela" align="left">Descrição</td>
                <td width="3%" class="tabela" align="left"></td>
            </tr>
            <c:forEach var="n" varStatus="status" items="${listaListNavio}">
                <tr class="${(status.count % 2 == 0 ? 'CelulaZebra1' : 'CelulaZebra2')}" >                    
                    
                    <td>
                        <a href="javascript: validaSession(function(){window.location='../NavioControlador?acao=iniciarEditar&id=${n.id}';}, true);" class="linkEditar">
                            ${n.descricao}
                        </a>
                    </td>
                    <td align="center">
                        <c:if test="${param.nivel >= 4}">
                    <a href="javascript: validaSession(function(){excluir( '${n.id}','${n.descricao}');}, true);">
                        <img class="imagemLink" src="../img/lixo.gif"/>
                    </a>
                        </c:if>
                    </td>
                </tr>
            </c:forEach>
        </table>
        <br>
        <table class="borderLine" width="70%" align="center" >
            <tr class="CelulaZebra1">
                <td width="47%" align="center">Total de Ocorr&ecirc;ncias: 
                <c:out value="${param.qtdResultados}"/></td>
                <td width="23%" align="center">P&aacute;ginas: 
                <c:out value="${param.paginaAtual} / ${param.paginas}"/></td>
                
                <form id="formularioAnt" name="formularioAnt" action="../NavioControlador?acao=listar" method="post">
                    <td width="15%" align="center">
                        <input type="hidden" name="limiteResultados" value="<c:out value='${param.limiteResultados}'/>"/>
                        <input type="hidden" name="operadorConsulta" value="<c:out value='${param.operadorConsulta}'/>"/>
                        <input type="hidden" name="campoConsulta" value="<c:out value='${param.campoConsulta}'/>"/>
                        <input type="hidden" name="valorConsulta" value="<c:out value='${param.valorConsulta}'/>"/>
                        <input type="hidden" name="paginaAtual" value="<c:out value='${param.paginaAtual - 1}'/>"/>
                        <input name="botaoAnt" type="button" class="inputbotao" id="botaoAnt" onclick="javascript: validaSession(function(){document.formularioAnt.submit();}, true);" value="ANTERIOR"/>
                    </td>
                </form>
                <form id="formularioProx" name="formularioProx"  action="../NavioControlador?acao=listar" method="post">
                    <td width="15%" align="center">
                        <input type="hidden" name="limiteResultados" value="<c:out value='${param.limiteResultados}'/>">
                        <input type="hidden" name="operadorConsulta" value="<c:out value='${param.operadorConsulta}'/>">
                        <input type="hidden" name="campoConsulta" value="<c:out value='${param.campoConsulta}'/>">
                        <input type="hidden" name="valorConsulta" value="<c:out value='${param.valorConsulta}'/>">
                        <input type="hidden" name="paginaAtual" value="<c:out value='${param.paginaAtual + 1}'/>">
                        <input name="botaoProx" type="button" class="inputbotao" id="botaoProx" onclick="javascript: validaSession(function(){document.formularioProx.submit();}, true);" value="PROXIMA">
                    </td>
                </form>
            </tr>
        </table>
        </form>
    </body>
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

