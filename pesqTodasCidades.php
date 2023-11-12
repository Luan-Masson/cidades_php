<?php
    require_once("includes/conectarBD.php");
    //Vai verificar se a nossa sessão esta ativa
    require_once("verificar.php");
    //Função que vai exibir a data completa, dia e ano corrente
    include 'includes/exibirDia.fcn';
    include 'includes/cabecalho.php';
?>
<div class="nav-bar-fixed">
    <nav>
        <div class="nav-wrapper blue lighten-1">
            <a href="menuGerCidades.php" class="brand-logo" style="margin-left: 0.5em;">Menu de Opções</a>
            <a href="#" data-target="mobile-navbar" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="navbar-itens" class="right hide-on-med-and-down">
                <li><a href="formIncluirCidades.php">Incluir</a>
                <li><a href="formAlterarCidades.php">Alterar</a>
                <li><a href="formExcluirCidades.php">Excluir</a>
                <li><a href="menuPesquisarCidades.php">Pesquisar</a>
                <li><a class="dropdown-trigger" data-target="dropdown">Voltar<i class="material-icons">arrow_drop_down</i></a></li>
            </ul>
        </div> 
    </nav>
</div>
<ul id="dropdown" class="dropdown-content">
        <li><a href="menuGerCidades.php"><i class="material-icons left">person_pin</i>Gerenciamento de Cidades</a></li>
        
        <li><a href="menuOpcoesGeral.php"><i class="material-icons left">computer</i>Menu Opções Geral</a></li>
</ul>    
<ul id="mobile-navbar" class="sidenav">
    <li><a href="formIncluirCidades.php"><i class="material-icons left">assignment_turned_in</i>Incluir</a>
    <li><a href="formAlterarCidades.php"><i class="material-icons left">done</i>Alterar</a>
    <li><a href="formExcluirCidades.php"><i class="material-icons left">delete</i>Excluir</a>
    <li><a href="menuPesquisarCidades.php"><i class="material-icons left">search</i>Pesquisar</a>
    <li class="divider" tabindex="-1"></li>
    <li><a href="menuGerCidades.php"><i class="material-icons left">person_pin</i>Gerenciamento de Cidades</a></li>

    <li><a href="menuOpcoesGeral.php"><i class="material-icons left">computer</i>Menu Opções Geral</a></li>        
</ul>
<div>    <?php
        //Exibirá o nome do usuário que está logado e a data corrente
        echo "O usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento !!!! Hoje é ".$data;
    ?></b><br/><br/>
    <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td height="60"><div align="center"><font face="Arial" size="4"><b>Gerenciamento de Cidades</b></font></div></td>
    </tr>
    </table><br>
<?php
     //A formatação do campo cliDtInclusao, para retornar a data no formato dd/MM/yyyy
     $sqlCidade = mysqli_query($conexao,"SELECT * FROM cidade".
     //Ordena pelo número do código da cidade
     " ORDER BY cidID") or die ("Não foi possível realizar a consulta.");
?>
<?php
     //Se encontrar algum registro na tabela
     if(mysqli_num_rows($sqlCidade) > 0)
     {
?>
       <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center" class="striped">
       <tr>
           <td colspan="15"><div align="center"><font face="Arial" size="2"><b>Cidades Cadastrados</font></b></font></div></td>
       <tr>
       <td colspan="15"><div align="center"><font face="Arial" size="2"><b>Utilize as Teclas Ctlr+F para Encontrar o Código ou Nome da Cidade</font></b></font></div></td>
       </tr>
       <tr><td width="5%"><div align="center"><b><font face="Arial" size="2">Código da Cidade</font></b></div></td>
           <td width="10%"><div align="center"><b><font face="Arial" size="2">Nome da Cidade</font></b></div></td>
           <td width="20%"><div align="center"><b><font face="Arial" size="2">CEP</font></b></div></td>
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
        echo "<br><br><div align=center><font face=Arial size=2>Desculpe, mais não foram encontrados nenhuma cidade<br><br></font></div>";
     }
?>
<div align="center">
    </br></br>
    <a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i class="material-icons left">logout</i>Sair do Sistema Cidades</a>
</div>
<?php
    include_once 'includes/rodape.php';
?>