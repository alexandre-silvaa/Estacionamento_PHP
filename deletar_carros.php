<?php
error_reporting(0);
ini_set('display_errors', 0 );           
?>

<?php
require_once('conexao.php');
if(isset($_GET["id_carros"]))
{
	
  $id_carros=$_GET["id_carros"];
  //$query="DELETE FROM tb_carros WHERE id_carros={$_GET['id_carros']}";
  $query="DELETE FROM tb_carros WHERE id_carros=$id_carros";
  $sql=mysqli_query($conexao, $query);
  
  if($sql)
  {
    echo"<script type=\"text/javascript\">alert('Cadastro deletado com sucesso!');</script>";
	  header("Location:carros.php");
  }
  else
  {
	echo"<script type=\"text/javascript\">alert('FALHA AO DELETAR.ENTRE EM CONTATO COM O ADMINISTRADOR DO SITE');</script>";    
	exit;
  }
}



?>