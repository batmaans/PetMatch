<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Colaborador | PetMatch</title>

  <link rel="stylesheet" href="style.css" />
  <script defer src="adote.js"></script>
  <script defer src="script.js"></script>
</head>
<body>
  <header class="corsec">
    <a href="#"><img class="logo" src="img/logo-petmatch.png" alt="PetMatch"></a>
    <a href="#"><h2 class="corsecPages" href="#">PetMatch</h2></a>
    <h3 class="corsecPages"><a class="botaoSair2" href="login.php">Sair</a></h3>
  </header>

  <nav class="menu-horizontal2">
    <ul>
      <li><a href="index.php">Início</a></li>
      <li><a href="adote.php">Adote</a></li>
      <li><a href="quemSomos.php">Quem Somos</a></li>
      <li><a href="Contato.php">Contato</a></li>
      <li><a href="Ajuda.php">Ajuda</a></li>
    </ul>
  </nav>

    <nav class="menu-colaborador">
      <ul>
        <li><a href="ColabAreaColaborador.php">Dashboard</a></li>
        <li><a href="#" class="ativo">Gerenciar Dados</a></li>
        <li><a href="ColabSolicitacoes.php">Solicitações de Adoção</a></li>
        <li><a href="ColabRelatorios.php">Relatórios</a></li>
      </ul>
  </nav>


    <section class="GerenciarPets">
    <h2 class="corsecTitulo">Gerenciar Clientes</h2><br>
    
        <h3 class="caixaMenuColabTitulo">
          <a href="ColabGerenciarClientes.php?verClientes=1">Ver Clientes</a>
        </h3>
        <?php
          if (isset($_GET['verClientes'])) {

              include 'conexao.php'; // seu arquivo de conexão ao MySQL

              $sql = "SELECT id, nome, email, telefone FROM clientes";
              $result = $conn->query($sql);

              echo "<div class='lista-clientes'>";
              echo "<h3>Lista de Clientes</h3>";

              if ($result->num_rows > 0) {
                  echo "<table class='tabelaClientes'>";
                  echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th></tr>";

                  while ($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>".$row['id']."</td>";
                      echo "<td>".$row['nome']."</td>";
                      echo "<td>".$row['email']."</td>";
                      echo "<td>".$row['telefone']."</td>";
                      echo "</tr>";
                  }

                  echo "</table>";
              } else {
                  echo "<p>Nenhum cliente encontrado.</p>";
              }

              echo "</div>";
          }
        ?>


        <a href="CadastrarCliente.php"><h3 class="caixaMenuColabTitulo">Adicionar Novo Cliente</h3></a>

        <h3 class="caixaMenuColabTitulo">Editar Dados do Cliente</h3>

        <h3 class="caixaMenuColabTitulo">Remover Cliente</h3>
    
  </section>


  <footer>
    <section class="rodapes">
      <section>
        <h4>PetMatch</h4>
        <p>Conectando corações e patas.</p>
      </section>

      <section>
        <h4>Ajuda</h4>
        <p>Central de ajuda e perguntas frequentes</p>
      </section>

      <section>
        <h4>Contato</h4>
        <p>contato@petmatch.org</p>
      </section>
    </section>

    <nav class="linha-ou"></nav>
    <section class="patinhas">
      <p>© 2025 PetMatch — Feito com ❤️ e 🐾</p>
    </section>
  </footer>
</body>
</html>
