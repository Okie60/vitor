<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>crud | CADASTRO</title>
    </head>
    <body class="p-3 mb-2 bg-secondary text-white" style="margin: 30px">
        <center><h1 >crud</h1></center>
        <hr/>
        </br>
        <center>
            <form action="cadnome.php" method="post">
                <label class="form-floating mb-3">NOME</label>
                <input type="text" class="form-control" name="nome" placeholder="Insira um nome" required>
                <br>
                <label class="form-floating mb-3">IDADE</label>
                <input type="number" class="form-control" name="idade" placeholder="Insira a idade" required>
                <br>
                <label class="form-floating mb-3">ALTURA</label>
                <input type="float" class="form-control" name="altura" placeholder="Insira a altura" required>
                <br>
                <label class="form-floating mb-3">PESO</label>
                <input type="float" class="form-control" name="peso" placeholder="Insira o peso" required>
                <br>
                <?php
                include("conecta.php");
            
                $altura = $_POST['altura'];
                $peso = $_POST['peso'];
                $imc = $_POST['imc'];
                $classificacao = $_POST['classificacao'];
                    
                    if ($altura && $peso != null) {
                        $imc = $peso / 2*$altura;
                        $classificacao ='';
                    }

                    switch ($classificacao) {
                        case $imc <= 18.5:
                            $classificacao = "abaixo do peso";
                            break;
                        case $imc > 18.5 & 25 > $imc:
                            $classificacao = "eutrofia(peso adequado)";
                            break;
                        case $imc > 24.9 & 30 > $imc:
                            $classificacao = "sobrepeso";
                            break;
                        case $imc > 29.9 & 35 > $imc:
                            $classificacao = "obesidade grau 1";
                            break;
                        case $imc > 34.9 & 40 > $imc:
                            $classificacao = "obesidade grau 2";
                            break;
                        case $imc >= 40:
                            $classificacao = "obesidade extrema";
                            break;
                        default:
                            echo"insira altura e peso";
                            break;
                    }
                ?>
                <br>
                <label class="form-floating mb-3">IMC</label>
                <br>
                <?php
                    echo $peso / 2*$altura;
                ?>
                <br>
                <label class="form-floating mb-3">CLASSIFICAÇÃO</label>
                <br>
                <?php
                    echo $classificacao;
                ?>
                <br>

                <button type="submit" class="btn btn-outline-info">INSERIR</button>
            </form>
        </center>
    </body>
</html>