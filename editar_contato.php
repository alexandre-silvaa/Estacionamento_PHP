<?php
error_reporting(0);
ini_set('display_errors', 0 );           
?>

<?php
require_once('conexao.php');


if(isset($_GET["id_contato"])) 
{
	$id_contato=$_GET["id_contato"];
}
elseif(isset($_POST["id_contato"]))
{
	$id_contato=$_POST["id_contato"];
}	
else
echo "ERRO";



	$query_select_contato_id="SELECT * FROM tb_contatos WHERE id_contato=$id_contato";
	$sql_select_contato_id=mysqli_query($conexao, $query_select_contato_id);

	if($sql_select_contato_id == false)
	{
		
		echo "FALHA AO CONSULTAR CONTATO FAVOR ENTRAR EM CONTATO COM O ADMINISTRADOR";
		exit;
	}
	
	while($array_select_contato_id=mysqli_fetch_array($sql_select_contato_id))
	{
		$id_contato=$array_select_contato_id["id_contato"];
		$nome=$array_select_contato_id["nome"];
		$sobrenome=$array_select_contato_id["sobrenome"];
		$email=$array_select_contato_id["email"];
		$tel=$array_select_contato_id["tel"];
		$cel=$array_select_contato_id["cel"];	
	}
	if(isset($_POST['submit_editar']))
	{
	     $id_contato=$_POST['id_contato'];
	     $nome=$_POST['nome'];
	     $sobrenome=$_POST['sobrenome'];
	     $email=$_POST['email'];	     
		 $tel=$_POST['tel'];
		 $cel=$_POST['cel'];		 
		 
		 $query_update="UPDATE tb_contatos SET nome='$nome',sobrenome='$sobrenome',email='$email',tel='$tel',cel='$cel' WHERE id_contato=$id_contato";
		 
		 $sql_update=mysqli_query($conexao, $query_update);
		 if($sql_update == true)
		 {
		   echo"<script type=\"text/javascript\">alert('DADOS EDITADOS COM SUCESSO');</script>";
		    header("Location:contatos.php");
 
		 }
		 else
         echo"<script type=\"text/javascript\">alert('FALHA AO EDITAR.ENTRE EM CONTATO COM O ADMINISTRADOR DO SITE');</script>";	 		 		 
	}
if(isset($_POST['submit_deletar']))
	{
	
  
	
  $id_contato=$_GET["id_contato"];
  //$query="DELETE FROM tb_contatos WHERE id_contato={$_GET['id_contato']}";
  $query="DELETE FROM tb_contatos WHERE id_contato=$id_contato";
  $sql=mysqli_query($conexao, $query);
  
  if($sql)
  {
	   header("Location:contatos.php");
  }
  else
  {
	echo"<script type=\"text/javascript\">alert('FALHA AO DELETAR.ENTRE EM CONTATO COM O ADMINISTRADOR DO SITE');</script>";    
	exit;
  }
}

	    
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar contato</title>

    <link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  </head>

  <body class="text-center">
 	<main class="form-signin">
	 	<p class="fs-2">Editar dados</p>
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

			<button type="submit" name="submit_editar" id="editar" class="btn btn-success">Gravar alterações</button>
			<button type="submit" name="submit_deletar" id="deletar" class="btn btn-danger">Deletar</button>

		 </form>
	 </main>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
	</body>
</html>