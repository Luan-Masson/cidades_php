<?php
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
    <?php
        //Exibirá o nome do usuário que está logado e a data corrente
        echo "O usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento !!!! Hoje é ".$data;
    ?></b><br/><br/>
    <table width="55%" cellspacing="0" cellpadding="0" border="0" >
            <tr>
                <td>
                <tr>                  
                    <td><b>Menu Pesquisar Cidades</font></td>                  
                </tr>
                </td>
            </tr>             
    </table>
    <div class="row">
        <div class = "col s12">            
            <a href="pesqTodasCidades.php"><i class="material-icons left">search</i>Todos</a>
        </div>
        <div class = "col s12">
            <a href="formPesquisarTermosCidades.php"><i class="material-icons left">search</i>Escolher Termo de Pesquisa</a>
        </div>
    </div>
    <div align="center">
        </br></br>
        <a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i class="material-icons left">logout</i>Sair do Sistema Cidades</a>
    </div>
<?php
    include_once 'includes/rodape.php';
?>