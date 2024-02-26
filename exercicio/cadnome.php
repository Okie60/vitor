<?php
    include 'conecta.php';
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $imc = $_POST['imc'];
    $classificacao = $_POST['classificacao'];
    $querry = $conn->query("SELECT * FROM pessoa_imc WHERE nome='$nome', idade='$idade', altura='$altura', peso='$peso', imc='$imc' AND classificacao='$classificacao'");

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