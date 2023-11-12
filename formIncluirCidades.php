<?php
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
                <li><a href="formAlterarCidades.php">Alterar</a>
                <li><a href="formExcluirCidades.php">Excluir</a>
                <li><a href="menuPesquisarCidades.php">Pesquisar</a>
                <li><a class="dropdown-trigger" data-target="dropdown">Voltar<i
                            class="material-icons">arrow_drop_down</i></a></li>
            </ul>
        </div>
    </nav>
</div>
<ul id="dropdown" class="dropdown-content">
    <li><a href="menuGerCidades.php"><i class="material-icons left">person_pin</i>Gerenciamento de Cidades</a></li>

</ul>
<ul id="mobile-navbar" class="sidenav">
    <li><a href="formAlterarCidades.php"><i class="material-icons left">done</i>Alterar</a>
    <li><a href="formExcluirCidades.php"><i class="material-icons left">delete</i>Excluir</a>
    <li><a href="menuPesquisarCidades.php"><i class="material-icons left">search</i>Pesquisar</a>
    <li class="divider" tabindex="-1"></li>
    <li><a href="menuGerCidades.php"><i class="material-icons left">person_pin</i>Gerenciamento de Cidades</a></li>
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
                    <font face="Arial" size="4"><b>Cadastro de Cidades</b></font>
                </div>
            </td>
        </tr>
    </table>
    <form name="formCidades" id="formCidades" method="POST" action="incluirCidades.php">
        <div class="container" style="margin-top: 100px">
            <div class="row">
                <div class="col s12">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">keyboard</i>
                        <input type="text" name="cidNome" required>
                        <label for="cidNome">Nome:</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">location_on</i>
                        <input type="text" name="cidCep" maxlength="9" required>
                        <label for="cidCep">CEP:</label>
                    </div>
                </div>
            </div>
        </div>
        <div align="center">
            <button type="submit" class="waves-effect waves-light btn-large blue lighten-1" name="cadCidade"
                value="Cadastrar Cidade"><i class="material-icons left">assignment_ind</i>Cadastrar Cidade</button>
            </br></br>
            <a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i
                    class="material-icons left">logout</i>Sair do Sistema Cidades</a>
        </div>
    </form>
    <?php
    include_once 'includes/rodape.php';
    ?>