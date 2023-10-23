<?php
    //Verificará se a nossa sessão está ativa
    require_once("verificar.php");
    //A função que exibirá a data completa, dia e ano corrente
    include 'includes/exibirDia.fcn';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Cidades </title>
</head>
<body>
    <img src="imagens/logoCidade.jpeg" width="150" height="100"><b>
    <?php
        //Exibirá o nome do usuário que está logado e a data corrente
        echo "O usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento !!!! Hoje é ".$data;
    ?></b><br/><br/>
    <table width="55%" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td>
                <table width="130%" cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td width="130%"><font color="#3300FF"><b>Gerenciamento de Cidades</font></td>
                    </tr>
                </table>
            </td>
        </tr>
            <tr>
                <td nowrap>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <ol type="I" start="1"><br/>
                                <li><a href="formIncluirCidades.php"><font color="#3300FF"><b>Incluir</font></a>
                                <li><a href="formAlterarCidades.php"><font color="#3300FF"><b>Alterar</font></a>
                                <li><a href="formExcluirCidades.php"><font color="#3300FF"><b>Excluir</font></a>
                                <li><a href="menuPesquisarCidades.php"><font color="#3300FF"><b>Pesquisar</font></a>
                            </ol>
                        </tr>
                    </table>
                </td>
            </tr>
    </table><br/>
    <div align="center"><font face="Arial" size="2">
        <a href='menuOpcoesGeral.php'><b>Voltar para o menu de Opções Gerais</a><br/>
        <a href='sair.php'><b>Sair do Sistema Cidades</a></font>
    </div>
</body>
</html>
