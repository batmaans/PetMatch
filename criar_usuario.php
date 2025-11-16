<?php
function conectarBD(){
    $con = mysqli_connect("localhost", "root", "", "petadocao2");
    if(!$con){
        die("Erro na conexão: " . mysqli_connect_error());
    }
    mysqli_set_charset($con, "utf8mb4");
    return $con;
}

echo "<h2>Criando Usuário Cliente</h2>";

$con = conectarBD();

// SQL para criar o usuário
$sql = "INSERT IGNORE INTO cadastroclientes (
    nome, sobrenome, cpf, dataNascimento, telefone, email, senha
) VALUES (
    'Usuário', 'Teste', '123.456.789-00', '1990-01-01', '(11) 99999-9999', 'usuario', '123'
)";

if(mysqli_query($con, $sql)) {
    if(mysqli_affected_rows($con) > 0) {
        echo "✅ Usuário cliente criado com sucesso!<br>";
    } else {
        echo "ℹ️ Usuário já existe<br>";
    }
} else {
    echo "❌ Erro ao criar usuário: " . mysqli_error($con) . "<br>";
}

// Verificar usuários existentes
echo "<h3>Usuários existentes:</h3>";
$result = mysqli_query($con, "SELECT email, senha FROM cadastroclientes");
while($row = mysqli_fetch_assoc($result)) {
    echo "Email: " . $row['email'] . " | Senha: " . $row['senha'] . "<br>";
}

mysqli_close($con);

echo "<hr>";
echo '<a href="login.php">🔐 Testar Login</a>';
?>