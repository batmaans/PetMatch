<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>PetMatch - Login</title>

  <link rel="stylesheet" href="style.css" />
  <script defer src="script.js"></script>
</head>
<body>
  <header class="corsec">
    <a href="#"><img class="logo" src="img/logo-petmatch.png" alt="PetMatch"></a>
    <a href="#"><h2 class="corsecPages" href="#">PetMatch</h2></a>
    <h3 class="corsecPages"><a class="botaoSair" href="#">Ajuda</a></h3>
  </header>
    <img class ="fundoDivertido" src="img/fundoDivertido2.png" alt="pets diversos">
      <div class="janRedSenha">
          <h2 class="titulo">Login</h2>
            <?php
              session_start();
              if(isset($_SESSION['erro'])) {
                  echo '<div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 15px; text-align: center;">';
                  echo '❌ ' . $_SESSION['erro'];
                  echo '<br><small><a href="debug_login.php" style="color: #721c24;">Clique aqui para diagnosticar o problema</a></small>';
                  echo '</div>';
                  unset($_SESSION['erro']);
              }
            ?>
          
          <form class="formulario" action="processamento.php" method="post">
              <input type="hidden" name="acao" value="login_cliente">
              <input type="text" id="email" name="email" placeholder="Email ou usuario" required>
              <input type="password" name="senha" placeholder="Senha" required>
              <button type="submit" class="botaoEnviar">ENTRAR</button>
          </form>
          
          <nav>
              <div class="esqueciMeta">
                  <a href="RedefinirSenha.php">Esqueci minha senha</a>
                  <a href="#">Fazer login com SMS</a>
              </div>
              <div class="linha-ou">
                  <span>OU</span>
              </div>
              <nav class="redesLogin">
                  <button> <img src="img/logo-facebook-cicle.png" alt="FACEBOOK">Facebook</button>
                  <button> <img src="img/logo-google.png" alt="GOOGLE">Google</button>
                  <button> <img src="img/logo-apple.png" alt="APPLE">Apple</button>  
              </nav>
                  <p class="textoCinza">Novo no PetMach? <a class="textoLaranja" href="CadastrarCliente.php">Cadastrar</a></p><br>
                  <a class="textoLaranja" href="loginColaborador.php"><p>Área do Colaborador</p></a>
          </nav>
      </div>

  <footer>
    <section class="rodapes">
      <section>
        <h4>PetMatch</h4>
        <p>Conectando corações e patas desde 2025.</p>
      </section>

      <section>
        <h4>Contato</h4>
        <p>contato@petmatch.org</p>
      </section>

      <section>
        <h4>Siga-nos</h4>
        <p>Instagram • Facebook • TikTok</p>
      </section>
    </section>

    <nav class="linha-ou"></nav>
    <section class="patinhas">
      <p>© 2025 PetMatch — Feito com ❤️ e 🐾</p>
    </section>
  </footer>
</body>
</html>
