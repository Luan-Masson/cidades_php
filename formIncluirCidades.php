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
    <title>Bicicletaria Imaginária </title>
</head>
<body>
    <img src="imagens/logoCidade.jpeg" width="150" height="100"><b>
    <?php
        //Exibirá o nome do usuário que está logado e a data corrente
        echo "O usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento !!!! Hoje é ".$data;
    ?></b><br/><br/>
    <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td height="60"><div align="center"><font face="Arial" size="4"><b>Cadastro de Cidades </b></font></div></td>
        </tr>
    </table>    
    <form name="formCidades" id="formCidades" method="POST" action="incluirCidades.php">
    <table width="35%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="24%" height="25">Nome:</td>
            <td height="25" width="76%"><input type="text" name="cidNome" required></td>
        </tr>
        <tr>
            <td width="24%" height="25">Cep:</td>
            <td height="25" width="76%"><input name="cidCep" type="text" max="99999999" maxlength="8" id="CEP" required/></td>
        </tr>
    <tr>
    <td height="25" colspan="2">
        <div>
                <input type="submit" name="cadCidade" value="Cadastrar Cidade">
        </div></td>
    </tr>
    </table>
    </form>
</body>
    <div align="center">
        <a href='menuGerCidades.php'>Voltar para o menu de Opções Gerenciamento de Cidades</a><br/>
        <a href='menuOpcoesGeral.php'>Voltar para o menu de Opções Gerais</a><br/>
        <a href="menuGerUsuAdm.php">Voltar para o menu de Gerenciamento de Usuários Administrativos</a><br/>
        <a href="menuGerProdutos.php">Voltar para o menu de Gerenciamento de Produtos</a><br/>
        <a href="menuGerVendas.php">Voltar para o menu de Gerenciamento de Vendas</a><br/>
        <a href='sair.php'>Sair do Sistema IPIL</a>
    </div>
</body>
</html>
