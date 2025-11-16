<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>PetMatch - Nova Senha</title>

  <link rel="stylesheet" href="style.css" />
  <script defer src="script.js"></script>
</head>
<body>
  <header class="corsec">
    <a href="#"><img class="logo" src="img/logo-petmatch.png" alt="PetMatch"></a>
    <a href="#"><h2 class="corsecPages" href="#">PetMatch</h2></a>
    <h3 class="corsecPages"><a class="botaoSair" href="#">Ajuda</a></h3>
  </header>
    <img class ="fundoDivertido" src="img/fundoDivertido2.png" alt="pets diversos" style="height: 66%;">
      <div class="janRedSenha">
          <h2 class="titulo">Criar Nova Senha</h2>
          <p class="espacamentoLeve">Digite sua nova senha abaixo.</p>

          <?php
          session_start();
          if(isset($_SESSION['erro'])) {
              echo '<div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center;">';
              echo $_SESSION['erro'];
              echo '</div>';
              unset($_SESSION['erro']);
          }
          ?>

          <?php if(isset($_GET['token'])): ?>
          <form class="formulario" action="processamento.php" method="post">
              <input type="hidden" name="acao" value="redefinir_senha">
              <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
              
              <input type="password" name="nova_senha" placeholder="Nova Senha" required minlength="6">
              <input type="password" name="confirmar_senha" placeholder="Confirmar Nova Senha" required minlength="6">
              
              <button type="submit" class="botaoEnviar" style="font-size: 18px;">REDEFINIR SENHA</button>
          </form>
          <?php else: ?>
          <div style="text-align: center; color: var(--vermelho);">
              <p>Token não encontrado ou inválido!</p>
              <p><a href="RedefinirSenha.php">Solicitar novo token</a></p>
          </div>
          <?php endif; ?>
          
          <p class= "espacamentoLeve" style="text-align: center; color: rgb(185, 185, 185);">
              <a style="color: #BE5108;" href="login.php">Voltar para o login</a>
          </p>
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
    <section class="patinhas" style="text-align:center; margin: 18px 0;">
      <p>© 2025 PetMatch — Feito com ❤️ e 🐾</p>
    </section>
  </footer>
</body>
</html>
