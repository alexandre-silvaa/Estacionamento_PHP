<?php

//CONEXAO AO SERVIDOR
$conexao=mysqli_connect("localhost","root","");

mysqli_query($conexao, "SET NAMES 'utf8'"); 
mysqli_query($conexao, 'SET character_set_connection=utf8'); 
mysqli_query($conexao,'SET character_set_client=utf8'); 
mysqli_query($conexao,'SET character_set_results=utf8');
if($conexao != false)
{
 //echo "CONEXAO OK";
}
else
{
 echo "FALHA AO CONECTAR";
 exit; // TERMINA O PROGRAMA
}
 
$banco_de_dados=mysqli_select_db($conexao, "estacionamento");


//CONEXAO AO BANDO DE DADOS
if($banco_de_dados)
{
  //echo "CONECTADO AO BANCO DE DADOS";
}
else
{
  echo "FALHA AO CONECTAR AO BANCO DE DADOS";
  exit;
}
  
  
  
  

