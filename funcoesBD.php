<?php

function conectarBD(){
    $conexao = mysqli_connect("localhost", "root", "", "petadocao2");
    return($conexao);
}

function inserirCliente ($nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $senha){
    $conexao = conectarBD();
    $consulta = "INSERT INTO cadastroclientes (nome, sobrenome, cpf, dataNascimento, telefone, email, senha)
    VALUES ('$nome', '$sobrenome', '$cpf', '$dataNascimento', '$telefone', '$email', '$senha')";
    mysqli_query($conexao, $consulta);
}

function inserirContato ($nome, $email, $telefone, $assunto, $mensagem){
    $conexao = conectarBD();
    $consulta = "INSERT INTO contato (nome, email, telefone, assunto, mensagem)
    VALUES ('$nome', '$email', '$telefone', '$assunto', '$mensagem')";
    mysqli_query($conexao, $consulta);
}

function inserirPet ($nome, $dataNascimento, $idade, $raca, $cor){
    $conexao = conectarBD();
    $consulta = "INSERT INTO cadastroanimais (nome, dataNascimento, idade, raca, cor)
    VALUES ('$nome', '$dataNascimento', '$idade', '$raca', '$cor')";
    mysqli_query($conexao, $consulta);
}

function inserirColaborador ($nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $senha, $cargo, $salario){
    $conexao = conectarBD();
    $consulta = "INSERT INTO cadastrocolaboradores (nome, sobrenome, cpf, dataNascimento, telefone, email, senha, cargo, salario)
    VALUES ('$nome', '$sobrenome', '$cpf', '$dataNascimento', '$telefone', '$email', '$senha', '$cargo', '$salario')";
    mysqli_query($conexao, $consulta);
}

function inserirDoador ($nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $quantidadedeanimais, $motivodedoacao, $datadoacao){
    $conexao = conectarBD();
    $consulta = "INSERT INTO cadastrodoadores (nome, sobrenome, cpf, dataNascimento, telefone, email, quantidadedeanimais, motivodedoacao, datadoacao)
    VALUES ('$nome', '$sobrenome', '$cpf', '$dataNascimento', '$telefone', '$email', '$quantidadedeanimais', '$motivodedoacao', '$datadoacao')";
    mysqli_query($conexao, $consulta);
}


?>

