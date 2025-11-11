<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Faça seu Cadastro | PetMatch</title>

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

  <section class="cadastro">
    <div class="linha-ou"></div>
    <h2 class="corsecTitulo">Faça seu cadastro, e seja bem vindo! ❤️</h2>
    
      <div class="janRedSenha" style="width: 40%;">
          <h2 class="corsecTitulo" style="margin-bottom: 25px;">Au au? Miau? </h2>
            <form class="formulario" action="processamento.php" method="post"> 
                <input type="text" id="nome" name="nome" placeholder="Nome" required>

                <input type="date" id="data_nascimento" name="data_nascimento" placeholder="Data de Nascimento" required>

                <input type="idade" id="idade" name="idade" placeholder="Idade" required>

                <input type="raca" id="raca" name="raca" placeholder="Raça" required>

                <input type="cor" id="cor" name="cor" placeholder="Cor" required>

                <input class="botaoEnviar" type="submit" value="CADASTRAR">
            </form>
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