<?php
error_reporting(0);
ini_set('display_errors', 0 );           
?>

<?php
require_once('conexao.php');
if(isset($_GET["id_contato"]))
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