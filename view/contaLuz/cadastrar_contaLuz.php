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
    <body>
        <table class="borderLine" width="70%" align="center">
            <tr>
                <td width="82%" align="left"> 
                    <span class="style4">Cadastro de Navio</span>
                </td>
                <td>
                    <input type="button" value=" Voltar " class="inputbotao" onclick="voltar()"/>
                </td>
            </tr>
        </table>
        <br>

        <form action="../NavioControlador?acao=${param.acao == 2 ? " id="formulario" name="formulario" method="post" target="pop">

            <input type="hidden" name="id" id="id" value="0"/>
            <table width="70%" align="center" class="borderLine" >
                <tr>
                    <td width="100%"  align="center" class="tabela" >Dados principais</td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" border="0">
                            <tr>
                                <td width="17%" class="TextoCampos">*Descri&ccedil;&atilde;o:</td>
                                <td width="83%" class="celZebra2">
                                    <input name="descricao" type="text" class="inputtexto" id="descricao" maxlength="30" size="40">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <c:if test="${param.acao == 2}">
                    <tr>
                        <td colspan="2" class="tabela" align="center">Auditoria</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table width="100%" align="center" class="borderLine">
                                <tr class="celZebra2">
                                    <td class="TextoCampos" width="15%"> Incluso:</td>

                                    <td width="35%"> em: ${cadnavioredex.criadoEm} <br>
                                        por: ${cadnavioredex.criadoPor.nome}
                                    </td>

                                    <td class="TextoCampos" width="15%"> Alterado:</td>
                                    <td width="35%"> em: ${cadnavioredex.atualizadoEm} <br>
                                        por: ${cadnavioredex.atualizadoPor.nome}
                                    </td>
                                </tr>
                            </table>                        </td>
                    </tr>
                </c:if>
                <tr>
                    <c:if test="${param.nivel >= param.bloq}">
                        <td class="celZebra2" ><div align="center">
                                <input type="button" value="  SALVAR  " id="botSalvar" class="inputbotao" onclick="validaSession(function(){salvar()}, true)"/>
                            </div></td>
                        </c:if>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php