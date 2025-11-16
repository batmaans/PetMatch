<?php
    require_once "funcoesBD.php"; 
?>
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
    <h2 class="corsecTitulo">Gerenciar Pets</h2><br>
    
        <h3 class="caixaMenuColabTitulo">Ver Pets</h3>
        
         <?php
          $listaPets = retornarPets();
          if($listaPets && mysqli_num_rows($listaPets) > 0){
              while($pet = mysqli_fetch_assoc($listaPets)){
                  echo "<section class='cliente-card'>";
                  echo "<h2>" . htmlspecialchars($pet["nome"]) . "</h2>";
                  echo "<p>Data Nascimento: " . htmlspecialchars($pet["dataNascimento"]) . "</p>";
                  echo "<p>Idade: " . htmlspecialchars($pet["idade"]) . " anos</p>";
                  echo "<p>Raça: " . htmlspecialchars($pet["raca"]) . "</p>";
                  echo "<p>Cor: " . htmlspecialchars($pet["cor"]) . "</p>";
                  echo "</section>";
              }
              mysqli_free_result($listaPets);
          } else {
              echo "<p>Nenhum pet encontrado.</p>";
          }
        ?>        
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
