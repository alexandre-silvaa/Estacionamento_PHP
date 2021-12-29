<?php
error_reporting(0);
ini_set('display_errors', 0 );           
?>

<?php
require_once('conexao.php');
$totplaca=0;
$PLA=0;

if(isset($_POST["adicionar"])) 
 {
    $query_select_carros="SELECT * FROM tb_carros";
    $sql_select_carros=mysqli_query($conexao, $query_select_carros);
 
 
 
	$placa=strtoupper($_POST["placa"]);
	$cor=$_POST["cor"];
	$marca=strtoupper($_POST["marca"]);
	$montadora=$_POST["montadora"];
	$combustivel=$_POST["combustivel"];
	$ano=$_POST["ano"];
	$id_contato=$_POST["id_contato"];
	
		
	if(mysqli_num_rows($sql_select_carros) > 0)
     {
		while($array_select_carros=mysqli_fetch_array($sql_select_carros))
			{
			  
				    $placa1=$array_select_carros["placa"];
					if ($placa1==$placa)
					 $totplaca=$totplaca+1;
					
				 

			}
			
	 }	
	
	if ($totplaca>=1)
	
   {
	   echo"<script type=\"text/javascript\">alert('Atenção! Placa já cadastrada. ');</script>";    
	   $PLA=1;
		
    }   
	
	 	
	 
	 
	IF ($PLA==0)
	{
	
	 $query_inserir_carros="INSERT INTO tb_carros (id_carros,placa,cor,marca,montadora,combustivel,ano,id_contatos) VALUES (NULL,'$placa','$cor','$marca','$montadora','$combustivel','$ano','$id_contato')";		
	 $sql_inserir_carros=mysqli_query($conexao, $query_inserir_carros); 
	 
	    if($sql_inserir_carros){
			echo"<script type=\"text/javascript\">alert('Dados cadastrados com sucesso!');</script>";
			header("Location: carros.php");
		}
		else
			echo "FALHA AO CADASTRAR O CARRO";	
	}
 }

?>


<script language='JavaScript'>
function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;     // 8 backspace e 0 null
	else  return false;
    }
}

function validaPlaca(placa)

{  

 placa = placa.toUpperCase(); 
 placaLen=placa.length;   
 letras="ABCDEFGHIJKLMNOPQRSTUWVXYZ";   
 numeros="1234567890"  
 for(i=0;i<=placaLen;i++)  
	 {	  
       if (i<=2)	 
		   {		
	         if(letras.indexOf(placa.charAt(i))==-1)	
				 {		
			        alert("Placa Inválida");
					document.formulario.placa.focus();	
					}	
			}	 

			else	
				{	
					if(numeros.indexOf(placa.charAt(i))==-1)	
						{			
							alert("Placa Inválida")	;
							document.formulario.placa.focus();		
						}	 
			   }  
		}
	}
</script>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastrar carros</title>

    <link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  </head>

  <body class="text-center">
    <main class="form-signin">
      <p class="fs-2">Adicionar dados</p>
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
        <button type="submit" name="adicionar" id="adicionar" class="btn btn-success">Adicionar</button>
      </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  </body>
</html>
