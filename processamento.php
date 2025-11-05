<?php

session_start();
require_once "funcoesBD.php";

//Cadastro de Cliente
if(!empty($_POST['inputNome']) && !empty($_POST['inputSobrenome']) && !empty($_POST['inputCPF']) && !empty($_POST['inputDataNasc'])
   && !empty($_POST['inputTelefone']) && !empty($_POST['inputEmail']) && !empty($_POST['inputSenha']))
{

   $nome = $_POST['inputNome'];
   $sobrenome = $_POST['inputSobrenome'];
   $cpf = $_POST['inputCPF'];
   $dataNasc = $_POST['inputDataNasc'];
   $telefone = $_POST['inputTelefone'];
   $email = $_POST['inputEmail'];
   $senha = $_POST['inputSenha'];

   inserirCliente($cpf, $nome, $sobrenome, $dataNasc, $telefone, $email, $senha);

   header('location:../view/cadastrarCliente.php');
   die();

}

?>