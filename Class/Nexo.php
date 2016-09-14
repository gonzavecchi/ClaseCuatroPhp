<?php
 $patente = $_POST['patente'];
 $accion=$_POST['accion'];

 echo "Patente: ".$patente;
 echo "<br>";	
  echo "Accion: ".$accion;



include "Estacionamiento.php";
if($accion=="Estacionar")
{
	Estacionamiento::Guardar($patente);

}
if($accion=="Salir")
{
	Estacionamiento::Sacar($patente);

}
//else
	//$miListado=array();
	//$miListado=Estacionamiento::Leer();
	//echo"<br>";
	//var_dump($miListado);
//header("location:../index.php"); 
?>