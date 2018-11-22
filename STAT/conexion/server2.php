<?php

class Conexionli
	{
		public function Ejecutari($query)
		{
			$con = mysqli_connect("173.255.192.4","irvin","1234") or die ("error en la conexion");
			mysqli_select_db($con,'pizzeria');
//
			$bdq= mysqli_query($con,$query);
			mysqli_close($con);

			return $bdq;



		}
	}
?>