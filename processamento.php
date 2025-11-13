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

echo "Nome: " .$nome . "Sobrenome". $sobrenome. "CPF". $cpf. "Data de nascimento". $dataNasc "Telefone". $telefone. "Email". $email. "Senha". $senha. ; 
}

//Cadastro de animais

if(!empty($_POST['inputnome']) && !empty($_POST['inputdataNascimento']) && !empty($_POST['inputidade']) && !empty($_POST['inputraca']) && !empty($_POST['inputcor'])){

$nome = $_POST['inputnome'];
$dataNascimento = $_POST['dataNascimento'];
$idade = $_POST['inputidade'];
$raca = $_POST['inputraca'];
$cor = $_POST['inputcor'];

echo "Nome: " .$nome

}

//Cadastro de colaboradores

if(!empty($_POST['inputnome']) && !empty($_POST['inputsobrenome']) && !empty($_POST['inputcpf']) && !empty($_POST['inputdataNascimento']) && !empty($_POST['inputtelefone']) && !empty($_POST['inputemail']) && !empty($_POST['inputsenha']) && !empty($_POST['inputcargo']) && !empty($_POST['inputsalario'])){

$nome = $_POST['inputnome'];
$sobrenome = $_POST['inputsobrenome'];
$cpf = $_POST['inputcpf'];
$dataNascimento = $_POST['dataNascimento'];
$telefone = $_POST['inputtelefone'];
$email = $_POST['inputemail'];
$senha = $_POST['inputsenha'];
$cargo = $_POST['inputcargo'];
$salario = $_POST['inputsalario'];

echo "Nome: " .$nome

}

//Cadastro de doadores

if(!empty($_POST['inputnome']) && !empty($_POST['inputsobrenome']) && !empty($_POST['inputcpf']) && !empty($_POST['inputdataNascimento']) && !empty($_POST['inputtelefone']) && !empty($_POST['inputemail']) && !empty($_POST['inputquantidadedeanimais']) && !empty($_POST['inputmotivodedoacao']) && !empty($_POST['inputdatadoacao'])){


$nome = $_POST['inputnome'];
$sobrenome = $_POST['inputsobrenome'];
$cpf = $_POST['inputcpf'];
$dataNascimento = $_POST['dataNascimento'];
$telefone = $_POST['inputtelefone'];
$email = $_POST['inputemail'];
$quantidadedeanimais = $_POST['inputquantidadedeanimais'];
$motivodedoacao = $_POST['inputmotivodedoacao'];
$datadoacao = $_POST['inputdatadoacao'];

echo "Nome: " .$nome

}

//Cadastro contato

if(!empty($_POST['inputnome']) && !empty($_POST['inputemail']) && !empty($_POST['inputtelefone']) && !empty($_POST['inputassunto']) && !empty($_POST['inputmensagem'])){


$nome = $_POST['inputnome'];
$email = $_POST['inputemail'];
$telefone = $_POST['inputtelefone'];
$assunto = $_POST['inputassunto'];
$mensagem = $_POST['mensagem'];

echo "Nome: " .$nome

}

header('location:CadastrarCliente.php');
die();

?>

 