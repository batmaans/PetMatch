<?php
function conectarBD(){
    $con = mysqli_connect("localhost", "root", "", "petadocao2");
    if(!$con){
        return false;
    }
    mysqli_set_charset($con, "utf8mb4");
    return $con;
}

function inserirCliente($nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $senha){
    $con = conectarBD();
    if(!$con) return false;
    $sql = "INSERT INTO cadastroclientes (nome, sobrenome, cpf, dataNascimento, telefone, email, senha) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    if(!$stmt) {
        mysqli_close($con);
        return false;
    }
    mysqli_stmt_bind_param($stmt, "sssssss", $nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $senha);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    return $ok;
}

function inserirContato($nome, $email, $telefone, $assunto, $mensagem){
    $con = conectarBD();
    if(!$con) return false;
    $sql = "INSERT INTO contato (nome, email, telefone, assunto, mensagem) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    if(!$stmt) {
        mysqli_close($con);
        return false;
    }
    mysqli_stmt_bind_param($stmt, "sssss", $nome, $email, $telefone, $assunto, $mensagem);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    return $ok;
}

function inserirPet($nome, $dataNascimento, $idade, $raca, $cor){
    $con = conectarBD();
    if(!$con) return false;
    $sql = "INSERT INTO cadastroanimais (nome, dataNascimento, idade, raca, cor) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    if(!$stmt) {
        mysqli_close($con);
        return false;
    }
    mysqli_stmt_bind_param($stmt, "ssiss", $nome, $dataNascimento, $idade, $raca, $cor);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    return $ok;
}

function inserirColaborador($nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $senha, $cargo, $salario){
    $con = conectarBD();
    if(!$con) return false;
    $sql = "INSERT INTO cadastrocolaboradores (nome, sobrenome, cpf, dataNascimento, telefone, email, senha, cargo, salario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    if(!$stmt) {
        mysqli_close($con);
        return false;
    }
    mysqli_stmt_bind_param($stmt, "ssssssssd", $nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $senha, $cargo, $salario);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    return $ok;
}

function inserirDoador($nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $quantidadedeanimais, $motivodedoacao, $datadoacao){
    $con = conectarBD();
    if(!$con) return false;
    $sql = "INSERT INTO cadastrodoadores (nome, sobrenome, cpf, dataNascimento, telefone, email, quantidadedeanimais, motivodedoacao, datadoacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    if(!$stmt) {
        mysqli_close($con);
        return false;
    }
    mysqli_stmt_bind_param($stmt, "sssssisis", $nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $quantidadedeanimais, $motivodedoacao, $datadoacao);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    return $ok;
}

function retornarCliente(){
    $con = conectarBD();
    if(!$con) return false;
    $sql = "SELECT nome, sobrenome, cpf, dataNascimento, telefone, email FROM cadastroclientes ORDER BY nome";
    $res = mysqli_query($con, $sql);
    return $res;
}

function retornarPets(){
    $con = conectarBD();
    if(!$con) return false;
    $sql = "SELECT nome, dataNascimento, idade, raca, cor FROM cadastroanimais ORDER BY nome";
    $res = mysqli_query($con, $sql);
    return $res;
}

function retornarDoadores(){
    $con = conectarBD();
    if(!$con) return false;
    $sql = "SELECT nome, sobrenome, cpf, dataNascimento, telefone, email, quantidadedeanimais, motivodedoacao, datadoacao FROM cadastrodoadores ORDER BY nome";
    $res = mysqli_query($con, $sql);
    return $res;
}

function retornarColaboradores(){
    $con = conectarBD();
    if(!$con) return false;
    $sql = "SELECT nome, sobrenome, cpf, dataNascimento, telefone, email, cargo, salario FROM cadastrocolaboradores ORDER BY nome";
    $res = mysqli_query($con, $sql);
    return $res;
}

function retornarContatos(){
    $con = conectarBD();
    if(!$con) return false;
    $sql = "SELECT id, nome, email, telefone, assunto, mensagem, data_contato FROM contato ORDER BY data_contato DESC";
    $res = mysqli_query($con, $sql);
    return $res;
}

function contarContatosNaoLidos(){
    $con = conectarBD();
    if(!$con) return false;
    $sql = "SELECT COUNT(*) as total FROM contato WHERE lido = 0";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
    return $row['total'];
}

function verificarLogin($email, $senha){
    $con = conectarBD();
    if(!$con) return false;
    $sql = "SELECT id, nome, email FROM cadastroclientes WHERE email = ? AND senha = ?";
    $stmt = mysqli_prepare($con, $sql);
    if(!$stmt) {
        mysqli_close($con);
        return false;
    }
    mysqli_stmt_bind_param($stmt, "ss", $email, $senha);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $usuario = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    return $usuario;
}

function verificarLoginColaborador($email, $senha){
    $con = conectarBD();
    if(!$con) return false;
    $sql = "SELECT id, nome, email, cargo FROM cadastrocolaboradores WHERE email = ? AND senha = ?";
    $stmt = mysqli_prepare($con, $sql);
    if(!$stmt) {
        mysqli_close($con);
        return false;
    }
    mysqli_stmt_bind_param($stmt, "ss", $email, $senha);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $colaborador = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    return $colaborador;
}

function verificarEmailExiste($email){
    $con = conectarBD();
    if(!$con) return false;
    $sql = "SELECT id, nome FROM cadastroclientes WHERE email = ?";
    $stmt = mysqli_prepare($con, $sql);
    if(!$stmt) {
        mysqli_close($con);
        return false;
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $usuario = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    return $usuario;
}

function criarTokenRecuperacao($email, $token){
    $con = conectarBD();
    if(!$con) return false;
    $expiracao = date('Y-m-d H:i:s', strtotime('+1 hour'));
    $sql = "INSERT INTO tokens_recuperacao (email, token, expiracao) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    if(!$stmt) {
        mysqli_close($con);
        return false;
    }
    mysqli_stmt_bind_param($stmt, "sss", $email, $token, $expiracao);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    return $ok;
}

function verificarToken($token){
    $con = conectarBD();
    if(!$con) return false;
    $sql = "SELECT email FROM tokens_recuperacao WHERE token = ? AND expiracao > NOW() AND usado = 0";
    $stmt = mysqli_prepare($con, $sql);
    if(!$stmt) {
        mysqli_close($con);
        return false;
    }
    mysqli_stmt_bind_param($stmt, "s", $token);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $dados = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    return $dados;
}

function marcarTokenComoUsado($token){
    $con = conectarBD();
    if(!$con) return false;
    $sql = "UPDATE tokens_recuperacao SET usado = 1 WHERE token = ?";
    $stmt = mysqli_prepare($con, $sql);
    if(!$stmt) {
        mysqli_close($con);
        return false;
    }
    mysqli_stmt_bind_param($stmt, "s", $token);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    return $ok;
}

function atualizarSenha($email, $novaSenha){
    $con = conectarBD();
    if(!$con) return false;
    $sql = "UPDATE cadastroclientes SET senha = ? WHERE email = ?";
    $stmt = mysqli_prepare($con, $sql);
    if(!$stmt) {
        mysqli_close($con);
        return false;
    }
    mysqli_stmt_bind_param($stmt, "ss", $novaSenha, $email);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    return $ok;
}
?>