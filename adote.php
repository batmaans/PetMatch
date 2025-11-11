<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Adote um Pet | PetMatch</title>

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
      <li><a href="adote.php" class="ativo">Adote</a></li>
      <li><a href="quemSomos.php">Quem Somos</a></li>
      <li><a href="Contato.php">Contato</a></li>
      <li><a href="Ajuda.php">Ajuda</a></li>
    </ul>
  </nav>

  <section class="adote">
    <h2 class="corsecTitulo">Encontre o pet ideal para você ❤️</h2>

    <div class="filtros">
      <select id="filtro-especie">
        <option value="todos">Todos</option>
        <option value="cachorro">Cachorros</option>
        <option value="gato">Gatos</option>
      </select>
    </div>

    <div class="linha-ou"></div>

    <div class="pet-grid" id="lista-pets">
      <!--  js -->
    </div>
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
