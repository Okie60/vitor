<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>crud</title>
    </head>
    <body class="p-3 mb-2 bg-secondary text-white" style="margin: 30px">
        <center><h1>crud</h1></center>
        <hr/>
        </br>
        <center><a href="cadastro.php" class="btn btn-outline-info" tabindex="-1" role="button" aria-disabled="true">Cadastrar novo nome</a></center>
        </br>
        <center>
            <table class="table table-info table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'conecta.php';
                        $nomes = mysqli_query($conn, "SELECT * FROM pessoa");
                        $row = mysqli_num_rows($nomes);
                        if ($row > 0) {
                            while ($registro = $nomes->fetch_array()) {
                                $id = $registro['id'];
                                echo '<tr>';
                                    echo '<td>'.$registro['id'].'</td>';
                                    echo '<td>'.$registro['nome'].'</td>';
                                    echo '<td>'.$registro['idade'].'</td>';
                                    echo '<td><a href="editar.php?id='.$id.'">Editar</a> | <a href="excluir.php?id='.$id.'">Excluir</a></td>';
                                echo '</tr>';
                            }
                            echo '</tbody>';
                            echo '</teble>';
                        }else{
                            echo "Não existem nomes cadastrados";
                            echo '</tbody>';
                            echo '</teble>';
                        }
                    ?>
        </center>
    </body>
</html>