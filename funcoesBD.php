<?php

function conectarBD(){
    $conexao = mysqli_connect("localhost", "root", "", "petadocao");
    return($conexao);
}

function inserirCliente ($nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $senha){
    $conexao = conectarBD();
    $consulta = "INSERT INTO cliente (nome, sobrenome, cpf, dataNascimento, telefone, email, senha)
    VALUES ('$nome', '$sobrenome', '$cpf', '$dataNascimento', '$telefone', '$email', '$senha')";
    mysqli_query($conexao, $consulta);
}

?>

