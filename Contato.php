<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Quem Somos | PetMatch</title>

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
      <li><a href="Contato.php" class="ativo">Contato</a></li>
      <li><a href="Ajuda.php">Ajuda</a></li>
    </ul>
  </nav>

<section class="quemSomos">
    <div class="MVV">
      <h2>Fale com a gente 💌</h2>
      <p>Quer adotar, ser voluntário ou tirar dúvidas? A PetMatch adora conversar com você! Preencha o formulário ou escolha uma das opções abaixo.</p>
      <div class="janRedSenha2">
            <form class="formulario2" action="processamento.php" method="post">
                <input type="text" id="nome" name="nome" placeholder="Nome Completo" required>

                <input type="email" id="email" name="email" placeholder="E-mail" required>

                <input type="tel" id="telefone" name="telefone" placeholder="Telefone (opcional)">
                
                <input type="text" id="assunto" name="assunto" placeholder="Assunto (ex: 'Quero adotar', 'Quero ser voluntário', 'Doações'.)" required>

                <textarea input type="text" textarea id="mensagem" name="mensagem" placeholder="Escreva sua mensagem aqui..." required></textarea>
                
                <input class="botaoEnviar" type="submit" value="CADASTRAR">
            </form>
      </div>
      
    <div class="janRedSenha2">
      <h2>Contato Direto</h2>
      <div class="linha-ou"></div>
      <p>📍 Avenida Caramelo, 1599 - Vila Cachorrada - Presidente Prudente / SP</p>
      <p>📞 Telefone / WhatsApp (18) 99999-9999</p>
      <p>✉️ Email: contato@petmatch.com</p>
      <p>⏰ Horário de atendimento: Segunda a Sábado, das 9h as 17h.</p>
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
