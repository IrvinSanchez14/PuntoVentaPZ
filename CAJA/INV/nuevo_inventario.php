<?php
include_once('../conexion/connection.php');
$con=new conexion();
$vendido = "select nombre,count(*)as cantidad from pedidos left join productos using(ID_producto) where date(fechahora_pedido)='2016-08-02' group by id_producto
order by nombre desc";
$ingrediente_fuera="select nombre,sum(cantidad)as cantidad,id_ingrediente  from pedidos left join productos using(ID_producto) left join formula using(id_producto) where date(fechahora_pedido)='2016-08-02' and cantidad is not null
group by id_ingrediente order by nombre desc";
$suma_quesom="select id_ingrediente,sum(cantidad)as cantidadm from historial_inventario where id_ingrediente=6";
$suma_quesoc="select id_ingrediente,sum(cantidad)as cantidadc from historial_inventario where id_ingrediente=7";
$suma_masab="select id_ingrediente,sum(cantidad)as cantidadm from historial_inventario where id_ingrediente=62";
$suma_masap="select id_ingrediente,sum(cantidad)as cantidadc from historial_inventario where id_ingrediente=63";
$suma_mineral="select id_ingrediente,sum(cantidad)as cantidadm from historial_inventario where id_ingrediente=11";
$suma_bebidas="select nombre,id_ingrediente,sum(cantidad)as cantidadm from historial_inventario left join ingredientes using(ID_ingrediente) left join productos using(ID_producto) where id_ingrediente!=6 and id_ingrediente!=7 and id_ingrediente!=11 and id_ingrediente!=62 and id_ingrediente!=63
group by id_ingrediente";

echo "<br><h1>Existencia Producto</h1>";
$bdq1= $con->Ejecutar($suma_quesom) or die ("error en la consulta bdq1");
$bdq3= $con->Ejecutar($suma_quesoc) or die ("error en la consulta bdq1");
$bdq4= $con->Ejecutar($suma_masab) or die ("error en la consulta bdq1");
$bdq5= $con->Ejecutar($suma_masap) or die ("error en la consulta bdq1");
$bdq6= $con->Ejecutar($suma_mineral) or die ("error en la consulta bdq1");
$bdq7= $con->Ejecutar($suma_bebidas) or die ("error en la consulta bdq1");

while($row = mysqli_fetch_array($bdq1))
	{
		$suma_ventaq="select id_ingrediente,sum(cantidad)as cantidadv from ventas_invt group by id_ingrediente";
		$bdq2= $con->Ejecutar($suma_ventaq) or die ("error en la consulta bdq1");
		while($row2 = mysqli_fetch_array($bdq2))
	{
		if($row['id_ingrediente'] == $row2['id_ingrediente'])
		{
			$total = $row['cantidadm'] - $row2['cantidadv'];
			echo "Queso Mozarella ".$total."onz";
		}
	}
	
	}
	echo "<br>";
while($row3 = mysqli_fetch_array($bdq3))
	{
		$suma_ventaq="select id_ingrediente,sum(cantidad)as cantidadv from ventas_invt group by id_ingrediente";
		$bdq2= $con->Ejecutar($suma_ventaq) or die ("error en la consulta bdq1");
		while($row4 = mysqli_fetch_array($bdq2))
	{
		if($row3['id_ingrediente'] == $row4['id_ingrediente'])
		{
			$total = $row3['cantidadc'] - $row4['cantidadv'];
			echo "Queso Cheddar ".$total."onz";
		}
	}
	
	}
	echo "<br>";
	
while($row5 = mysqli_fetch_array($bdq4))
	{
		$suma_ventaq="select id_ingrediente,sum(cantidad)as cantidadv from ventas_invt group by id_ingrediente";
		$bdq2= $con->Ejecutar($suma_ventaq) or die ("error en la consulta bdq1");
		while($row6 = mysqli_fetch_array($bdq2))
	{
		if($row5['id_ingrediente'] == $row6['id_ingrediente'])
		{
			$total = $row5['cantidadm'] - $row6['cantidadv'];
			echo "Masa Bread ".$total."Und";
		}
	}
	
	}

echo "<br>";

while($row7 = mysqli_fetch_array($bdq5))
	{
		
		$suma_ventaq="select id_ingrediente,sum(cantidad)as cantidadv from ventas_invt group by id_ingrediente";
		$bdq9= $con->Ejecutar($suma_ventaq) or die ("error en la consulta bdq1");
		while($row8 = mysqli_fetch_array($bdq9))
	{
		if($row7['id_ingrediente'] == $row8['id_ingrediente'])
		{
			$total = $row7['cantidadc'] - $row8['cantidadv'];
			echo "Masa ".$total."Und";
		}
	}
	
	}
	
	echo "<br>";
	
	while($row9 = mysqli_fetch_array($bdq6))
	{
		
		$suma_ventaq="select id_ingrediente,sum(cantidad)as cantidadv from ventas_invt group by id_ingrediente";
		$bdq2= $con->Ejecutar($suma_ventaq) or die ("error en la consulta bdq1");
		while($row8 = mysqli_fetch_array($bdq2))
	{
		if($row9['id_ingrediente'] == $row8['id_ingrediente'])
		{
			$total = $row9['cantidadm'] - $row8['cantidadv'];
			echo "Agua Mineral ".$total."Und";
		}
	}
	
	}
	
	echo "<br>";
	
	while($row10 = mysqli_fetch_array($bdq7))
	{
		
		$suma_ventaq="select id_ingrediente,sum(cantidad)as cantidadv from ventas_invt group by id_ingrediente";
		$bdq2= $con->Ejecutar($suma_ventaq) or die ("error en la consulta bdq1");
		while($row8 = mysqli_fetch_array($bdq2))
	{
		if($row10['id_ingrediente'] == $row8['id_ingrediente'])
		{
			$total = $row10['cantidadm'] - $row8['cantidadv'];
			echo $row10['nombre']." ".$total."Und<br>";
		}
	}
	
	}
	
	