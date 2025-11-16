<?php
session_start();
if(!isset($_SESSION['logado_colaborador']) || !$_SESSION['logado_colaborador']){
    header('location: loginColaborador.php');
    die();
}
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
        <li><a href="#" class="ativo">Dashboard</a></li>
        <li><a href="ColabGerenciar.php">Gerenciar Dados</a></li>
        <li><a href="ColabSolicitacoes.php">Solicitações de Adoção</a></li>
        <li><a href="ColabRelatorios.php">Relatórios</a></li>
      </ul>
  </nav>

  <section class="Dashboard">
    <h2 class="corsecTitulo">Veja as principais notificações:</h2>
    <?php
    require_once "funcoesBD.php";
    $totalContatos = contarContatosNaoLidos();
    ?>
    <div class="cliente-card" style="max-width: 800px; margin: 20px auto; text-align: center;">
        <h2>📬 Mensagens de Contato</h2>
        <?php if($totalContatos > 0): ?>
            <p style="color: var(--vermelho); font-weight: bold; font-size: 1.2rem;">
                Você tem <strong><?php echo $totalContatos; ?></strong> nova(s) mensagem(ns) de contato!
            </p>
            <a href="ColabGerenciarContatos.php" style="display: inline-block; margin-top: 15px;">
                <button class="btn-destaque">Ver Mensagens</button>
            </a>
        <?php else: ?>
            <p style="color: var(--cinza);">Nenhuma nova mensagem de contato.</p>
        <?php endif; ?>
    </div>
    <div class="dashboardCaixas">
      <article class="caixaMenuColab">
        <h3 class="caixaMenuColabTitulo">Nova solicitação de adoção</h3>
        <p class="Dashboard">João Silva solicitou a adoção do pet Mel.</p>
        <button class="btn-destaque">Ver Solicitação</button>
      </article>

      <article class="caixaMenuColab">
        <h3 class="caixaMenuColabTitulo">Novo pet cadastrado</h3>
        <p class="Dashboard">O pet Thor foi cadastrado com sucesso no sistema.</p>
        <button class="btn-destaque">Ver Pet</button>
      </article>

      <article class="caixaMenuColab">
        <h3 class="caixaMenuColabTitulo">Relatório mensal disponível</h3>
        <p class="Dashboard">O relatório de adoções do mês está pronto para visualização.</p>
        <button class="btn-destaque">Ver Relatório</button>
      </article>

    
  </section>

  <footer>
    <section class="rodapes">
      <section>
        <h4>PetMatch</h4>
        <p>Conectando corações e patas.</p>
      </section>

      <section>
        <a href="Ajuda.php"><h4>Ajuda</h4>
        <p>Central de ajuda e perguntas frequentes</p></a>
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
