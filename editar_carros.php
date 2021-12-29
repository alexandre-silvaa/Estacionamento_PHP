<?php
error_reporting(0);
ini_set('display_errors', 0 );           
?>

<?php
require_once('conexao.php');
$totplaca=0;
$PLA=0;
 

if(isset($_GET["id_carros"])) 
{
	$id_carros=$_GET["id_carros"];
}
elseif(isset($_POST["id_carros"]))
{
	$id_carros=$_POST["id_carros"];
}	
else
echo "ERRO";


    $query_select_carros1="SELECT * FROM tb_carros";
    $sql_select_carros1=mysqli_query($conexao, $query_select_carros1);

	$query_select_carros_id="SELECT * FROM tb_carros WHERE id_carros=$id_carros";
	$sql_select_carros_id=mysqli_query($conexao, $query_select_carros_id);
  
	if($sql_select_carros_id == false)
	{
		
		echo "FALHA AO CONSULTAR CONTATO, FAVOR ENTRAR EM CONTATO COM O ADMINISTRADOR";
		exit;
	}
	
	while($array_select_carros_id=mysqli_fetch_array($sql_select_carros_id))
	{
		$id_carros=$array_select_carros_id["id_carros"];
		$placa=$array_select_carros_id["placa"];
		$PLACA_V=$placa;
		$cor=$array_select_carros_id["cor"];
		$marca= $array_select_carros_id["marca"] ;
		$montadora=$array_select_carros_id['montadora'];
		$combustivel=$array_select_carros_id["combustivel"];
		$ano=$array_select_carros_id["ano"];
		$id_contatos=$array_select_carros_id["id_contatos"];		
	}
	if(isset($_POST['submit_editar']))
	{
	     $id_carros=$_POST['id_carros'];
	     $placa=$_POST['placa'];
	     $cor=$_POST['cor'];
	     $marca=strtoupper($_POST['marca']);	
         $montadora=$_POST['montadora'];		 
		 $combustivel=$_POST['combustivel'];
		 $ano=$_POST['ano'];
		 $id_contatos=$_POST['id_contato'];
		 
		 if(mysqli_num_rows($sql_select_carros1) > 0)
     	{
		while($array_select_carros=mysqli_fetch_array($sql_select_carros1))
			{
				$placa1=$array_select_carros["placa"];
					if ($placa1==$placa)
					 $totplaca=$totplaca+1; 
			}
			if($placa!=$PLACA_V)
			{
				if ($totplaca>=1) 
					
				{
					echo"<script type=\"text/javascript\">alert('PLACA JÁ CADASTRADA');</script>";    
					$PLA=1;	
				}  
			}

		 	IF ($PLA==0)
			{
				$query_update="UPDATE tb_carros SET placa='$placa',cor='$cor',marca='$marca',montadora='$montadora',combustivel='$combustivel',ano='$ano',id_contatos='$id_contatos' WHERE id_carros=$id_carros";
			
				$sql_update=mysqli_query($conexao, $query_update);
				if($sql_update == true)
				{
					echo"<script type=\"text/javascript\">alert('DADOS EDITADOS COM SUCESSO');</script>";
					header("Location:carros.php");
				}
				else
				echo"<script type=\"text/javascript\">alert('FALHA AO EDITAR, ENTRE EM CONTATO COM O ADMINISTRADOR DO SITE');</script>";	 		 		 
	     	}
		 
	}	 
}	 
if(isset($_POST['submit_deletar']))
	{

  $id_contato=$_GET["id_carros"];
  //$query="DELETE FROM tb_contatos WHERE id_contato={$_GET['id_contato']}";
  $query="DELETE FROM tb_carros WHERE id_carros=$id_carros";
  $sql=mysqli_query($conexao, $query);
  
  if($sql)
  {
	  header("Location:carros.php");
  }
  else
  {
	echo"<script type=\"text/javascript\">alert('FALHA AO DELETAR. ENTRE EM CONTATO COM O ADMINISTRADOR DO SITE');</script>";    
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

    <title>Editar carro</title>

    <link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  </head>

  <body class="text-center">
 	<main class="form-signin">
	 	<p class="fs-2">Editar dados do carro</p>
		<form action="" method="post">
		 	<div class="form-floating">
		 		<input type="hidden" class="form-control" name="id_carros" id="floatingInput" value="<?php echo $id_carros;?>"/>
    			<input type="text" name="placa" class="form-control" id="floatingInput" onblur=validaPlaca(this.value) value="<?php print($placa);?>"/>
				<label for="placa">Placa</label>
      		</div>

			<div class="form-floating">
  				<input type="text" class="form-control" name="cor" pattern="[A-Z\s]+$" id="floatingInput" value="<?=$cor;?>"/>
				<label for="cor">Cor</label>
			</div>
		
			<div class="form-floating">
    			<input type="text" class="form-control" name="marca" id="floatingInput" value="<?php echo $marca?>"/>
				<label for="marca">Modelo</label>
			</div>

			<div class="form-floating">
				<input type="text" class="form-control" name="montadora" id="floatingInput" pattern="[A-Z\s]+$" value="<?php print($montadora)?>" />
   		 		<label for="montadora">Montadora</label>
			</div>

			<div class="form-row">
				<select class="form-control" name="combustivel" id="inlineFormCustomSelect" value="<?php print($combustivel)?>">
					<option selected>Combustível...</option>
					<option value="Gasolina">Gasolina</option>
					<option value="Alcool">Álcool</option>
					<option value="Diesel">Diesel</option>
				</select>
			</div>

			<div class="form-floating">
				<input type="text" class="form-control" name="ano" id="floatingInput" value="<?php print($ano)?>" />
   		 		<label for="ano">Ano</label>
			</div>

			<div class="form-row">
				<select name="id_contato" id="inlineFormCustomSelect" class="form-control">
					<option selected>Contato...</option>
					<?php
						$query_select_contatos="SELECT id_contato,nome FROM tb_contatos";
						$sql_select_contatos=mysqli_query($conexao, $query_select_contatos);
			
						if(mysqli_num_rows($sql_select_contatos) > 0)
							{
							while($array_select_contatos=mysqli_fetch_array($sql_select_contatos))
							
							{
									$id_contato=$array_select_contatos["id_contato"];
									$nome=$array_select_contatos["nome"];
									echo '<option value="'; echo  $array_select_contatos["id_contato"]; 
									echo '">'; echo $array_select_contatos["nome"];
									echo '</option>';
								}
							
							}
						echo '</select> '; echo '<br>'; 
					?>

			</div>	

			<button type="submit" name="submit_editar" id="editar" class="btn btn-success" onclick="return confirm('Deseja gravar carro?');">Gravar alterações</button>
			<button type="submit" name="submit_deletar" id="deletar" class="btn btn-danger"  onclick="return confirm('Deseja deletar carro?');">Deletar</button>

		 </form>
	 </main>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>


</body>
</html>
