<?php

function conectarBD(){
    $conexao = mysqli_connect("localhost", "root", "", "PetMatch");
    return($conexao);
}

function inserirCliente($cpf, $nome, $sobrenome, $dataNasc, $telefone, $email, $senha){
    $conexao = conectarBD();
    $consulta = "INSERT INTO cliente (cpf, nome, sobrenome, dataNascimento, telefone, email, senha)
                VALUES ('$cpf', '$nome', '$sobrenome', '$dataNasc', '$telefone', '$email', '$senha')";
    mysqli_query($conexao, $consulta);
}

?>/