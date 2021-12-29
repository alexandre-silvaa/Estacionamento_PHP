<?php
error_reporting(0);
ini_set('display_errors', 0 );           

require_once('conexao.php');

$query_select_carros="SELECT tb_carros.id_carros,tb_carros.placa,tb_carros.cor,tb_carros.marca,tb_carros.montadora,tb_carros.combustivel,tb_carros.ano,tb_carros.id_contatos,tb_contatos.id_contato,tb_contatos.nome FROM tb_carros,tb_contatos where tb_contatos.id_contato=tb_carros.id_contatos";
$sql_select_carros=mysqli_query($conexao, $query_select_carros);

$sql_select_carros=mysqli_query($conexao, $query_select_carros);
if($sql_select_carros == false)
	{
	echo "FALHA AO CONSULTAR A TABELA";
	exit;
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Carros</title>


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>

<header class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php"><img src="./images/xarc.png" alt="logo_xarc" width="50"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="carros.php">Carros</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="contatos.php">Contatos</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="sobre.php">Sobre</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="logout.php">Sair</a>
                        </li>
                    </ul>
                </div>
             </div>
            </nav>
        </header>	

    <section class="container">
		<div class="container-fluid">
			<h2></br>Cadastro de carros</h2>
			<p class="fw-normal fs-5">Ao cadastrar seu carro nosso estacionamento, você sempre não precisa se preocupar em pensar se seu carro está bem, mas receberá atualizações em seu email ou SMS sobre como está seu veículo em nosso local, sem se preocupar com seu possante! Tudo isso, graças ao XARC.</p>
		</div>
	</section>
	
	<main  class="container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Placa</th>
                <th scope="col">Cor</th>
                <th scope="col">Modelo</th>
                <th scope="col">Montadora</th>
                <th scope="col">Combustível</th>
                <th scope="col">Ano</th>
				<th scope="col">ID do Contato</th>
				<th scope="col">Ações</th>
                </tr>
            </thead>
            <?php  
                if(mysqli_num_rows($sql_select_carros) > 0)
				{
				   while($array_select_carros=mysqli_fetch_array($sql_select_carros))
					{
						$id_carros=$array_select_carros["id_carros"];
						$placa=$array_select_carros["placa"];
						$cor=$array_select_carros["cor"];
						$marca=$array_select_carros["marca"];
						$montadora=$array_select_carros["montadora"];
						$combustivel=$array_select_carros["combustivel"];
						$ano=$array_select_carros["ano"];
						$id_contatos=$array_select_carros["id_contatos"];										
						$nome=$array_select_carros["nome"];

                        echo
                        "<tbody>
                            <tr>
                                <td>$placa</td>
                                <td>$cor</td>
                                <td>$marca</td>
                                <td>$montadora</td>
                                <td>$combustivel</td>
								<td>$ano</td>
								<td>$id_contatos</td>
                                <td><a href=\"./editar_carros.php?id_carros=$id_carros\"><button type='button' class='btn btn-info'>Editar</button></a></td>
                                <td><a href=\"./deletar_carros.php?id_carros=$id_carros\"><button type='button' class='btn btn-danger'>Deletar</button></a></td>
                            </tr>
                        </tbody>";
                    }
                }    
            ?>
        </table>

		<button type="button" class="btn btn-success" onclick="window.location.href='inserir_carros.php'">Cadastrar carro</button>

	</main>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</body>
</html>