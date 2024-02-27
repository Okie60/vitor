<?php
    include("conecta.php");
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];

    if ($altura && $peso != null) {
        $imc = doubleval($peso) / (2 * doubleval($altura));
        $classificacao = "";
    }

    switch (true) {
        case $imc <= 18.5:
            $classificacao = "abaixo do peso";
            break;
        case $imc > 18.5 && 25 > $imc:
            $classificacao = "eutrofia(peso adequado)";
            break;
        case $imc > 24.9 && 30 > $imc:
            $classificacao = "sobrepeso";
            break;
        case $imc > 29.9 && 35 > $imc:
            $classificacao = "obesidade grau 1";
            break;
        case $imc > 34.9 && 40 > $imc:
            $classificacao = "obesidade grau 2";
            break;
        case $imc >= 40:
            $classificacao = "obesidade extrema";
            break;
        default:
            echo"insira altura e peso";
            break;
    }

    $sql = "UPDATE pessoa SET nome=?, idade=?, altura=?, peso=?, imc=?, classificacao=? WHERE id=?";
    $update = $conn->prepare($sql) or die($conn->error);

    if (!$update) {
        echo "Erro na atualização!".$conn->errno.'-'.$conn->error;
    }
    
    $update->bind_param('ssddssi', $nome, $idade, $altura, $peso, $imc, $classificacao, $id);
    $update->execute();
    $update->close();
    header("Location: index.php");
?>