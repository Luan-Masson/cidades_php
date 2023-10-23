<?php
     //Vai verificar se a nossa sessão esta ativa
     require_once("verificar.php");
     //Vai fazer a conexão com o nosso banco de dados imaginária
     require_once("includes/conectarBD.php");
     //Função que vai exibir a data completa, dia e ano corrente
     include 'includes/exibirDia.fcn';     
?>
<html>
      <head> 
             <!-- Função que vai deixar todos os caracteres maiúsculos->
            <Style type="text/css">
                    input.maiuscula
                    {
                       text-transform: uppercase;
                    }
            </style>        
      </head>
      <body>
      <center><img src="imagens/logoCidade.jpeg" width="150" height="100">
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
           <p>Código do Cidade: <input type="text" name="cidID" size="10">
           <input type="submit" value="Excluir Dados do Cidade" name="excluir"></p>
           <div align="left"><font face="Arial" size="2"><b>Não Lembra o Código?<a href='pesqTodosCidades.php'> Clique Aqui </a><br></font></div>
     </form>
<?php
     }
     //Vai buscar dados do Cidade
     else if(!isset($_POST["enviar"])) 
     {
          $cidID = $_POST["cidID"];
          $consulta = mysqli_query($conexao, "SELECT * FROM cidades WHERE cidId = '$cidID'");          
        //obtem a resposta do Select executado acima
          $linha = mysqli_num_rows($consulta);
     if ($linha == 0) //verifica quantas linhas teve a query executada, se for igual a zero o cidente nao foi encontrado
     {
          echo "Cidade não encontrado $cidID";
     }
     else
     {
          echo "<div><font face=Arial size=4><b>Cidade Encontrado:</b></font></div>";
          //seta a linha de campoCidade da tabela cidades e depois coloca cada campo em uma variavel
          $campoCidade = mysqli_fetch_row($consulta);
          $cidNome = $campoCidade[1];
          $cidCep = $campoCidade[2];      
?>
          <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
          <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
             <tr bgcolor="#6699CC">
                 <td colspan="15"><div align="center"><font face="Arial" size="2"><b><font color="#FFFFFF">Cidades Cadastrados</font></b></font></div></td>
             </tr>
             <tr><td width="5%"><div align="center"><b><font face="Arial" size="2">Código do Cidade</font></b></div></td>
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">Data de inclusão</font></b></div></td>
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">Nome do Cidade</font></b></div></td>
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">Endereço</font></b></div></td>
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">Bairro</font></b></div></td>
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">E-mail</font></b></div></td>
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">Telefone</font></b></div></td>
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">Cidade</font></b></div></td>
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">UF</font></b></div></td>
             </tr>
             <tr>
                 <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $cidID;?></font></td>
                 <td width="20%" height="25"><b><font face="Arial" size="2"><?php echo $cidNome;?></font></td>
                 <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $cidCep;?></font></td>
             </tr>
          </table>
          <input type ="hidden" name="cidID" value="<?php echo $cidID;?>">
          <input type ="hidden" name="enviar" value="S">
          <input type ="submit" value="Deseja Realmente Excluir o Cidade?" name="excluir"></p>
          </form>
<?php
          mysqli_close($conexao);
     }
     }
     else
     // Excluir Cidade
     {
          $cidID = $_POST["cidID"];
          $deleta = mysqli_query($conexao, "DELETE FROM cidades WHERE cidID = '$cidID'");
          //O comando mysqli_affected_rows(), vai retornar a quantidade de linhas alteradas com o comando DELETE
          if (mysqli_affected_rows($conexao)>0)
          {
             echo "<p align='center'>Dados do Cidade foram excluídos com sucesso!!!</p>";              
          }
          else
          {
              $erro=mysqli_error($conexao);
              echo "<p align='center'>Erro:$erro</p>";
          }
              mysqli_close($conexao);
          }
?>
          <p><div align="center"><font face="Arial" size="2">
          <p><div align="center"><font face="Arial" size="2">
          <b><a href='formExcluirCidades.php'><b>Voltar Para Exclusão de Cidades</a><br>
          <b><a href='menuGerCidades.php'>Voltar para o menu de Opções Gerenciamento de Cidades</a><br>
          <b><a href='menuOpcoesGeral.php'>Voltar para o menu de Opções Geral</a><br>
          <b><a href='sair.php'>Sair do Sistema IPIL</a></font></div></p>
       </body>
</html>
