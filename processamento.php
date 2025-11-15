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

//Cadastro contato


if(!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['telefone']) && !empty($_POST['assunto']) && !empty($_POST['mensagem'])){

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

//echo "Nome: " .$nome;

inserirContato($nome, $email, $telefone, $assunto, $mensagem);

header('location:Contato.php');
die();

}

//Cadastro de animais


if(!empty($_POST['nome']) && !empty($_POST['dataNascimento']) && !empty($_POST['idade']) && !empty($_POST['raca']) && !empty($_POST['cor'])){


$nome = $_POST['nome'];
$dataNascimento = $_POST['dataNascimento'];
$idade = $_POST['idade'];
$raca = $_POST['raca'];
$cor = $_POST['cor'];


//echo "Nome: " .$nome;

inserirAnimais($nome, $dataNascimento, $idade, $raca, $cor);

header('location:CadastrarPet.php');
die();

}

//Cadastro de colaboradores


if(!empty($_POST['nome']) && !empty($_POST['sobrenome']) && !empty($_POST['cpf']) && !empty($_POST['dataNascimento']) && !empty($_POST['telefone']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['cargo']) && !empty($_POST['salario'])){


$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$dataNascimento = $_POST['dataNascimento'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cargo = $_POST['cargo'];
$salario = $_POST['salario'];


//echo "Nome: " .$nome;

inserirColaboradores($nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $senha, $cargo, $salario);

header('location:CadastrarColaborador.php');
die();

}

//Cadastro de doadores


if(!empty($_POST['nome']) && !empty($_POST['sobrenome']) && !empty($_POST['cpf']) && !empty($_POST['dataNascimento']) && !empty($_POST['telefone']) && !empty($_POST['email']) && !empty($_POST['quantidadedeanimais']) && !empty($_POST['motivodedoacao']) && !empty($_POST['datadoacao'])){


$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$dataNascimento = $_POST['dataNascimento'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$quantidadedeanimais = $_POST['quantidadedeanimais'];
$motivodedoacao = $_POST['motivodedoacao'];
$datadoacao = $_POST['datadoacao'];


//echo "Nome: " .$nome;

inserirDoadores($nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $quantidadedeanimais, $motivodedoacao, $datadoacao);

header('location:CadastrarDoadores.php');
die();

}







?>

 