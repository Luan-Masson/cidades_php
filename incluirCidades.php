<?php
    require_once("includes/conectarBD.php");
    //Verificará se a nossa sessão está ativa
    require_once("verificar.php");
    //A função que exibirá a data completa, dia e ano corrente
    include 'includes/exibirDia.fcn';
    include 'includes/cabecalho.php';
?>
    <div class="nav-bar-fixed">
        <nav>
            <div class="nav-wrapper blue lighten-1">
                <a href="menuGerCidades.php" class="brand-logo" style="margin-left: 0.5em;">Menu de Opções</a>
                <a href="#" data-target="mobile-navbar" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul id="navbar-itens" class="right hide-on-med-and-down">
                    <li><a href="menuGerCidades.php"><i class="material-icons left">apartment</i>Gerenciamento de Cidades</a></li>
                </ul>
            </div> 
        </nav>
    </div> 
    <ul id="mobile-navbar" class="sidenav">
        <li><a href="menuGerCidades.php"><i class="material-icons left">apartment</i>Gerenciamento de Cidades</a></li>    
    </ul>
    <?php
        //Exibirá o nome do usuário que está logado e a data corrente
        echo "O usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento !!!! Hoje é ".$data;
    ?></b><br/><br/>
    <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td height="60"><div align="center"><font face="Arial" size="4"><b>Cadastro de Cidades</b></font></div></td>
        </tr>
    </table><br/>
    <?php
        //Recebe os dados digitados no formulário de cadastro de cidades via método POST
        $nomeCid = $_POST["cidNome"];
        $cidCep = $_POST["cidCep"];
        //O comando SQL que gravará os dados dos cidades na tabela cidade. Observem que estamos utilizando o comando str_to_date no campo $dtInclusao para que o usuário possa digitar a data no formato dd/mm/aaaa
        $sql = mysqli_query($conexao,"INSERT INTO cidade (cidNome, cidCep) VALUES ('$nomeCid', '$cidCep') ") or die("Erro no comando SQL!!!<br/> <b><a href='formIncluirCidades.php'><b>Voltar Para a Inclusão de Cidades</a><br/>".mysqli_error($conexao));
        echo "<div align=center>Os dados da cidade $nomeCid foram cadastrados com sucesso!!! Veja abaixo os dados cadastrados.<br/><br/>";
        echo "<table class='striped'>";
        echo "<tr>";
        echo "<th><div>Cidade</div></th>";
        echo "<th><div>CEP</div></th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>$nomeCid</font></td>";
        echo "<td>$cidCep</font></td>";
        echo "</tr>";
        echo "</table><br/>";
    ?>
    <div align="center">
        </br></br>
        <a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i class="material-icons left">logout</i>Sair do Sistema Cidades</a>
    </div>
<?php
    include_once 'includes/rodape.php';
?>