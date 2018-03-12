<?php
require_once 'config.php';
if($_POST['type'] == 'country_table'){
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	$query = "SELECT id_ingrediente,nombre,unidad from productos p
                inner join ingredientes using(ID_producto)
                inner join unidad_medida using(ID_unidad) where nombre LIKE '".strtoupper($name)."%' limit 10";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['nombre'].'|'.$row['unidad'].'|'.$row['id_ingrediente'].'|'.$row_num;
		array_push($data, $name);	
	}	
	echo json_encode($data);
}


