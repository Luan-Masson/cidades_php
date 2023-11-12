<?php
     //Vai verificar se a nossa sessão esta ativa
     require_once("verificar.php");
     //Vai fazer a conexão com o nosso banco de dados imaginária
     require_once("includes/conectarBD.php");
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
                    <li><a href="formAlterarCidades.php">Alterar</a>
                    <li><a href="formIncluirCidades.php">Incluir</a>
                    <li><a href="menuPesquisarCidades.php">Pesquisar</a>
                    <li><a class="dropdown-trigger" data-target="dropdown">Voltar<i class="material-icons">arrow_drop_down</i></a></li>
                </ul>
            </div> 
        </nav>
    </div>
    <ul id="dropdown" class="dropdown-content">
            <li><a href="menuGerCidades.php"><i class="material-icons left">person_pin</i>Gerenciamento de Cidades</a></li>

    </ul>    
    <ul id="mobile-navbar" class="sidenav">
        <li><a href="formAlterarCidades.php"><i class="material-icons left">done</i>Alterar</a>
        <li><a href="formIncluirCidades.php"><i class="material-icons left">assignment_turned_in</i>Incluir</a>
        <li><a href="menuPesquisarCidades.php"><i class="material-icons left">search</i>Pesquisar</a>
        <li class="divider" tabindex="-1"></li>
        <li><a href="menuGerCidades.php"><i class="material-icons left">person_pin</i>Gerenciamento de Cidades</a></li>
                
    </ul>
    <div>
     <b><?php
          //vai exibir o nome do usuário que está logado e a data corrente
          echo "O Usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento!!!! Hoje é ".$data;              
     ?></b>
     <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
     <tr>
     <td height="60"><div align="center"><font face="Arial" size="4"><b>Excluir Dados de Cidades </b></font></div></td>
     </tr>
     </table>      
<?php
     if (!isset($_POST["cidID"])&& !isset($_POST["enviar"]))
     {
?>
     <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
          <div class = "container" style="margin-top: 100px">
               <div class="row">
                    <div class = "col s12">
                         <div class="input-field col s12">
                              <i class="material-icons prefix">event_note</i>
                              <input type="text" name="cidID" size="10" required>
                              <label for="cidID">Código da Cidade</label>
                         </div>
                    </div>                    
               </div>
               <div class="row center">
                    <div class = "col s12">
                         <button type="submit" class="waves-effect waves-light btn-large blue lighten-1" name="excluir" value="Excluir Dados da Cidade"><i class="material-icons left">delete</i>Excluir Dados da Cidade</button>
                    </div>
                    <div class = "col s12">
                         <br><button class="waves-effect waves-light btn-large blue lighten-1" onclick="window.location.href = 'pesqTodasCidades.php'">Não Lembra o Código? Clique Aqui</button>
                    </div>
               </div>
          </div>
     </form>
<?php
     }
     //Vai buscar dados da Cidade
     else if(!isset($_POST["enviar"])) 
     {
          $cidID = $_POST["cidID"];
          $consulta = mysqli_query($conexao, "SELECT * FROM cidade WHERE cidID = '$cidID'");          
          //obtem a resposta do Select executado acima
          $linha = mysqli_num_rows($consulta);
     if ($linha == 0) //verifica quantas linhas teve a query executada, se for igual a zero a cidade nao foi encontrada
     {
          echo "Cidade não encontrada $cidID";
     }
     else
     {
          echo "<div><font face=Arial size=4><b>Cidade Encontrada:</b></font></div>";
          //seta a linha de campoCidade da tabela cidades e depois coloca cada campo em uma variavel
          $campoCidade = mysqli_fetch_row($consulta);
          $cidNome = $campoCidade[1];
          $cidCep = $campoCidade[2];
?>
     <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
          <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center" class="striped">
             <tr bgcolor="#6699CC">
                 <td colspan="15"><div align="center"><font face="Arial" size="2"><b><font color="#FFFFFF">Cidades Cadastradas</font></b></font></div></td>
             </tr>
             <tr><td width="5%"><div align="center"><b><font face="Arial" size="2">Código da Cidade</font></b></div></td>
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">Nome da Cidade</font></b></div></td>
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">Endereço</font></b></div></td>
             </tr>
             <tr>
                 <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $cidID;?></font></td>
                 <td width="20%" height="25"><b><font face="Arial" size="2"><?php echo $cidNome;?></font></td>
                 <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $cidCep;?></font></td>
             </tr>
          </table>
          <input type ="hidden" name="cidID" value="<?php echo $cidID;?>">
          <input type ="hidden" name="enviar" value="S">
          <div class = "col s12 center">
            <br><button type="submit" class="waves-effect waves-light btn-large blue lighten-1" name="alterar" value="Deseja Realmente Excluir a Cidade?"><i class="material-icons left">delete</i>Deseja Realmente Excluir a Cidade?</button>
          </div>
     </form>
<?php
          mysqli_close($conexao);
     }
     }
     else
     // Excluir Cidade
     {
          $cidID = $_POST["cidID"];
          $deleta = mysqli_query($conexao, "DELETE FROM cidade WHERE cidID = '$cidID'");
          //O comando mysqli_affected_rows(), vai retornar a quantidade de linhas alteradas com o comando DELETE
          if (mysqli_affected_rows($conexao)>0)
          {
             echo "<p align='center'>Dados da cidade foram excluídos com sucesso!!!</p>";              
          }
          else
          {
              $erro=mysqli_error($conexao);
              echo "<p align='center'>Erro:$erro</p>";
          }
              mysqli_close($conexao);
          }
?>
     <div class = "col s12 center">
          <br><a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i class="material-icons left">logout</i>Sair do Sistema Cidades</a>
     </div>
<?php
    include_once 'includes/rodape.php';
?>