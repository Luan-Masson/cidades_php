## Rodando o projeto: 
<p>Para rodar o projeto siga os seguintes passos:</p>
<ol>
  <li>Clone o projeto dentro da pasta htdocs do xampp</li>
  <li>Abra o phpmyadmin e importe o arquivo teste.sql</li>
  <li>Inicie o projeto pelo xampp control</li>
</ol>
<h2>Navegação:</h2> 
<ul>
  <li>No formulário index.php, o título ficou Bicicletaria Imaginária, deveria ser Gerenciamento de Cidades</li>
  <li>No formulário menuOpcoesGeral.php, o link Sair do Sistema IPIL, deveria ser: Sair do Sistema Cidades</li>
  <li>No formulário menuGerCidades.php, o link Sair do Sistema IPIL, deveria ser: Sair do Sistema Cidades, e não
tem necessidade dos links:</li>
    <ul>
      <li>  Voltar para o menu de Gerenciamento de Usuários Administrativos</li>
      <li>Voltar para o menu de Gerenciamento de Produtos</li>
      <li>Voltar para o menu de Gerenciamento de Vendas</li>
    </ul>
  <li>No formulário formIncluirCidades.php, o link Sair do Sistema IPIL, deveria ser: Sair do Sistema Cidades, e
não tem necessidade dos links:
Voltar para o menu de Gerenciamento de Usuários Administrativos
Voltar para o menu de Gerenciamento de Produtos
Voltar para o menu de Gerenciamento de Vendas</li>
  <li>No formulário formAlterarCidades.php, o link para Exclusão não funciona, o link Sair do Sistema IPIL, deveria
ser: Sair do Sistema Cidades</li>
  <li>No formulário menuGerCidades.php, o link do menu Excluir não funciona</li>
  <li>No formulário menuPesquisarCidades.php, o link de menu está chamando todas cidades, naõ está exibindo o
formulário para pesquisar por termos</li>
  <li>No formulário pesqTodosCidades.php, o link para Exclusão não funciona</li>
  <li>No formulário formAlterarCidades.php, o campo CEP não está sendo mostrado</li>
</ul>
<h2>Codificação:</h2>
<ul>
  <li>Na linha 11, do formulário formExcluirCidades.php, abriu um comnetário e não fechou em lugar nenhum,
desta forma quase todo o código do formulário ficou comentando, por isto não funcionou</li>
</ul>
