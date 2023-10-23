<?php
    require_once("includes/conectarBD.php");
    //Verificará se a nossa sessão está ativa
    require_once("verificar.php");
    //A função que exibirá a data completa, dia e ano corrente
    include 'includes/exibirDia.fcn';
?>
<!DOCTYPE html>
<html lang="pt-BR">
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
    <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
        <td height="60"><div align="center"><font face="Arial" size="4"><b>Alterar Dados de Cidades </b></font></div></td>
        </tr>
    </table>
    <?php
        if (!isset($_POST["cidID"])&& !isset($_POST["enviar"]))
        {
    ?>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <p>Código do Cidade: <input type="text" name="cidID" size="10">
            <input type="submit" value="Alterar Dados do Cidade" name="alterar"></p>
            <div align="left"><font face="Arial" size="2"><b>Não Lembra o Código?<a href='pesqTodosCidades.php'> Clique Aqui </a><br/></font></div>
        </form>
        <?php
        }
        //Buscará os dados do Cidade
        else if(!isset($_POST["enviar"]))
        {
            $cidID = $_POST["cidID"];
            $consulta = mysqli_query($conexao, "SELECT * FROM cidades WHERE cidID = '$cidID'");
            //obtém a resposta do Select executado acima
            $linha = mysqli_num_rows($consulta);
            if ($linha == 0) //verifica quantas linhas teve a query executada e se for igual a zero, o cidade não foi encontrado
        {
            echo "Cidade não encontrado $cidID";
        }
        else
        {
            echo "<div><font face=Arial size=4><b>Cidade Encontrado:</b></font></div>";
            //seta a linha de campoCidade da tabela cidades e depois, coloca cada campo em uma variável.
            $campoCidade = mysqli_fetch_row($consulta);
            $cidNome = $campoCidade[1];
            $cliCep=$campoCidade[2];
        ?>
            <form name="formCidades" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
                <tr>
                    <td colspan="15"><div align="center"><font face="Arial" size="2"><b><font color="#FFFFFF">Cidades Cadastrados</font></b></font></div></td>
                </tr>
                <tr>
                    <td width="5%"><div align="center"><b><font face="Arial" size="2">Código da Cidade</font></b></div></td>
                    <td width="5%"><div align="center"><b><font face="Arial" size="2">Nome</font></b></div></td>
                    <td width="5%"><div align="center"><b><font face="Arial" size="2">CEP</font></b></div></td>
                </tr>
                <tr>
                    <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $cidID;?></font></td>
                    <td width="20%" height="25"><b><font face="Arial" size="2"><input type="text" name="cidNome" size="42" value="<?php echo $cidNome;?>" required></font></td>
                    <td width="20%" height="25"><b><font face="Arial" size="2"><input type="number" name="cidCep" size="42" value="<?php echo $cidCep;?>" required></font></td>
                </tr>
            </table>
            <input type ="hidden" name="cidID" value="<?php echo $cidID;?>">
            <input type ="hidden" name="enviar" value="S">
            <input type ="submit" value="Alterar Dados do Cidade" name="alterar"></p>
            </form>
            <?php
                mysqli_close($conexao);
        }
        }
        else // alterar cidade
        {
            $cidID=$_POST["cidID"];
            $cidNome=$_POST["cidNome"];
            $cidCep=$_POST["cidCep"];
            $altera = mysqli_query($conexao, "UPDATE cidades SET cidNome='$cidNome', cidCep='$cidCep'");
            //O comando mysqli_affected_rows( ) retornará a quantidade de linhas alteradas com o comando UPDATE
            if (mysqli_affected_rows($conexao) > 0)
            {
                echo "<p align='center'>Dados do Cidade $cidNome alterados com sucesso!!! Verifique abaixo a alteração feita.</p>";
                echo "<table width='100%' border='0' cellspacing='1' cellpadding='0' align='center'>";
                    echo "<tr>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td width='10%'><div align='center'><b><font face='Arial'csize='2'>Código da Cidade</font></b></div></td>";
                        echo "<td width='20%'><div align='center'><b><font face='Arial' size='2'>Nome</font></b></div></td>";
                        echo "<td width='20%'><div align='center'><b><font face='Arial' size='2'>Cep</font></b></div></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td width='10%' height='25'><b><font face='Arial' size='2'>$cidID</font></td>";
                        echo "<td width='20%' height='25'><b><font face='Arial' size='2'>$cidNome</font></td>";
                        echo "<td width='20%' height='25'><b><font face='Arial' size='2'>$cidCep</font></td>";
                    echo "</tr>";
                echo "</table>";
            }
            else
            {
                $erro=mysqli_error($conexao );
                echo "<p align='center'>Erro:$erro</p>";
            }
        mysqli_close($conexao);
    }
?>
    <p><div align="center"><font face="Arial" size="2"><b><a href='formIncluirCidades.php'><b>Voltar para a Inclusão de Cidades</a><br/>
    <b><a href='formAlterarCidades.php'><b>Voltar para a Alteração de Cidades</a><br/>
    <b><a href='formExcluirCidades.php'><b>Voltar para a Exclusão de Cidades</a><br/>
    <b><a href='menuPesquisarCidades.php'><b>Voltar para a Pesquisa de Cidades</a><br/>
    <b><a href='menuGerCidades.php'><b>Voltar para o menu de Opções Gerenciamento de Cidades</a><br/>
    <b><a href='menuOpcoesGeral.php'><b>Voltar para o menu de Opções Gerais</a><br/>
    <b><a href='sair.php'><b>Sair do Sistema Cidades</a></font></div>
</body>
</html>
