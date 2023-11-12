<?php
    include_once 'includes/cabecalho.php';
    include_once 'includes/imagem.php'
?>
<div class="row">
   <div class="col s12 m6 push-m3">
      <form name="formAutentica" method="post" style="display: flex; justify-content:center;" action="autenticar.php">
         <div class="input-field">
            <i class="material-icons prefix">account_circle</i>
            <input type="text" class="validate" name="indexUsuario" required>
            <label for="indexUsuario">Usuário</label>
            <div class="row">
               <div class="input-field col s12">
                  <i class="material-icons prefix">password</i>
                  <input type="password" class="validate" name="indexSenha" required>
                  <label for="indexSenha">Senha</label>
               </div>
            </div>
            <div class="row" align="center">
               <div class="input-field col s12">
                  <button class="btn waves-effect waves-light" type="submit" name="btnEntrar" >Entrar no Sistema Cidades<i class="material-icons right">send</i>
                   </button>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
<?php
    include_once 'includes/rodape.php';
?>