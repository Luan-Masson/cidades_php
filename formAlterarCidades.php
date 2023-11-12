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
                <li><a href="formIncluirCidades.php">Incluir</a>
                <li><a href="formExcluirCidades.php">Excluir</a>
                <li><a href="menuPesquisarCidades.php">Pesquisar</a>
                <li><a class="dropdown-trigger" data-target="dropdown">Voltar<i
                            class="material-icons">arrow_drop_down</i></a></li>
            </ul>
        </div>
    </nav>
</div>
<ul id="dropdown" class="dropdown-content">
    <li><a href="menuGerCidades.php"><i class="material-icons left">apartment</i>Gerenciamento de Cidades</a></li>
</ul>
<ul id="mobile-navbar" class="sidenav">
    <li><a href="formIncluirCidades.php"><i class="material-icons left">assignment_turned_in</i>Incluir</a>
    <li><a href="formExcluirCidades.php"><i class="material-icons left">delete</i>Excluir</a>
    <li><a href="menuPesquisarCidades.php"><i class="material-icons left">search</i>Pesquisar</a>
    <li class="divider" tabindex="-1"></li>
    <li><a href="menuGerCidades.php"><i class="material-icons left">apartment</i>Gerenciamento de Cidades</a></li>
</ul>
<div>
    <?php
    //Exibirá o nome do usuário que está logado e a data corrente
    echo "O usuário " . $_SESSION['sessaoNome'] . " está logado no sistema neste momento !!!! Hoje é " . $data;
    ?></b><br /><br />
    <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td height="60">
                <div align="center">
                    <font face="Arial" size="4"><b>Alterar Dados de Cidades</b></font>
                </div>
            </td>
        </tr>
    </table>
    <?php
    if (!isset($_POST["cidID"]) && !isset($_POST["enviar"])) {
        ?>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="container" style="margin-top: 100px">
                <div class="row">
                    <div class="col s12">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">event_note</i>
                            <input type="text" name="cidID" size="10" required>
                            <label for="cidID">Código da Cidade</label>
                        </div>
                    </div>
                </div>
                <div class="row center">
                    <div class="col s12">
                        <button type="submit" class="waves-effect waves-light btn-large blue lighten-1" name="alterar"
                            value="Alterar Dados da Cidade"><i class="material-icons left">assignment_ind</i>Alterar Dados
                            da Cidade</button>
                        <div><br>
                            <div class="col s12">
                                <button class="waves-effect waves-light btn-large blue lighten-1" onclick="window.location.href = 'pesqTodasCidades.php'">Não Lembra o Código? Clique Aqui</button>
                            </div>
                        </div>
                    </div>
        </form>
        <?php
    }
    //Buscará os dados da cidade
    else if (!isset($_POST["enviar"])) {
        $cidID = $_POST["cidID"];
        $consulta = mysqli_query($conexao, "SELECT * FROM cidade WHERE cidID = '$cidID'");
        //obtém a resposta do Select executado acima
        $linha = mysqli_num_rows($consulta);
        if ($linha == 0) //verifica quantas linhas teve a query executada e se for igual a zero, a cidade não foi encontrada
        {
            echo "Cidade não encontrada $cidID";
        } else {
            echo "<div><font face=Arial size=4><b>Cidade Encontrada:</b></font></div>";
            //seta a linha de campoCidade da tabela cidades e depois, coloca cada campo em uma variável.
            $campoCidade = mysqli_fetch_row($consulta);
            $cidNome = $campoCidade[1];
            $cidCep = $campoCidade[2];
            //Esta função gravará os caracteres maiúsculos no MySql
            ?>
                <form name="formCidades" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center" class="striped">
                        <tr>
                            <td colspan="15">
                                <div align="center">
                                    <font face="Arial" size="2"><b>
                                            <font color="#FFFFFF">Cidades Cadastrados</font>
                                        </b></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td width="5%">
                                <div align="center"><b>
                                        <font face="Arial" size="2">Código da cidade</font>
                                    </b></div>
                            </td>
                            <td width="5%">
                                <div align="center"><b>
                                        <font face="Arial" size="2">cidade</font>
                                    </b></div>
                            </td>
                            <td width="5%">
                                <div align="center"><b>
                                        <font face="Arial" size="2">CEP</font>
                                    </b></div>
                            </td>
                        </tr>
                        <tr>
                            <td width="10%" height="25"><b>
                                    <font face="Arial" size="2">
                                    <?php echo $cidID; ?>
                                    </font>
                            </td>
                            <td width="20%" height="25"><b>
                                    <font face="Arial" size="2"><input type="text" name="cidNome" size="42" required
                                            value="<?php echo $cidNome; ?>"></font>
                            </td>
                            <td width="10%" height="25"><b>
                                    <font face="Arial" size="2"><input type="text" name="cidCep" maxlength="9" size="42" required
                                            value="<?php echo $cidCep; ?>"></font>
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" name="cidID" value="<?php echo $cidID; ?>">
                    <input type="hidden" name="enviar" value="S"><br>
                    <div class="col s12 center">
                        <button type="submit" class="waves-effect waves-light btn-large blue lighten-1" name="alterar"
                            value="Alterar Dados da Cidade"><i class="material-icons left">assignment_ind</i>Alterar Dados da
                            Cidade</button>
                    </div>
                </form>
                <?php
                mysqli_close($conexao);
        }
    } else // alterar cidade
    {
        $cidID = $_POST["cidID"];
        $cidNome = $_POST["cidNome"];
        $cidCep = $_POST["cidCep"];
        $altera = mysqli_query($conexao, "UPDATE cidade SET cidNome='$cidNome', cidCep='$cidCep' WHERE cidID='$cidID'");
        //O comando mysqli_affected_rows( ) retornará a quantidade de linhas alteradas com o comando UPDATE
        if (mysqli_affected_rows($conexao) > 0) {
            echo "<p align='center'>Dados da cidade $cidNome alterados com sucesso!!! Verifique abaixo a alteração feita.</p>";
            echo "<table width='100%' border='0' cellspacing='1' cellpadding='0' align='center' class='striped'>";
            echo "<tr>";
            echo "</tr>";
            echo "<tr>";
            echo "<td width='10%'><div align='center'><b><font face='Arial'csize='2'>Código da cidade</font></b></div></td>";
            echo "<td width='20%'><div align='center'><b><font face='Arial' size='2'>cidade</font></b></div></td>";
            echo "<td width='10%'><div align='center'><b><font face='Arial' size='2'>CEP</font></b></div></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td width='10%' height='25'><b><font face='Arial' size='2'>$cidID</font></td>";
            echo "<td width='20%' height='25'><b><font face='Arial' size='2'>$cidNome</font></td>";
            echo "<td width='10%' height='25'><b><font face='Arial' size='2'>$cidCep</font></td>";
            echo "</tr>";
            echo "</table>";
        } else {
            $erro = mysqli_error($conexao);
            echo "<p align='center'>Erro:$erro</p>";
        }
        mysqli_close($conexao);
    }
    ?>
    <div class="col s12 center">
        <br><a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i
                class="material-icons left">logout</i>Sair do Sistema Cidades</a>
    </div>
    <?php
    include_once 'includes/rodape.php';
    ?>