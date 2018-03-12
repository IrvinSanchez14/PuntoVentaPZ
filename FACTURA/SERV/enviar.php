<?php
ini_set('date.timezone','America/El_Salvador');
setlocale(LC_ALL,"es_ES");
include_once ('../conexion/conexionli.php');
$con = new Conexionli();
    $cliente = $_POST['nombre'];
	$rtn = $_POST['rtn'];
 $cuenta = $_POST['cuenta'];
 $sumados = 0;
  $sumados2 = 0;
 $realp = 0;
 $fecha = date("j/n/Y"); 
        $query ="select count(nombre)as cant,nombre,sum(pe.precio_grabado)as precio,p.precio_grabado from cuentas
inner join pedidos p using(ID_cuenta)
inner join productos using(ID_producto)
left join pedidos_adicionales pe using(ID_pedido)
where ID_cuenta=$cuenta and flag_cancelado=0 
group by ID_pedido ";
        $bdq = $con->Ejecutari($query);
		$arreglo = array();

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
require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';


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
    $tituloReporte = "";
$titulosColumnas = array('', '', '');
$objPHPExcel->setActiveSheetIndex(0)
    ->mergeCells('A1:C1');
 
// Se agregan los titulos del reporte
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('C7',$cliente) // Titulo del reporte
    ->setCellValue('B9',  $rtn)  //Titulo de las columnas
    ->setCellValue('F5',  $fecha);
    
     $i=12; //Numero de fila donde se va a comenzar a rellenar
 while ($fila= mysqli_fetch_array($bdq)) {
	 $objPHPExcel->getActiveSheet()->getStyle('D'.$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
	  $objPHPExcel->getActiveSheet()->getStyle('F'.$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

     $objPHPExcel->setActiveSheetIndex(0)
	 
         ->setCellValue('A'.$i, $fila['cant'])
         ->setCellValue('B'.$i, $fila['nombre'])
		 
         ->setCellValue('F'.$i, $pro = round((  ($fila['precio']+$fila['precio_grabado'])),2))
		 ->setCellValue('D'.$i, round(($fila['precio_grabado']),2));
		 
         $sumados += $pro;
		 
		 
		 $real = $fila['precio_grabado']+$fila['precio'];
		 
         $realp += $real;
		
		 
		 
		 $propina = $realp*0.10;
		 
         
     $i++;
 }
 $objPHPExcel->getActiveSheet()->getStyle('F29')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
 $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A29',  1)  //Titulo de las columnas
    ->setCellValue('B29', 'Propina (10%)')
    ->setCellValue('F29',  $propina);
$objPHPExcel->getActiveSheet()->setTitle('Simple');
 
 $objPHPExcel->getActiveSheet()->getStyle('F34')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
  $objPHPExcel->getActiveSheet()->getStyle('F29')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
   $objPHPExcel->getActiveSheet()->getStyle('F30')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
    $objPHPExcel->getActiveSheet()->getStyle('F38')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
 $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('F34',  $subtot = $realp) 
->setCellValue('F37',  $propina)	//Titulo de las columnas
	 ->setCellValue('F38', round(($realp+$propina),2) );
$objPHPExcel->getActiveSheet()->setTitle('Simple');

foreach(range ('B','B') as $columnID){
	$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
	->setWidth(15.41);
}

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="factura.xls"');
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

