<?php
session_start();

// Verificar se o arquivo de funções existe
if(!file_exists("funcoesBD.php")) {
    die("❌ Arquivo funcoesBD.php não encontrado!");
}

require "funcoesBD.php";

error_log("=== DEBUG: Processamento iniciado ===");
error_log("POST: " . print_r($_POST, true));
error_log("GET: " . print_r($_GET, true));

// Processamento de Login Cliente
if(isset($_POST['acao']) && $_POST['acao'] == 'login_cliente'){
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    
    error_log("DEBUG: Tentando login cliente - Email: $email");
    
    if(empty($email) || empty($senha)) {
        $_SESSION['erro'] = "Por favor, preencha todos os campos!";
        header('location: login.php');
        die();
    }
    
    $usuario = verificarLogin($email, $senha);
    
    error_log("DEBUG: Resultado do login: " . print_r($usuario, true));
    
    if($usuario && !empty($usuario)){
        $_SESSION['usuario'] = $usuario;
        $_SESSION['logado'] = true;
        $_SESSION['sucesso'] = "Login realizado com sucesso!";
        error_log("DEBUG: Login bem-sucedido, redirecionando para index.php");
        header('location: index.php');
        die();
    } else {
        $_SESSION['erro'] = "Email ou senha incorretos!";
        error_log("DEBUG: Login falhou - Credenciais inválidas");
        header('location: login.php');
        die();
    }
}

// Processamento de Login Colaborador
if(isset($_POST['acao']) && $_POST['acao'] == 'login_colaborador'){
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    
    error_log("DEBUG: Tentando login colaborador - Email: $email");
    
    if(empty($email) || empty($senha)) {
        $_SESSION['erro'] = "Por favor, preencha todos os campos!";
        header('location: loginColaborador.php');
        die();
    }
    
    $colaborador = verificarLoginColaborador($email, $senha);
    
    error_log("DEBUG: Resultado do login colaborador: " . print_r($colaborador, true));
    
    if($colaborador && !empty($colaborador)){
        $_SESSION['colaborador'] = $colaborador;
        $_SESSION['logado_colaborador'] = true;
        $_SESSION['sucesso'] = "Login de colaborador realizado!";
        error_log("DEBUG: Login colaborador bem-sucedido");
        header('location: ColabAreaColaborador.php');
        die();
    } else {
        $_SESSION['erro'] = "Email ou senha incorretos!";
        error_log("DEBUG: Login colaborador falhou");
        header('location: loginColaborador.php');
        die();
    }
}

// Cadastro de Cliente
if(!empty($_POST['nome']) && !empty($_POST['sobrenome']) && !empty($_POST['cpf']) && !empty($_POST['dataNascimento']) && !empty($_POST['telefone']) && !empty($_POST['email']) && !empty($_POST['senha'])){
    
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpf = $_POST['cpf'];
    $dataNascimento = $_POST['dataNascimento'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(inserirCliente($nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $senha)){
        $_SESSION['sucesso'] = "Cadastro realizado com sucesso! Faça login.";
        header('location: login.php');
    } else {
        $_SESSION['erro'] = "Erro ao cadastrar. Email já existe ou dados inválidos.";
        header('location: CadastrarCliente.php');
    }
    die();
}

// Cadastro de Contato
if(!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['assunto']) && !empty($_POST['mensagem'])){
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'] ?? '';
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];

    if(inserirContato($nome, $email, $telefone, $assunto, $mensagem)){
        $_SESSION['sucesso'] = "Mensagem enviada com sucesso! Entraremos em contato em breve.";
    } else {
        $_SESSION['erro'] = "Erro ao enviar mensagem. Tente novamente.";
    }
    
    header('location: Contato.php');
    die();
}

// Cadastro de Animais
if(!empty($_POST['nome']) && !empty($_POST['dataNascimento']) && !empty($_POST['idade']) && !empty($_POST['raca']) && !empty($_POST['cor'])){
    
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $idade = $_POST['idade'];
    $raca = $_POST['raca'];
    $cor = $_POST['cor'];

    if(inserirPet($nome, $dataNascimento, $idade, $raca, $cor)){
        $_SESSION['sucesso'] = "Pet cadastrado com sucesso!";
    } else {
        $_SESSION['erro'] = "Erro ao cadastrar pet.";
    }
    
    header('location: CadastrarPet.php');
    die();
}

// Cadastro de Colaboradores
if(!empty($_POST['nome']) && !empty($_POST['sobrenome']) && !empty($_POST['cpf']) && !empty($_POST['dataNascimento']) && !empty($_POST['telefone']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['cargo']) && !empty($_POST['salario'])){
    
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpf = $_POST['cpf'];
    $dataNascimento = $_POST['dataNascimento'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cargo = $_POST['cargo'];
    $salario = $_POST['salario'];

    if(inserirColaborador($nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $senha, $cargo, $salario)){
        $_SESSION['sucesso'] = "Colaborador cadastrado com sucesso!";
    } else {
        $_SESSION['erro'] = "Erro ao cadastrar colaborador.";
    }
    
    header('location: CadastrarColaborador.php');
    die();
}

// Cadastro de Doadores
if(!empty($_POST['nome']) && !empty($_POST['sobrenome']) && !empty($_POST['cpf']) && !empty($_POST['dataNascimento']) && !empty($_POST['telefone']) && !empty($_POST['email']) && !empty($_POST['quantidadedeanimais']) && !empty($_POST['motivodedoacao']) && !empty($_POST['datadoacao'])){
    
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpf = $_POST['cpf'];
    $dataNascimento = $_POST['dataNascimento'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $quantidadedeanimais = $_POST['quantidadedeanimais'];
    $motivodedoacao = $_POST['motivodedoacao'];
    $datadoacao = $_POST['datadoacao'];

    if(inserirDoador($nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $quantidadedeanimais, $motivodedoacao, $datadoacao)){
        $_SESSION['sucesso'] = "Doador cadastrado com sucesso!";
    } else {
        $_SESSION['erro'] = "Erro ao cadastrar doador.";
    }
    
    header('location: CadastrarDoadores.php');
    die();
}

// Recuperação de Senha
if(isset($_POST['acao']) && $_POST['acao'] == 'recuperar_senha'){
    $email = $_POST['email'] ?? '';
    
    if(empty($email)) {
        $_SESSION['erro'] = "Por favor, informe seu email!";
        header('location: redefinirSenha.php');
        die();
    }
    
    $usuario = verificarEmailExiste($email);
    if($usuario){
        $token = bin2hex(random_bytes(32));
        
        if(criarTokenRecuperacao($email, $token)){
            $_SESSION['token_gerado'] = $token;
            $_SESSION['email_recuperacao'] = $email;
            $_SESSION['sucesso'] = "Token gerado: " . $token . " - Use na próxima página.";
            header('location: novaSenha.php');
        } else {
            $_SESSION['erro'] = "Erro ao gerar token de recuperação.";
            header('location: redefinirSenha.php');
        }
    } else {
        $_SESSION['erro'] = "Email não encontrado em nossa base de dados.";
        header('location: redefinirSenha.php');
    }
    die();
}

// Redefinir Senha
if(isset($_POST['acao']) && $_POST['acao'] == 'redefinir_senha'){
    $token = $_POST['token'] ?? '';
    $novaSenha = $_POST['nova_senha'] ?? '';
    $confirmarSenha = $_POST['confirmar_senha'] ?? '';
    
    if($novaSenha !== $confirmarSenha){
        $_SESSION['erro'] = "As senhas não coincidem!";
        header('location: novaSenha.php?token=' . $token);
        die();
    }
    
    $dadosToken = verificarToken($token);
    if($dadosToken){
        if(atualizarSenha($dadosToken['email'], $novaSenha)){
            marcarTokenComoUsado($token);
            $_SESSION['sucesso'] = "Senha redefinida com sucesso!";
            header('location: login.php');
        } else {
            $_SESSION['erro'] = "Erro ao atualizar senha.";
            header('location: novaSenha.php?token=' . $token);
        }
    } else {
        $_SESSION['erro'] = "Token inválido ou expirado!";
        header('location: novaSenha.php?token=' . $token);
    }
    die();
}

// Logout
if(isset($_GET['logout'])){
    session_destroy();
    header('location: login.php');
    die();
}

// Se nenhuma ação foi capturada
$_SESSION['erro'] = "Ação não reconhecida!";
header('location: login.php');
die();
?>