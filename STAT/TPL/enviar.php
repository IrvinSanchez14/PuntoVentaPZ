<?php
include_once ('../conexion/conexion.php');
$con = new Conexion();
    
	$fechade = $_POST['fechade'];
	$fechaa = $_POST['fechaa'];
 $suma = 0;
 $suma2 = 0;
  $suma3 = 0;
   $suma4 = 0;
   $suma5 = 0;
   $suma6 = 0;
   $suma7 = 0;
   $suma8 = 0;
   $suma9 = 0;
   $suma10 = 0;
		$query1 = "SELECT COUNT(*)AS total FROM PEDIDOS
 LEFT JOIN CUENTAS USING(ID_CUENTA)
 LEFT JOIN PRODUCTOS AS T3 USING(ID_PRODUCTO)
 LEFT JOIN `productos_grupos` AS t4 USING(ID_grupo)
 WHERE ID_PRODUCTO IS NOT NULL AND DATE(FECHAHORA_PEDIDO) BETWEEN '$fechade' AND '$fechaa'
 AND FLAG_ANULADO=0 AND FLAG_CANCELADO = 0 AND T4.descripcion = 'Pizzas'";
 $bdq2 = $con->Ejecutar($query1);
 
 $query2 = "SELECT COUNT(*)AS total FROM PEDIDOS
 LEFT JOIN CUENTAS USING(ID_CUENTA)
 LEFT JOIN PRODUCTOS AS T3 USING(ID_PRODUCTO)
 LEFT JOIN `productos_grupos` AS t4 USING(ID_grupo)
 WHERE ID_PRODUCTO IS NOT NULL AND DATE(FECHAHORA_PEDIDO) BETWEEN '$fechade' AND '$fechaa'
 AND FLAG_ANULADO=0 AND FLAG_CANCELADO = 0 AND T4.descripcion = 'Pastas'";
  $bdq3 = $con->Ejecutar($query2);
  
   $entradas = "SELECT COUNT(*)AS total FROM PEDIDOS
 LEFT JOIN CUENTAS USING(ID_CUENTA)
 LEFT JOIN PRODUCTOS AS T3 USING(ID_PRODUCTO)
 LEFT JOIN `productos_grupos` AS t4 USING(ID_grupo)
 WHERE ID_PRODUCTO IS NOT NULL AND DATE(FECHAHORA_PEDIDO) BETWEEN '$fechade' AND '$fechaa'
 AND FLAG_ANULADO=0 AND FLAG_CANCELADO = 0 AND T4.descripcion = 'Entradas'";
  $bdq5 = $con->Ejecutar($entradas);
  
  $bebe = "SELECT COUNT(*)AS total FROM PEDIDOS
 LEFT JOIN CUENTAS USING(ID_CUENTA)
 LEFT JOIN PRODUCTOS AS T3 USING(ID_PRODUCTO)
 LEFT JOIN `productos_grupos` AS t4 USING(ID_grupo)
 WHERE ID_PRODUCTO IS NOT NULL AND DATE(FECHAHORA_PEDIDO) BETWEEN '$fechade' AND '$fechaa'
 AND FLAG_ANULADO=0 AND FLAG_CANCELADO = 0 AND T4.descripcion = 'bebidas_cocina'";
  $bdq7 = $con->Ejecutar($bebe);
  
  $gas = "SELECT COUNT(*)AS total FROM PEDIDOS
 LEFT JOIN CUENTAS USING(ID_CUENTA)
 LEFT JOIN PRODUCTOS AS T3 USING(ID_PRODUCTO)
 LEFT JOIN `productos_grupos` AS t4 USING(ID_grupo)
 WHERE ID_PRODUCTO IS NOT NULL AND DATE(FECHAHORA_PEDIDO) BETWEEN '$fechade' AND '$fechaa'
 AND FLAG_ANULADO=0 AND FLAG_CANCELADO = 0 AND T4.descripcion like '%gaseosas%'";
  $bdq9 = $con->Ejecutar($gas);
  
   $alc = "SELECT COUNT(*)AS total FROM PEDIDOS
 LEFT JOIN CUENTAS USING(ID_CUENTA)
 LEFT JOIN PRODUCTOS AS T3 USING(ID_PRODUCTO)
 LEFT JOIN `productos_grupos` AS t4 USING(ID_grupo)
 WHERE ID_PRODUCTO IS NOT NULL AND DATE(FECHAHORA_PEDIDO) BETWEEN '$fechade' AND '$fechaa'
 AND FLAG_ANULADO=0 AND FLAG_CANCELADO = 0 AND T4.descripcion = 'bebidas_alcoholicas'";
  $bdq11 = $con->Ejecutar($alc);
  
  $ensa = "SELECT COUNT(*)AS total FROM PEDIDOS
 LEFT JOIN CUENTAS USING(ID_CUENTA)
 LEFT JOIN PRODUCTOS AS T3 USING(ID_PRODUCTO)
 LEFT JOIN `productos_grupos` AS t4 USING(ID_grupo)
 WHERE ID_PRODUCTO IS NOT NULL AND DATE(FECHAHORA_PEDIDO) BETWEEN '$fechade' AND '$fechaa'
 AND FLAG_ANULADO=0 AND FLAG_CANCELADO = 0 AND T4.descripcion = 'ensaladas'";
  $bdq13 = $con->Ejecutar($ensa);
  
  $tint = "SELECT COUNT(*)AS total FROM PEDIDOS
 LEFT JOIN CUENTAS USING(ID_CUENTA)
 LEFT JOIN PRODUCTOS AS T3 USING(ID_PRODUCTO)
 LEFT JOIN `productos_grupos` AS t4 USING(ID_grupo)
 WHERE ID_PRODUCTO IS NOT NULL AND DATE(FECHAHORA_PEDIDO) BETWEEN '$fechade' AND '$fechaa'
 AND FLAG_ANULADO=0 AND FLAG_CANCELADO = 0 AND T4.descripcion like '%tinto%'";
  $bdq15 = $con->Ejecutar($tint);
  
  $bla = "SELECT COUNT(*)AS total FROM PEDIDOS
 LEFT JOIN CUENTAS USING(ID_CUENTA)
 LEFT JOIN PRODUCTOS AS T3 USING(ID_PRODUCTO)
 LEFT JOIN `productos_grupos` AS t4 USING(ID_grupo)
 WHERE ID_PRODUCTO IS NOT NULL AND DATE(FECHAHORA_PEDIDO) BETWEEN '$fechade' AND '$fechaa'
 AND FLAG_ANULADO=0 AND FLAG_CANCELADO = 0 AND T4.descripcion like '%blanco%'";
  $bdq17 = $con->Ejecutar($bla);
  
  $hor = "SELECT COUNT(*)AS total FROM PEDIDOS
 LEFT JOIN CUENTAS USING(ID_CUENTA)
 LEFT JOIN PRODUCTOS AS T3 USING(ID_PRODUCTO)
 LEFT JOIN `productos_grupos` AS t4 USING(ID_grupo)
 WHERE ID_PRODUCTO IS NOT NULL AND DATE(FECHAHORA_PEDIDO) BETWEEN '$fechade' AND '$fechaa'
 AND FLAG_ANULADO=0 AND FLAG_CANCELADO = 0 AND T4.descripcion = 'entradas con horno'";
  $bdq19 = $con->Ejecutar($hor);
  
  
 
 
 
        $query ="SELECT T3.NOMBRE,COUNT(*)AS CANTIDAD,t4.descripcion AS grupo FROM PEDIDOS
 LEFT JOIN CUENTAS USING(ID_CUENTA)
 LEFT JOIN PRODUCTOS AS T3 USING(ID_PRODUCTO)
 LEFT JOIN `productos_grupos` AS t4 USING(ID_grupo)
 WHERE ID_PRODUCTO IS NOT NULL AND DATE(FECHAHORA_PEDIDO) BETWEEN '$fechade' AND '$fechaa'
 AND FLAG_ANULADO=0 AND FLAG_CANCELADO = 0 AND T4.descripcion = 'Pizzas'
 GROUP BY ID_PRODUCTO 
 ORDER BY ID_grupo ASC,CANTIDAD DESC";
        $bdq = $con->Ejecutar($query);
		
		$pastas = "SELECT T3.NOMBRE,COUNT(*)AS CANTIDAD,t4.descripcion AS grupo FROM PEDIDOS
 LEFT JOIN CUENTAS USING(ID_CUENTA)
 LEFT JOIN PRODUCTOS AS T3 USING(ID_PRODUCTO)
 LEFT JOIN `productos_grupos` AS t4 USING(ID_grupo)
 WHERE ID_PRODUCTO IS NOT NULL AND DATE(FECHAHORA_PEDIDO) BETWEEN '$fechade' AND '$fechaa'
 AND FLAG_ANULADO=0 AND FLAG_CANCELADO = 0 AND T4.descripcion = 'Pastas'
 GROUP BY ID_PRODUCTO 
 ORDER BY ID_grupo ASC,CANTIDAD DESC";
 $bdq4 = $con->Ejecutar($pastas);
 
 $entradast = "SELECT T3.NOMBRE,COUNT(*)AS CANTIDAD,t4.descripcion AS grupo FROM PEDIDOS
 LEFT JOIN CUENTAS USING(ID_CUENTA)
 LEFT JOIN PRODUCTOS AS T3 USING(ID_PRODUCTO)
 LEFT JOIN `productos_grupos` AS t4 USING(ID_grupo)
 WHERE ID_PRODUCTO IS NOT NULL AND DATE(FECHAHORA_PEDIDO) BETWEEN '$fechade' AND '$fechaa'
 AND FLAG_ANULADO=0 AND FLAG_CANCELADO = 0 AND T4.descripcion = 'Entradas'
 GROUP BY ID_PRODUCTO 
 ORDER BY ID_grupo ASC,CANTIDAD DESC";
 $bdq6 = $con->Ejecutar($entradast);
 
 $bebee = "SELECT T3.NOMBRE,COUNT(*)AS CANTIDAD,t4.descripcion AS grupo FROM PEDIDOS
 LEFT JOIN CUENTAS USING(ID_CUENTA)
 LEFT JOIN PRODUCTOS AS T3 USING(ID_PRODUCTO)
 LEFT JOIN `productos_grupos` AS t4 USING(ID_grupo)
 WHERE ID_PRODUCTO IS NOT NULL AND DATE(FECHAHORA_PEDIDO) BETWEEN '$fechade' AND '$fechaa'
 AND FLAG_ANULADO=0 AND FLAG_CANCELADO = 0 AND T4.descripcion = 'bebidas_cocina'
 GROUP BY ID_PRODUCTO 
 ORDER BY ID_grupo ASC,CANTIDAD DESC";
 $bdq8 = $con->Ejecutar($bebee);
 
  $gase = "SELECT T3.NOMBRE,COUNT(*)AS CANTIDAD,t4.descripcion AS grupo FROM PEDIDOS
 LEFT JOIN CUENTAS USING(ID_CUENTA)
 LEFT JOIN PRODUCTOS AS T3 USING(ID_PRODUCTO)
 LEFT JOIN `productos_grupos` AS t4 USING(ID_grupo)
 WHERE ID_PRODUCTO IS NOT NULL AND DATE(FECHAHORA_PEDIDO) BETWEEN '$fechade' AND '$fechaa'
 AND FLAG_ANULADO=0 AND FLAG_CANCELADO = 0 AND T4.descripcion like  '%gaseosas%'
 GROUP BY ID_PRODUCTO 
 ORDER BY ID_grupo ASC,CANTIDAD DESC";
 $bdq10 = $con->Ejecutar($gase);
 
  $alch = "SELECT T3.NOMBRE,COUNT(*)AS CANTIDAD,t4.descripcion AS grupo FROM PEDIDOS
 LEFT JOIN CUENTAS USING(ID_CUENTA)
 LEFT JOIN PRODUCTOS AS T3 USING(ID_PRODUCTO)
 LEFT JOIN `productos_grupos` AS t4 USING(ID_grupo)
 WHERE ID_PRODUCTO IS NOT NULL AND DATE(FECHAHORA_PEDIDO) BETWEEN '$fechade' AND '$fechaa'
 AND FLAG_ANULADO=0 AND FLAG_CANCELADO = 0 AND T4.descripcion = 'bebidas_alcoholicas'
 GROUP BY ID_PRODUCTO 
 ORDER BY ID_grupo ASC,CANTIDAD DESC";
 $bdq12 = $con->Ejecutar($alch);
 
  $ensal = "SELECT T3.NOMBRE,COUNT(*)AS CANTIDAD,t4.descripcion AS grupo FROM PEDIDOS
 LEFT JOIN CUENTAS USING(ID_CUENTA)
 LEFT JOIN PRODUCTOS AS T3 USING(ID_PRODUCTO)
 LEFT JOIN `productos_grupos` AS t4 USING(ID_grupo)
 WHERE ID_PRODUCTO IS NOT NULL AND DATE(FECHAHORA_PEDIDO) BETWEEN '$fechade' AND '$fechaa'
 AND FLAG_ANULADO=0 AND FLAG_CANCELADO = 0 AND T4.descripcion = 'ensaladas'
 GROUP BY ID_PRODUCTO 
 ORDER BY ID_grupo ASC,CANTIDAD DESC";
 $bdq14 = $con->Ejecutar($ensal);

$tinto = "SELECT T3.NOMBRE,COUNT(*)AS CANTIDAD,t4.descripcion AS grupo FROM PEDIDOS
 LEFT JOIN CUENTAS USING(ID_CUENTA)
 LEFT JOIN PRODUCTOS AS T3 USING(ID_PRODUCTO)
 LEFT JOIN `productos_grupos` AS t4 USING(ID_grupo)
 WHERE ID_PRODUCTO IS NOT NULL AND DATE(FECHAHORA_PEDIDO) BETWEEN '$fechade' AND '$fechaa'
 AND FLAG_ANULADO=0 AND FLAG_CANCELADO = 0 AND T4.descripcion like '%tinto%'
 GROUP BY ID_PRODUCTO 
 ORDER BY ID_grupo ASC,CANTIDAD DESC ";
 $bdq16 = $con->Ejecutar($tinto);
 
 $blanc = "SELECT T3.NOMBRE,COUNT(*)AS CANTIDAD,t4.descripcion AS grupo FROM PEDIDOS
 LEFT JOIN CUENTAS USING(ID_CUENTA)
 LEFT JOIN PRODUCTOS AS T3 USING(ID_PRODUCTO)
 LEFT JOIN `productos_grupos` AS t4 USING(ID_grupo)
 WHERE ID_PRODUCTO IS NOT NULL AND DATE(FECHAHORA_PEDIDO) BETWEEN '$fechade' AND '$fechaa'
 AND FLAG_ANULADO=0 AND FLAG_CANCELADO = 0 AND T4.descripcion like '%blanco%'
 GROUP BY ID_PRODUCTO 
 ORDER BY ID_grupo ASC,CANTIDAD DESC ";
 $bdq18 = $con->Ejecutar($blanc);
 
 $horno = "SELECT T3.NOMBRE,COUNT(*)AS CANTIDAD,t4.descripcion AS grupo FROM PEDIDOS
 LEFT JOIN CUENTAS USING(ID_CUENTA)
 LEFT JOIN PRODUCTOS AS T3 USING(ID_PRODUCTO)
 LEFT JOIN `productos_grupos` AS t4 USING(ID_grupo)
 WHERE ID_PRODUCTO IS NOT NULL AND DATE(FECHAHORA_PEDIDO) BETWEEN '$fechade' AND '$fechaa'
 AND FLAG_ANULADO=0 AND FLAG_CANCELADO = 0 AND T4.descripcion = 'entradas con horno'
 GROUP BY ID_PRODUCTO 
 ORDER BY ID_grupo ASC,CANTIDAD DESC ";
 $bdq20 = $con->Ejecutar($horno);

/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
    die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/../lib/excel/PHPExcel/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("La Pizzeria") // Nombre del autor
    ->setLastModifiedBy("La Pizzeria") //Ultimo usuario que lo modificó
    ->setTitle("Reporte Planilla") // Titulo
    ->setSubject("Reporte Planilla") //Asunto
    ->setDescription("Reporte de pago a empleados") //Descripción
    ->setKeywords("Reporte EMpleados") //Etiquetas
    ->setCategory("Reporte excel"); //Categorias
    $tituloReporte = "Productos Vendidos";
$titulosColumnas = array('', '', '');
$objPHPExcel->setActiveSheetIndex(0)
    ->mergeCells('A1:C1');
 
// Se agregan los titulos del reporte
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1',$tituloReporte) // Titulo del reporte
    ->setCellValue('A3',  $titulosColumnas[0])  //Titulo de las columnas
    ->setCellValue('B3',  $titulosColumnas[1])
    ->setCellValue('C3',  $titulosColumnas[2]);
    
     $i=4; //Numero de fila donde se va a comenzar a rellenar
	 while ($fila2= mysql_fetch_array($bdq2,MYSQL_ASSOC)) {
		$suma= $fila2['total'];
	 }
	  while ($fila3= mysql_fetch_array($bdq3,MYSQL_ASSOC)) {
		$suma2= $fila3['total'];
	 }
	  while ($fila5= mysql_fetch_array($bdq5,MYSQL_ASSOC)) {
		$suma3= $fila5['total'];
	 }
	  while ($fila7= mysql_fetch_array($bdq7,MYSQL_ASSOC)) {
		$suma4= $fila7['total'];
	 }
	  while ($fila9= mysql_fetch_array($bdq9,MYSQL_ASSOC)) {
		$suma5= $fila9['total'];
	 }
	 while ($fila11= mysql_fetch_array($bdq11,MYSQL_ASSOC)) {
		$suma6= $fila11['total'];
	 }
	 while ($fila13= mysql_fetch_array($bdq13,MYSQL_ASSOC)) {
		$suma7= $fila13['total'];
	 }
	  while ($fila15= mysql_fetch_array($bdq15,MYSQL_ASSOC)) {
		$suma8= $fila15['total'];
	 }
	 while ($fila17= mysql_fetch_array($bdq17,MYSQL_ASSOC)) {
		$suma9= $fila17['total'];
	 }
	 while ($fila19= mysql_fetch_array($bdq19,MYSQL_ASSOC)) {
		$suma10= $fila19['total'];
	 }
 while ($fila= mysql_fetch_array($bdq,MYSQL_ASSOC)) {
	 
	$total=($fila['CANTIDAD']/$suma)*100;
	 
     $objPHPExcel->setActiveSheetIndex(0)
         ->setCellValue('A'.$i, $fila['grupo'])
         ->setCellValue('B'.$i, utf8_encode($fila['NOMBRE']))
		  ->setCellValue('C'.$i, round(($total),2));
		
     $i++;
 }
 $e=4;
  while ($fila4= mysql_fetch_array($bdq4,MYSQL_ASSOC)) {
	 
	$totalp=($fila4['CANTIDAD']/$suma2)*100;
	 
     $objPHPExcel->setActiveSheetIndex(0)
         ->setCellValue('E'.$e, $fila4['grupo'])
         ->setCellValue('F'.$e, utf8_encode($fila4['NOMBRE']))
		  ->setCellValue('G'.$e, round(($totalp),2));
		
     $e++;
 }
  $r=4;
  while ($fila6= mysql_fetch_array($bdq6,MYSQL_ASSOC)) {
	 
	$totale=($fila6['CANTIDAD']/$suma3)*100;
	 
     $objPHPExcel->setActiveSheetIndex(0)
         ->setCellValue('I'.$r, $fila6['grupo'])
         ->setCellValue('J'.$r, utf8_encode($fila6['NOMBRE']))
		  ->setCellValue('K'.$r, round(($totale),2));
		
     $r++;
 }
  $v=4;
  while ($fila8= mysql_fetch_array($bdq8,MYSQL_ASSOC)) {
	 
	$totalb=($fila8['CANTIDAD']/$suma4)*100;
	 
     $objPHPExcel->setActiveSheetIndex(0)
         ->setCellValue('M'.$v, $fila8['grupo'])
         ->setCellValue('N'.$v, utf8_encode($fila8['NOMBRE']))
		  ->setCellValue('O'.$v, round(($totalb),2));
		
     $v++;
 }
 
  $n=4;
  while ($fila10= mysql_fetch_array($bdq10,MYSQL_ASSOC)) {
	 
	$totalg=($fila10['CANTIDAD']/$suma5)*100;
	 
     $objPHPExcel->setActiveSheetIndex(0)
         ->setCellValue('Q'.$n, $fila10['grupo'])
         ->setCellValue('R'.$n, utf8_encode($fila10['NOMBRE']))
		  ->setCellValue('S'.$n, round(($totalg),2));
		
     $n++;
 }
  $c=4;
  while ($fila12= mysql_fetch_array($bdq12,MYSQL_ASSOC)) {
	 
	$totala=($fila12['CANTIDAD']/$suma6)*100;
	 
     $objPHPExcel->setActiveSheetIndex(0)
         ->setCellValue('U'.$c, $fila12['grupo'])
         ->setCellValue('V'.$c, utf8_encode($fila12['NOMBRE']))
		  ->setCellValue('W'.$c, round(($totala),2));
		
     $c++;
 }
  $a=4;
  while ($fila14= mysql_fetch_array($bdq14,MYSQL_ASSOC)) {
	 
	$totalen=($fila14['CANTIDAD']/$suma7)*100;
	 
     $objPHPExcel->setActiveSheetIndex(0)
         ->setCellValue('Y'.$a, $fila14['grupo'])
         ->setCellValue('Z'.$a, utf8_encode($fila14['NOMBRE']))
		  ->setCellValue('AA'.$a, round(($totalen),2));
		
     $a++;
 }
 
   $b=4;
  while ($fila16= mysql_fetch_array($bdq16,MYSQL_ASSOC)) {
	 
	$totalti=($fila16['CANTIDAD']/$suma8)*100;
	 
     $objPHPExcel->setActiveSheetIndex(0)
         ->setCellValue('AC'.$b, $fila16['grupo'])
         ->setCellValue('AD'.$b, utf8_encode($fila16['NOMBRE']))
		  ->setCellValue('AE'.$b, round(($totalti),2));
		
     $b++;
 }
    $x=4;
  while ($fila18= mysql_fetch_array($bdq18,MYSQL_ASSOC)) {
	 
	$totalbl=($fila18['CANTIDAD']/$suma9)*100;
	 
     $objPHPExcel->setActiveSheetIndex(0)
         ->setCellValue('AG'.$x, $fila18['grupo'])
         ->setCellValue('AH'.$x, utf8_encode($fila18['NOMBRE']))
		  ->setCellValue('AI'.$x, round(($totalbl),2));
		
     $x++;
 }
  $w=4;
  while ($fila20= mysql_fetch_array($bdq20,MYSQL_ASSOC)) {
	 
	$totalhn=($fila20['CANTIDAD']/$suma10)*100;
	 
     $objPHPExcel->setActiveSheetIndex(0)
         ->setCellValue('AK'.$w, $fila20['grupo'])
         ->setCellValue('AL'.$w, utf8_encode($fila20['NOMBRE']))
		  ->setCellValue('AM'.$w, round(($totalhn),2));
		
     $w++;
 }
 
 $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1',$tituloReporte); // Titulo del reporte
$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="ventas.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;

