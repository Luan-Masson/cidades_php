<?php
    require_once("includes/conectarBD.php");
     //Vai verificar se a nossa sessão esta ativa
     require_once("verificar.php");
          //Função que vai exibir a data completa, dia e ano corrente
     include 'includes/exibirDia.fcn';
?>
<html>
<body>
    <img src="imagens/logoCidade.jpeg" width="150" height="100"><b>
    <?php
        //Exibirá o nome do usuário que está logado e a data corrente
        echo "O usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento !!!! Hoje é ".$data;
    ?></b><br/><br/>
    <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td height="60"><div align="center"><font face="Arial" size="4"><b>Gerenciamento de Cidades </b></font></div></td>
    </tr>
    </table><br>
<?php
     //A formatação do campo cidDtInclusao, para retornar a data no formato dd/MM/yyyy
     $sqlCidade = mysqli_query($conexao,"SELECT * FROM cidades".
     //Ordena pelo número do código do cidente
     " ORDER BY cidID") or die ("Não foi possível realizar a consulta.");
?>
<?php
     //Se encontrar algum registro na tabela
     if(mysqli_num_rows($sqlCidade) > 0)
     {
?>
        <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
        <tr>
            <td colspan="15"><div align="center"><font face="Arial" size="2"><b>Cidades Cadastrados</font></b></font></div></td>
        <tr>
        <td colspan="15"><div align="center"><font face="Arial" size="2"><b>Utilize as Teclas Ctlr+F para Encontrar o Código ou Nome do Cidade</font></b></font></div></td>
        </tr>
        <tr>
            <td width="5%"><div align="center"><b><font face="Arial" size="2">Código do Cidade</font></b></div></td>
            <td width="10%"><div align="center"><b><font face="Arial" size="2">Nome do Cidade</font></b></div></td>
            <td width="5%"><div align="center"><b><font face="Arial" size="2">CE</font></b></div></td>
        </tr>
<?php
        //Lista os dados da tabela enquanto exisitir
        while($arrayCidade = mysqli_fetch_array($sqlCidade))
        {
?>
        <tr>
            <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $arrayCidade['cidID'];?></font></td>
            <td width="20%" height="25"><b><font face="Arial" size="2"><?php echo $arrayCidade['cidNome'];?></font></td>
            <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $arrayCidade['cidCep'];?></font></td>
        </tr>
<?php
        //Fecha a execução do comando mysqli_fetch_array
        }
?>
        </table>
<?php
     }//Fecha a execução do comando mysqli_num_rows > 0
     else
     {
         echo "<br><br><div align=center><font face=Arial size=2>Desculpe, mais não foram encontrados nenhum cidente<br><br></font></div>";
     }
?>
     <br><div align="center"><font face="Arial" size="2">
     <b><a href='menuPesquisarCidades.php'><b>Voltar Para o Menu Pesquisar Cidades</a><br>     
     <a href='formAlterarCidades.php'><b>Voltar Para Alteração de Cidades</a><br>
     <a href='formExcluirCidades.php'><b>Voltar Para Exclusão de Cidades</a><br>
     <a href='menuGerCidades.php'><b>Voltar para o menu de Opções Gerenciamento de Cidades</a><br>
     <a href='menuOpcoesGeral.php'><b>Voltar para o menu de Opções Geral</a><br>
     <a href='sair.php'><b>Sair do Sistema </a></font></div>
     </body>
</html>
