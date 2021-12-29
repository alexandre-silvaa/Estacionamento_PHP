<?php
error_reporting(0);
ini_set('display_errors', 0 );           
?>

<?php
require_once('conexao.php');
if(isset($_POST["inserir"])) 
{
	$nome=$_POST["nome"];
	$sobrenome=$_POST["sobrenome"];
	$email=$_POST["email"];
	$telefone=$_POST["tel"];
	$celular=$_POST["cel"];
	
	$query_inserir_contato="INSERT INTO tb_contatos (id_contato,nome,sobrenome,email,tel,cel) VALUES (NULL,'$nome','$sobrenome','$email','$telefone','$celular')";
	
	$sql_inserir_contato=mysqli_query($conexao, $query_inserir_contato);
	
	if($sql_inserir_contato)
	header("Location:contatos.php");
	else
	echo "FALHA AO CADASTRAR O CONTATO";	

}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
	  <meta charset="UTF-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Adicionar contato</title>

	  <link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  </head>
  <body class="text-center">
    <main class="form-signin">
      <p class="fs-2">Adicionar dados</p>
      <form action="" method="POST">

        <div class="form-floating">
          <input type="hidden" class="form-control" name="id_contato" id="floatingInput" value="<?php echo $id_contato;?>"/>
          <input type="text" name="nome" class="form-control" id="floatingInput" value="<?php print($nome);?>"/>
          <label for="nome">Nome</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control" name="sobrenome"  id="floatingInput" value="<?=$sobrenome;?>"/>
          <label for="sobrenome">Sobrenome</label>
        </div>
      
        <div class="form-floating">
            <input type="text" class="form-control" name="email" id="floatingInput" value="<?php echo $email?>"/>
          <label for="email">Email</label>
        </div>

        <div class="form-floating">
          <input type="text" class="form-control" name="tel" id="floatingInput" value="<?php print($tel)?>" />
            <label for="tel">Telefone</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control" name="cel" id="floatingInput" value="<?php print($cel)?>"/>
          <label for="cel">Celular</label>
        </div>

        <button type="submit" name="inserir" id="inserir" class="btn btn-success">Adicionar</button>
      </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  </body>
</html>
