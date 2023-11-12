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
                <a href="menuGerCidades.php" class="brand-logo" style="margin-left: 0.5em;">
                    <i class="material-icons">apartment</i>Menu de Opções</a>
                <a href="#" data-target="mobile-navbar" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul id="navbar-itens" class="right hide-on-med-and-down">
                    <li><a href="menuGerCidades.php">Gerenciamento de Cidades</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <ul id="mobile-navbar" class="sidenav">
        <li><a href="menuGerCidades.php"><i class="material-icons left">apartment</i>Gerenciamento de Cidades</a></li>
    </ul>
    <div>
        <?php
            //Exibirá o nome do usuário que está logado e a data corrente
            echo "O usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento !!!! Hoje é ".$data;
        ?>
    </div>
    </b><br/><br/>
    <?php include_once 'includes/imagem.php'; ?>
    <div align="center" style="margin:1em;">
        <a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i class="material-icons left">logout</i>Sair do Sistema de Cidades</a>
    </div>
<?php
    include_once 'includes/rodape.php';
?>