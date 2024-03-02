<?php
    include("conecta.php");
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];

    if ($altura && $peso != null) {
        $imc = $peso / (($altura/100) * 2);
        $classificacao = "";
    }
    $resultado = round($imc,2);

    switch (true) {
        case $resultado <= 18.5:
            $classificacao = "abaixo do peso";
            break;
        case $resultado > 18.5 && 25 > $resultado:
            $classificacao = "eutrofia(peso adequado)";
            break;
        case $resultado > 24.9 && 30 > $resultado:
            $classificacao = "sobrepeso";
            break;
        case $resultado > 29.9 && 35 > $resultado:
            $classificacao = "obesidade grau 1";
            break;
        case $resultado > 34.9 && 40 > $resultado:
            $classificacao = "obesidade grau 2";
            break;
        case $resultado >= 40:
            $classificacao = "obesidade extrema";
            break;
        default:
            echo"insira altura e peso";
            break;
    }

    $sql = "UPDATE pessoa_imc SET nome=?, idade=?, altura=?, peso=?, imc=?, classificacao=? WHERE id=?";
    $update = $conn->prepare($sql) or die($conn->error);

    if (!$update) {
        echo "Erro na atualização!".$conn->errno.'-'.$conn->error;
    }
    
    $update->bind_param('ssddssi', $nome, $idade, $altura, $peso, $resultado, $classificacao, $id);
    $update->execute();
    $update->close();
    header("Location: index.php");
?>