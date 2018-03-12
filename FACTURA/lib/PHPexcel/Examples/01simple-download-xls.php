<?php
include_once ('../conexion/conexion.php');
$con = new Conexion();
	
		
		$query ="SELECT * from empleado";
		$bdq = $con->Ejecutar($query);
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
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
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
    $tituloReporte = "Planilla Sucursales";
$titulosColumnas = array('EMPLEADO', 'N° CUENTA', 'A PAGAR');
$objPHPExcel->setActiveSheetIndex(0)
    ->mergeCells('A1:C1');
 
// Se agregan los titulos del reporte
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1',$tituloReporte) // Titulo del reporte
    ->setCellValue('A3',  $titulosColumnas[0])  //Titulo de las columnas
    ->setCellValue('B3',  $titulosColumnas[1])
    ->setCellValue('C3',  $titulosColumnas[2]);
    
     $i=4; //Numero de fila donde se va a comenzar a rellenar
 while ($fila= mysql_fetch_array($bdq,MYSQL_ASSOC)) {
     $objPHPExcel->setActiveSheetIndex(0)
         ->setCellValue('A'.$i, $fila['NombreEmpleado'])
         ->setCellValue('B'.$i, $fila['ApellidoEmpleado'])
         ->setCellValue('C'.$i, utf8_encode($fila['edad']));
         
     $i++;
 }
$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="01simple.xls"');
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
