<?php

function conectarBD(){
    $conexao = mysqli_connect("localhost", "root", "", "petadocao");
    return($conexao);
}

?>

