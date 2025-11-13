<?php


session_start();
require "funcoesBD.php";

//Cadastro de Cliente
if(!empty($_POST['inputnome']) && !empty($_POST['inputsobrenome']) && !empty($_POST['inputcpf']) && !empty($_POST['inputdataNascimento']) && !empty($_POST['inputtelefone']) && !empty($_POST['inputemail']) && !empty($_POST['inputsenha'])){


$nome = $_POST['inputnome'];
$sobrenome = $_POST['inputsobrenome'];
$cpf = $_POST['inputcpf'];
$dataNascimento = $_POST['dataNascimento'];
$telefone = $_POST['inputtelefone'];
$email = $_POST['inputemail'];
$senha = $_POST['inputsenha'];

inserirCliente($nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $senha);

echo "Nome: " .$nome . "Sobrenome". $sobrenome. "CPF". $cpf. "Data de nascimento". $dataNascimento "Telefone". $telefone. "Email". $email. "Senha". $senha; 

header('location:CadastrarCliente.php');
die();

}

?>

 