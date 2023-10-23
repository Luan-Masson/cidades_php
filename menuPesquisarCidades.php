<?php
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
      <table width="55%" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <td>
                <table width="130%" cellspacing="0" cellpadding="0" border="0">
                <tr>                  
                    <td width="130%"><b>Menu Pesquisar Cidades</font></td>                  
                </tr>
                </table></td>
            </tr>
            <tr>
                <td nowrap>
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tr>
                    <ol type="I" start="1"><br>
                        <li><a href="pesqTodosCidades.php"><font color="#3300FF"><b>Todos</font></a>
                        <li><a href="formPesquisarTermosCidades.php"><b>Escolher Termo de Pesquisa</font></a>
                    </ol>
                    </tr>
                </table></td>              
            </tr> 
          </table>
          <br><div align="center"><font face="Arial" size="2">
          <b><a href='menuGerCidades.php'>Voltar Para o Menu de Opções Gerenciamento de Cidades</a><br>
          <b><a href='menuOpcoesGeral.php'>Voltar Para o Menu de Opções Geral</a><br>
          <b><a href='sair.php'>Sair do Sistema </a></font></div></p>
      </body>
</html>
