<?php
    require_once("includes/conectarBD.php");
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
    </table><br/>
    <?php
        //Recebe os dados digitados no formulário de cadastro de cidades via método POST
        $nomeCid = $_POST["cidNome"];
        $cepCid = $_POST["cidCep"];
        //O comando SQL que gravará os dados dos cidades na tabela cidades. Observem que estamos utilizando o comando str_to_date no campo $dtInclusao para que o usuário possa digitar a data no formato dd/mm/aaaa
        $sql = mysqli_query($conexao,"INSERT INTO cidades (cidNome, cidCep) VALUES ('$nomeCid', '$cepCid')") or die("Erro no comando SQL!!!<br/> <b><a href='formIncluirCidades.php'><b>Voltar Para a Inclusão de Cidades</a><br/>".mysqli_error($conexao));
        echo "<div align=center>Os dados do Cidade $nomeCid foram cadastrados com sucesso!!! Veja abaixo os dados cadastrados.<br/><br/>";
        echo "<table class='striped'>";
        echo "<tr>";
        echo "<th><div>Cidade</div></th>";
        echo "<th><div>CEP</div></th>";
        echo "</tr>";
        echo "<tr>";
          
        echo "<td>$nomeCid</font></td>";
        echo "<td>$cepCid</font></td>";
        echo "</tr>";
        echo "</table><br/>";
        echo "<div align='center'><font face='Arial' size='2'>";
        echo "<b><a href='formIncluirCidades.php'><b>Voltar para a Inclusão de Cidades</a><br/>";
        echo "<b><a href='formAlterarCidades.php'><b>Voltar para a Alteração de Cidades</a><br/>";
        echo "<b><a href='formExcluirCidades.php'><b>Voltar para a Exclusão de Cidades</a><br/>";
        echo "<b><a href='menuPesquisarCidades.php'><b>Voltar para a Pesquisa de Cidades</a><br/>";
        echo "<b><a href='menuGerCidades.php'><b>Voltar para o menu de Opções Gerenciamento de Cidades</a><br/>";
        echo "<b><a href='menuOpcoesGeral.php'><b>Voltar para o menu de Opções Gerais</a><br/>";
        echo "<b><a href='sair.php'><b>Sair do Sistema IPIL</a></font></div>";
    ?>
</body>
</html>
