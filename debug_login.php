<?php
session_start();
function conectarBD(){
    $con = mysqli_connect("localhost", "root", "", "petadocao2");
    if(!$con){
        return false;
    }
    mysqli_set_charset($con, "utf8mb4");
    return $con;
}

echo "<h2>🔍 Debug do Sistema de Login</h2>";

// Teste de conexão
echo "<h3>1. Teste de Conexão com Banco:</h3>";
$con = conectarBD();
if($con) {
    echo "✅ Conexão com MySQL OK<br>";
} else {
    echo "❌ Erro na conexão MySQL<br>";
    die();
}

// Verificar tabelas
echo "<h3>2. Verificar Tabelas:</h3>";
$tabelas = ['cadastroclientes', 'cadastrocolaboradores'];
foreach($tabelas as $tabela) {
    $result = mysqli_query($con, "SHOW TABLES LIKE '$tabela'");
    if(mysqli_num_rows($result) > 0) {
        echo "✅ Tabela <strong>$tabela</strong> existe<br>";
    } else {
        echo "❌ Tabela <strong>$tabela</strong> NÃO existe<br>";
    }
}

// Verificar usuários de teste
echo "<h3>3. Verificar Usuários Cadastrados:</h3>";

// Clientes
$clientes = mysqli_query($con, "SELECT email, senha FROM cadastroclientes");
echo "<strong>Clientes:</strong><br>";
if(mysqli_num_rows($clientes) > 0) {
    while($cliente = mysqli_fetch_assoc($clientes)) {
        echo "Email: " . $cliente['email'] . " | Senha: " . $cliente['senha'] . "<br>";
    }
} else {
    echo "Nenhum cliente cadastrado<br>";
}

// Colaboradores
$colaboradores = mysqli_query($con, "SELECT email, senha FROM cadastrocolaboradores");
echo "<strong>Colaboradores:</strong><br>";
if(mysqli_num_rows($colaboradores) > 0) {
    while($colab = mysqli_fetch_assoc($colaboradores)) {
        echo "Email: " . $colab['email'] . " | Senha: " . $colab['senha'] . "<br>";
    }
} else {
    echo "Nenhum colaborador cadastrado<br>";
}

// Testar função de login
echo "<h3>4. Testar Função de Login:</h3>";
function testarLogin($email, $senha) {
    $con = conectarBD();
    $sql = "SELECT id, nome, email FROM cadastroclientes WHERE email = ? AND senha = ?";
    $stmt = mysqli_prepare($con, $sql);
    
    if(!$stmt) {
        echo "❌ Erro no prepare<br>";
        return false;
    }
    
    mysqli_stmt_bind_param($stmt, "ss", $email, $senha);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $usuario = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    
    if($usuario) {
        echo "✅ Login bem-sucedido para: " . $usuario['email'] . "<br>";
        return $usuario;
    } else {
        echo "❌ Login falhou para: $email<br>";
        return false;
    }
}

// Testar com credenciais conhecidas
testarLogin('usuario', '123');
testarLogin('colab', '123');

// Criar usuários se não existirem
echo "<h3>5. Criar Usuários de Teste (se necessário):</h3>";
echo '<form method="post">
<input type="submit" name="criar_usuarios" value="Criar Usuários de Teste">
</form>';

if(isset($_POST['criar_usuarios'])) {
    // Cliente
    $sql_cliente = "INSERT IGNORE INTO cadastroclientes (nome, sobrenome, cpf, dataNascimento, telefone, email, senha) 
                   VALUES ('Usuário Teste', 'Silva', '123.456.789-00', '1990-01-01', '(11) 99999-9999', 'usuario', '123')";
    
    // Colaborador
    $sql_colab = "INSERT IGNORE INTO cadastrocolaboradores (nome, sobrenome, cpf, dataNascimento, telefone, email, senha, cargo, salario) 
                 VALUES ('Colaborador Teste', 'Santos', '987.654.321-00', '1985-01-01', '(11) 88888-8888', 'colab', '123', 'Administrador', 3000.00)";
    
    if(mysqli_query($con, $sql_cliente)) {
        echo "✅ Usuário cliente criado<br>";
    } else {
        echo "❌ Erro ao criar cliente: " . mysqli_error($con) . "<br>";
    }
    
    if(mysqli_query($con, $sql_colab)) {
        echo "✅ Usuário colaborador criado<br>";
    } else {
        echo "❌ Erro ao criar colaborador: " . mysqli_error($con) . "<br>";
    }
}

mysqli_close($con);

echo "<hr><h3>🔗 Links para Teste:</h3>";
echo '<a href="login.php">🔐 Testar Login Cliente</a><br>';
echo '<a href="loginColaborador.php">👥 Testar Login Colaborador</a>';
?>