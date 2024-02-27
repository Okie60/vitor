<?php
    include 'conecta.php';
    include 'cadastro.php';

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
        
    if ($altura && $peso != null) {
        $imc = doubleval($peso) / (2*doubleval($altura));
        $classificacao ="";
    }

    switch ($classificacao) {
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
    

    $querry = $conn->query("SELECT * FROM pessoa_imc WHERE nome='$nome' AND idade='$idade' AND altura='$altura' AND peso='$peso' AND imc='$imc' AND classificacao='$classificacao'");

    if (mysqli_num_rows($querry) > 0) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Nome já existe em nossa base de dados!');
        window.location.href='cadastro.php'
        </script>'";
    }else {
        $sql = "INSERT INTO pessoa_imc(nome, idade, altura, peso, imc, classificacao) VALUES ('$nome', '$idade', '$altura', '$peso', '$imc', '$classificacao')";
        if (mysqli_query($conn, $sql)) {
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados gravados com sucesso!');
            window.location.href='index.php'
            </script>'";
        }
    }
    mysqli_close($conn);
?>