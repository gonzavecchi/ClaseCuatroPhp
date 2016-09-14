<?php
	class Estacionamiento
	{
		function __construct()
		{

		}

	 public static function Guardar($patente)
	  {
	  	$miArchivo=fopen("Estacionado.txt","a");//creamos variable del tipo archivo , con a leo escribo y no sobrescribo
	  	$fecha=date("Y-m-d H:i:s");
	  	$renglon="$patente"."=>"."$fecha"."\n";
	  	fwrite($miArchivo,$renglon); //puntero al archivo y el string enviado
	  		echo"<br>";
	  		echo"la patente: ".$patente ." fue guardado!";
	  	fclose($miArchivo);
	  }

 	public static function Leer()
	  {	
	  	$listadoAutos=array();
		$miArchivo=fopen("Estacionado.txt","r");
		while (!(feof($miArchivo)))
		{
			$renglon=fgets($miArchivo);
			$auto=explode("=>",$renglon);
			if($auto[0]!="")
			$listadoAutos[]=$auto; //agregamos el elemento a el listado de autos, ossea un elemento al array
		}
		fclose($miArchivo);

		return $listadoAutos;

	  } 

	  public static function Sacar($patente)
	  {
	  	$listadoEstacionados=Estacionamiento::Leer();
	  		foreach ($listadoEstacionados as $auto ) {
	  			if($auto[0]==$patente)
	  			{
	  				$inicio=$auto[1];
	  				$ahora=date("Y-m-d H:i:s");
	  				$diferencia=strtotime($ahora)-strtotime($inicio);
	  				$importe=$diferencia*10;//se guarda en ticket.txt y se quita de Estacionado.txt

	  				echo "<br>" . " Debe abonar: $".$importe;
	  			}
	  		}
	  }
	}
?>