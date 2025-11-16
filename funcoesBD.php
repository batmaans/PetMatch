<?php
// funcoesBD.php

function conectarBD(){
    // ajuste usuário/senha/host/db se necessário
    $con = mysqli_connect("localhost", "root", "", "petadocao2");
    if(!$con){
        die("Erro conexão MySQL: " . mysqli_connect_error());
    }
    // definir charset para evitar problemas com acentos
    mysqli_set_charset($con, "utf8mb4");
    return $con;
}

/* --- Funções de inserção usando prepared statements --- */
function inserirCliente($nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $senha){
    $con = conectarBD();
    $sql = "INSERT INTO cadastroclientes (nome, sobrenome, cpf, dataNascimento, telefone, email, senha) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sssssss", $nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $senha);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    return $ok;
}

function inserirContato($nome, $email, $telefone, $assunto, $mensagem){
    $con = conectarBD();
    $sql = "INSERT INTO contato (nome, email, telefone, assunto, mensagem) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $nome, $email, $telefone, $assunto, $mensagem);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    return $ok;
}

function inserirPet($nome, $dataNascimento, $idade, $raca, $cor){
    $con = conectarBD();
    $sql = "INSERT INTO cadastroanimais (nome, dataNascimento, idade, raca, cor) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssiss", $nome, $dataNascimento, $idade, $raca, $cor);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    return $ok;
}

function inserirColaborador($nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $senha, $cargo, $salario){
    $con = conectarBD();
    $sql = "INSERT INTO cadastrocolaboradores (nome, sobrenome, cpf, dataNascimento, telefone, email, senha, cargo, salario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssd", $nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $senha, $cargo, $salario);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    return $ok;
}

function inserirDoador($nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $quantidadedeanimais, $motivodedoacao, $datadoacao){
    $con = conectarBD();
    $sql = "INSERT INTO cadastrodoadores (nome, sobrenome, cpf, dataNascimento, telefone, email, quantidadedeanimais, motivodedoacao, datadoacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sssssisis", $nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $quantidadedeanimais, $motivodedoacao, $datadoacao);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    return $ok;
}

/* --- Funções de leitura --- */
function retornarCliente(){
    $con = conectarBD();
    $sql = "SELECT id, nome, sobrenome, cpf, dataNascimento, telefone, email FROM cadastroclientes ORDER BY nome";
    $res = mysqli_query($con, $sql);
    return $res;
}

/* --- Funções de inserção adicionais --- */
function inserirAnimais($nome, $dataNascimento, $idade, $raca, $cor){
    $con = conectarBD();
    $sql = "INSERT INTO cadastroanimais (nome, dataNascimento, idade, raca, cor) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssiss", $nome, $dataNascimento, $idade, $raca, $cor);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    return $ok;
}

function inserirColaboradores($nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $senha, $cargo, $salario){
    $con = conectarBD();
    $sql = "INSERT INTO cadastrocolaboradores (nome, sobrenome, cpf, dataNascimento, telefone, email, senha, cargo, salario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssd", $nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $senha, $cargo, $salario);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    return $ok;
}

function inserirDoadores($nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $quantidadedeanimais, $motivodedoacao, $datadoacao){
    $con = conectarBD();
    $sql = "INSERT INTO cadastrodoadores (nome, sobrenome, cpf, dataNascimento, telefone, email, quantidadedeanimais, motivodedoacao, datadoacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sssssisis", $nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $quantidadedeanimais, $motivodedoacao, $datadoacao);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    return $ok;
}

/* --- Funções de leitura adicionais --- */
function retornarPets(){
    $con = conectarBD();
    $sql = "SELECT id, nome, dataNascimento, idade, raca, cor FROM cadastroanimais ORDER BY nome";
    $res = mysqli_query($con, $sql);
    return $res;
}

function retornarDoadores(){
    $con = conectarBD();
    $sql = "SELECT id, nome, sobrenome, cpf, dataNascimento, telefone, email, quantidadedeanimais, motivodedoacao, datadoacao FROM cadastrodoadores ORDER BY nome";
    $res = mysqli_query($con, $sql);
    return $res;
}

function retornarColaboradores(){
    $con = conectarBD();
    $sql = "SELECT id, nome, sobrenome, cpf, dataNascimento, telefone, email, cargo, salario FROM cadastrocolaboradores ORDER BY nome";
    $res = mysqli_query($con, $sql);
    return $res;
}


function retornarContatos(){
    $con = conectarBD();
    $sql = "SELECT id, nome, email, telefone, assunto, mensagem, data_contato FROM contato ORDER BY data_contato DESC";
    $res = mysqli_query($con, $sql);
    return $res;
}

function contarContatosNaoLidos(){
    $con = conectarBD();
    $sql = "SELECT COUNT(*) as total FROM contato WHERE lido = 0";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
    return $row['total'];
}

?>

