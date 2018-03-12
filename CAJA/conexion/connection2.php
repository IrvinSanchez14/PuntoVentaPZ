<?php

class Conexion
	{
		public function Ejecutar($query)
		{
			$con = mysqli_connect('173.255.192.4','irvin','1234') or die ("error en la conexion");
			mysqli_select_db($con,'mascota');
//
			$bdq= mysqli_query($con,$query);
			mysqli_close($con);

			return $bdq;
		}
	}
    
    class Conexion1
	{
		public function Ejecutar1($query)
		{
			$con = mysqli_connect('173.255.192.4','irvin','1234') or die ("error en la conexion");
			mysqli_select_db($con,'castanosn');
//
			$bdq= mysqli_query($con,$query);
			mysqli_close($con);

			return $bdq;
		}
	}
?>