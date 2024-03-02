<?php
    include 'conecta.php';
    include 'cadastro.php';

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
        
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    if ($altura && $peso != 0) {
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
    

    $querry = $conn->query("SELECT * FROM pessoa_imc WHERE nome='$nome' AND idade='$idade' AND altura='$altura' AND peso='$peso' AND imc='$resultado' AND classificacao='$classificacao'");

    if (mysqli_num_rows($querry) > 0) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Nome já existe em nossa base de dados!');
        window.location.href='cadastro.php'
        </script>'";
    }else {
        $sql = "INSERT INTO pessoa_imc(nome, idade, altura, peso, imc, classificacao) VALUES ('$nome', '$idade', '$altura', '$peso', '$resultado', '$classificacao')";
        if (mysqli_query($conn, $sql)) {
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados gravados com sucesso!');
            window.location.href='index.php'
            </script>'";
        }
    }
    mysqli_close($conn);
?>