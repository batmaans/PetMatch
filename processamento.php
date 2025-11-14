<?php


session_start();
require "funcoesBD.php";

//Cadastro de Cliente
if(!empty($_POST['nome']) && !empty($_POST['sobrenome']) && !empty($_POST['cpf']) && !empty($_POST['dataNascimento']) && !empty($_POST['telefone']) && !empty($_POST['email']) && !empty($_POST['senha'])){


$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$dataNascimento = $_POST['dataNascimento'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];

inserirCliente($nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $senha);

//echo "Nome: ". $nome. "Sobrenome: ". $sobrenome. "CPF: ". $cpf. "Data de nascimento: ". $dataNascimento. "Telefone: ". $telefone. "Email: ". $email. "Senha: ". $senha; 

header('location:CadastrarCliente.php');
die();

}

?>

 