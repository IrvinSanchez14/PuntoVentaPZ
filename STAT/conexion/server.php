<?php
	//clase para conectar a base de datos
	class Conexion
	{
		public function Ejecutar($query)
		{
			// metodo de conexion
			$con=mysql_connect("173.255.192.4","irvin","1234") or die ("error en la conexion");
			//seleccionando base de datos
			mysql_select_db("pizzeria",$con) or die ("error en la base de datos");
			//otorgandole el query a una variable
			$bdq= mysql_query($query);
			
			//cerrando la conexion
			mysql_close($con);

			//Devuelve la variable que muestra
			 return $bdq;
		}
	}

	
?>