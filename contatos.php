<?php
error_reporting(0);
ini_set('display_errors', 0 );           
?>

<?php
require_once('conexao.php');


$query_select_contatos="SELECT * FROM tb_contatos";
$sql_select_contatos=mysqli_query($conexao, $query_select_contatos);
if($sql_select_contatos == false)
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
	<title>Agenda</title>


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

	<?php
	require('conexao.php');
    ?>
    
    <section class="container">
		<div class="container-fluid">
			<h2></br>Se cadastre em nossa agenda para receber as atualizações do seu possante em nosso estacionamento!</h2>
			<p class="fw-normal fs-5">Ao se cadastrar, você sempre recebrá uma notificação em seu email ou SMS sobre seu automóvel.</p>
		</div>
	</section>
	
	<main  class="container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">Sobrenome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">Celular</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <?php  
                if(mysqli_num_rows($sql_select_contatos) > 0){
                    while($array_select_contatos=mysqli_fetch_array($sql_select_contatos)){
                        $id_contato=$array_select_contatos["id_contato"];
                        $nome=$array_select_contatos["nome"];
                        $sobrenome=$array_select_contatos["sobrenome"];
                        $email=$array_select_contatos["email"];
                        $tel=$array_select_contatos["tel"];
                        $cel=$array_select_contatos["cel"];	

                        echo
                        "<tbody>
                            <tr>
                                <td>$nome</td>
                                <td>$sobrenome</td>
                                <td>$email</td>
                                <td>$tel</td>
                                <td>$cel</td>
                                <td><a href=\"./editar_contato.php?id_contato=$id_contato\"><button type='button' class='btn btn-info'>Editar</button></a></td>
                                <td><a href=\"./deletar_contato.php?id_contato=$id_contato\"><button type='button' class='btn btn-danger'>Deletar</button></a></td>
                            </tr>
                        </tbody>";
                    }
                }    
            ?>
        </table>

		<button type="button" class="btn btn-success" onclick="window.location.href='inserir_contato.php'">Adicionar contato</button>

	</main>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</body>
</html>