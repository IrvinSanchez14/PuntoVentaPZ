<?php
function inventario_abs()
        {
		//importar el archivo de la conexion
			include_once('../conexion/connection.php');
		//crear objeto de conexion
		$con=new conexion();
		//realizar la consulta para cargar datos
		$query="select id_ingrediente,cantidad from inventario_sum";
			$bdq= $con->Ejecutar($query) or die ("error en la consulta");
		$datos_entradas= array();
		while ($row= mysqli_fetch_array($bdq)) {
			$datos_entradas[]=$row;
		}
		return $datos_entradas;
	}
	
	function boton_click()
        {
		//importar el archivo de la conexion
			include_once('../conexion/connection.php');
		//crear objeto de conexion
		$con=new conexion();
		//realizar la consulta para cargar datos
		$query="select * from click order by id_click DESC LIMIT 1";
			$bdq= $con->Ejecutar($query) or die ("error en la consulta");
		$click_but= array();
		while ($row= mysqli_fetch_array($bdq)) {
			$click_but[]=$row;
		}
		return $click_but;
	}
	
	function existencia_inventario()
        {
		//importar el archivo de la conexion
			include_once('../conexion/connection.php');
		//crear objeto de conexion
		$con=new conexion();
		//realizar la consulta para cargar datos
		$query="select nombre,sum(cantidad)as existencia from inventario_sum
				left join ingredientes using(ID_ingrediente)
				left join productos using(ID_producto)
				group by id_ingrediente";
			$bdq= $con->Ejecutar($query) or die ("error en la consulta");
		$datos_existente= array();
		while ($row= mysqli_fetch_array($bdq)) {
			$datos_existente[]=$row;
		}
		return $datos_existente;
	}

function venta_bebidas()
        {
		//importar el archivo de la conexion
			include_once('../conexion/connection.php');
		//crear objeto de conexion
		$con=new conexion();
		//realizar la consulta para cargar datos
		$query="select i.id_ingrediente,id_producto,count(*)cantidad,nombre from cuentas
				left join pedidos p using(ID_cuenta)
				left join productos pr using(ID_producto)
				inner join ingredientes i using(ID_producto)
				where date(fechahora_pagado)='2016-07-02' and nodo_sugerido = 'bebidas'
				group by ID_producto
				order by cantidad desc ";
			$bdq= $con->Ejecutar($query) or die ("error en la consulta");
		$datos_bebidas= array();
		while ($row= mysqli_fetch_array($bdq)) {
			$datos_bebidas[]=$row;
		}
		return $datos_bebidas;
	}
 function venta_mozarella()
        {
		//importar el archivo de la conexion
			include_once('../conexion/connection.php');
		//crear objeto de conexion
		$con=new conexion();
		//realizar la consulta para cargar datos
		$query="SELECT (select id_producto from ingredientes i where i.ID_ingrediente=f.id_ingrediente)as idi,(select nombre from productos pr where f.id_producto=pr.ID_producto)as nombrep,(select nombre from ingredientes i
                inner join productos pr using(ID_producto) where i.id_ingrediente=f.id_ingrediente)as nombre,count(*)as cantidad,sum(cantidad)as onzas,id_ingrediente from cuentas
                left join pedidos using (ID_cuenta)
                inner join formula f using(ID_producto)
                where date(fechahora_pagado)='2016-07-02'
                group by id_ingrediente
					 order by cantidad desc ";
			$bdq= $con->Ejecutar($query) or die ("error en la consulta");
		$datos_mozarella= array();
		while ($row= mysqli_fetch_array($bdq)) {
			$datos_mozarella[]=$row;
		}
		return $datos_mozarella;
	}

    function nombre_titulo()
        {
		//importar el archivo de la conexion
			include_once('../conexion/connection.php');
		//crear objeto de conexion
		$con=new conexion();
		//realizar la consulta para cargar datos
		$query="SELECT id_tituloinv from titulo_inventario order by id_tituloinv DESC LIMIT 1 ";
			$bdq= $con->Ejecutar($query) or die ("error en la consulta");
		$datos_docente= array();
		while ($row= mysqli_fetch_array($bdq)) {
			$datos_docente[]=$row;
		}
		return $datos_docente;
	}
    
    function sumas_inventario()
{
		//importar el archivo de la conexion
			include_once('../conexion/connection.php');
		//crear objeto de conexion
		$con=new conexion();
		//realizar la consulta para cargar datos
		$query="SELECT id_ingrediente,sum(cantidad)as total from inventario_sum
                group by ID_ingrediente";
			$bdq= $con->Ejecutar($query) or die ("error en la consulta");
		$datos_inventario= array();
		while ($row= mysqli_fetch_array($bdq)) {
			$datos_inventario[]=$row;
		}
		return $datos_inventario;
	}
    

class inventario
{
    function ingresar_click($estado,$fecha)
	{
		include_once('../conexion/connection.php');
		$con=new conexion();
		$query="INSERT INTO click (estado, fecha) VALUES
        ($estado,'$fecha')";
			$bdq= $con->Ejecutar($query) or die ("error en la consulta");
	}
    function Ingresar_Inventario($idi,$cantidad)
    {
        //importar el archivo de la conexion
		//importar el archivo de la conexion
			include_once('../conexion/connection.php');
		//crear objeto de conexion
		$con=new conexion();
		
		//realizar la consulta para cargar datos
		$query="UPDATE `inventario_sum` SET `cantidad`=$cantidad WHERE `id_ingrediente`=$idi";
			$bdq= $con->Ejecutar($query) or die ("error en la consulta");
    }
    
    function Ingresar_Ventas($idp,$idi,$cantidad)
    {
        //importar el archivo de la conexion
		//importar el archivo de la conexion
			include_once('../conexion/connection.php');
		//crear objeto de conexion
		$con=new conexion();
		
		//realizar la consulta para cargar datos
		$query="INSERT INTO ventas_invt (id_producto, id_ingrediente, cantidad) VALUES
        ($idp,$idi,$cantidad)";
			$bdq= $con->Ejecutar($query) or die ("error en la consulta");
    }
    
     function Ingresar_InventarioHis($idi,$cantidad,$idt)
    {
        //importar el archivo de la conexion
		//importar el archivo de la conexion
			include_once('../conexion/connection.php');
		//crear objeto de conexion
		$con=new conexion();
		
		//realizar la consulta para cargar datos
		$query="CALL abastecimiento_inventario($idi, $cantidad, $idt);";
			$bdq= $con->Ejecutar($query) or die ("<script>alert('ERROR: Unicamente se puede enviar una vez al dia productos a bodega');
			window.location.href = 'index.php';</script>");
    }
    
    function Titulo_Inventario($titulo)
    {
        //importar el archivo de la conexion
		require_once '../config.php';
		
		//realizar la consulta para cargar datos
		$query="INSERT INTO titulo_inventario (titulo) VALUES
        ('$titulo')";
		$result = mysqli_query($con, $query)or die("error");
    }
  }
    
?>