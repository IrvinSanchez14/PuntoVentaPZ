<?php
date_default_timezone_set   ('America/El_Salvador');
require_once('PHPMailerAutoload.php');
include_once('conexion/connection.php');
//variables a utilizar
$con=new conexion();
$fecha = date('Y-m-d');
$cuenta_cambio = "SELECT ID_cuenta FROM historial WHERE DATE(fechahora)='$fecha' AND flag_importante=1 GROUP BY ID_cuenta ORDER BY ID_cuenta ASC" ;
$bdq= $con->Ejecutar($cuenta_cambio) or die ("error en la consulta cuenta cambio");
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
$mail             = new PHPMailer();
$body             = 0;
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "irvnsanchez@gmail.com"; // SMTP server
//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "irvnsanchez@gmail.com";  // GMAIL username
$mail->Password   = "irvin019414yo";            // GMAIL password
$mail->Body = ' <h1>MASCOTA</h1>';
$mail->IsHTML(true); 
  //amount shows the number of data I want to repeat
  //Creacion de correo de cuentas
	while($row = mysqli_fetch_array($bdq))
	{		
		$idc= $row['ID_cuenta'];
		$detalle_cuenta = "select ID_cuenta,ID_mesa,usuario from cuentas left join usuarios on ID_mesero=ID_usuarios where ID_cuenta=$idc";
		$hora_pagada = "SELECT fechahora_pagado from cuentas where ID_cuenta=$idc";		
		$cuenta_datos ="select pe.ID_pedido,pr.nombre as nombre_producto,pe.precio_grabado as precio_producto,DATE_FORMAT(fechahora_pedido, '%H:%i')as tiempo_pedido,DATE_FORMAT(fechahora_despachado, '%H:%i')as tiempo_despachado from cuentas C left join pedidos pe using (ID_cuenta) left join productos pr using(ID_producto) WHERE C.ID_cuenta = $idc and flag_cancelado=0;";
		$totales_cuenta = "select flag_nopropina,flag_exento, sum(pe.precio_grabado)as precio_normal,sum(pe.precio_grabado/1.13)as 						     precio_siniva,sum(pe.precio_grabado*0.10)as propina,cantidad
		from cuentas C left join pedidos pe using (ID_cuenta)  left join productos pr using(ID_producto)
		left join cuenta_descuento cd using(ID_cuenta) WHERE C.ID_cuenta = $idc    and flag_cancelado = 0";
		$historial_cuenta = "SELECT ID_pedido,fechahora,nota,grupo,accion,ID_cuenta,ID_mesa,flag_importante FROM historial 
		WHERE DATE(fechahora)='$fecha' and ID_cuenta=$idc   ";
		$producto_eliminado = "select accion,pr.nombre as nombre_producto, h.nota, a.nombre as nombre_adicional,pe.precio_grabado as precio_producto, pa.precio_grabado as precio_adicional,DATE_FORMAT(fechahora, '%H:%i')as hora from cuentas C
		left join pedidos pe using (ID_cuenta) left join pedidos_adicionales pa USING(ID_pedido) left join productos pr using(ID_producto)
		left join adicionables a using(ID_adicional) left join historial h using(ID_cuenta) WHERE C.ID_cuenta = $idc and h.ID_pedido=pe.ID_pedido group by pe.ID_pedido; ";
		$bdq5= $con->Ejecutar($detalle_cuenta) or die ("error en la consulta detalle_cuenta");
		$bdq7= $con->Ejecutar($hora_pagada) or die ("error en la consulta hora_pagada");
		$bdq2= $con->Ejecutar($totales_cuenta) or die ("error en la consulta totales_cuenta");
		$bdq3= $con->Ejecutar($historial_cuenta) or die ("error en la consulta historial_cuenta");
		$bdq4= $con->Ejecutar($producto_eliminado) or die ("error en la consulta producto_eliminado");
		$bdq1= $con->Ejecutar($cuenta_datos) or die ("error en la consulta cuenta_datos");
		while($row7 = mysqli_fetch_array($bdq5))
		{
			$mail->Body .= '<div class="cuenta" style="background-color: #A3A3A3;
						color: #FFFFF0;
						font-size: 0.9em;
						padding: 3px;
						margin: 2px 0px;
						border-radius: 5px;">Cuenta <b>#'.$row7['ID_cuenta'].'</b> | atendida por <b>'.$row7['usuario'].'</b></div>';
		}
		
		while($row2 = mysqli_fetch_array($bdq2))
		{	
		$totales_adicionales = "select sum(pa.precio_grabado)as precio_adicional,SUM(pa.precio_grabado/1.13)as sin_iva,SUM(pa.precio_grabado*0.13)as aparte_iva from cuentas c
		left join pedidos pe using(ID_cuenta)
		left join pedidos_adicionales pa using(ID_pedido) where ID_cuenta=$idc and tipo='poner' ";
		$bdq6= $con->Ejecutar($totales_adicionales) or die ("error en la consulta totales_adicionales");
			while($row6 = mysqli_fetch_array($bdq6))
			{
			
				$precio_aa = $row6['precio_adicional'];
				$suma_cuenta = $row2['precio_normal'] + $precio_aa;
				$precio_aa_sin = $row6['sin_iva'] ;
				if($row2['flag_nopropina'] == 1)
				{
					$propina_cuenta = "0.00";
				}
				else{
					$propina_cuenta = $suma_cuenta*0.10;
					}
				if($row2['cantidad'] == ''){
					$descuento_cupon = "0.00";
				}
				else{
					$descuento_cupon = $row2['cantidad'];
				}			
				$precio_sin_iva = $row2['precio_siniva'];
				$mail->Body .= '<div class="contenedor_encabezado_orden" style="background-color: springgreen; margin-bottom: 2px; border-radius:5px; border: 3px solid #000000;padding: 2px;"><table class="encabezado_orden" style="background: none;color: black;width: 100%;border-collapse: collapse;">
					<tbody><tr><td class="contenedor_mesa_mesero" style="width: 200px;"><button class="cambio_mesa btn">100</button>
					</td><td class="precio_precalculo">(((<span style="cursor: not-allowed;" title="Total sin IVA">$'.number_format((float)$row2['precio_siniva'] + $precio_aa_sin ,2,'.','').'</span>
					+ <span class="quitar_iva" style="cursor: pointer;" title="IVA
					Clic para quitar IVA">$'.round(($precio_sin_iva + $precio_aa_sin ) * 0.13,2).'</span>) =
					<span style="cursor: not-allowed;color:blue;font-weight:bold;" title="Total con IVA sin propina">$'.number_format((float)$suma_cuenta ,2,'.','').'</span>)
					+ <span class="quitar_propina" style="cursor: pointer;color:red;font-weight:bold;" title="Propina
					Clic para quitar propina">$'.number_format((float)$propina_cuenta,2,'.','').'</span>) - $'.number_format((float)$descuento_cupon,2,'.','').'  = </td><td class="precio"><span title="Total con IVA y con propina">$'.number_format((float)$suma_cuenta + $propina_cuenta - $descuento_cupon,2,'.','').'
					</span></td></tr></tbody></table></div>';
			}
		}
		
		while($row3 = mysqli_fetch_array($bdq3))
		{
			if($row3['accion'] != 'flag_nopropina')
			{
				$mail->Body .= '<div class="vineta" style="background-color:#FFFFA2;color:#676767;text-align:center;">'.$row3['fechahora']." :: ".$row3['accion']." :: ".$row3['nota'].'</div>';
			}
			else{
				$mail->Body .= '<div class="vineta" style="background-color:#FFFFA2;color:#676767;text-align:center;">'.$row3['fechahora']." :: ".$row3['accion']." :: ".$row3['nota'].'</div>';
				$mail->Body .= '<div class="vineta" style="background-color:pink;color:red;text-align:center;">sin propina</div>';
			}
		}
		while($row8 = mysqli_fetch_array($bdq7))
		{
			$mail->Body .= '<div class="vineta" style="background-color:#FFFACD;color:black;text-align:center;">cerrada/pagada ['.$row8['fechahora_pagado'].']</div>';
		}	
		while($row1 = mysqli_fetch_array($bdq1))
		{
			 $row1['nombre_producto']."  ".$row1['precio_producto']."<br>";
			 $id_pedido = $row1['ID_pedido'];
			 
				$mail->Body .= '<div class="producto"><input class="chk_separar_pedido" type="checkbox" value="109813">
					&nbsp;<span class="estado_despacho" title="P = pendiente | E = elaborado | D = despachado">
					D</span>&nbsp;<span class="cancelar_pedido" title="Cancelar este pedido">X</span>&nbsp;
					<span style="color:black;" title="109813">'.$row1['nombre_producto'].'</span>&nbsp;<span class="editar_pedido">'.$suma = $row1['precio_producto'].' 
					</span>&nbsp;<span class="detalle_hora">['.$row1['tiempo_pedido'].' - '.$row1['tiempo_despachado'].' - '.$row1['tiempo_despachado'].']</span>&nbsp;</div>';
				$producto_adicional = "select ID_pedido,nombre,precio from pedidos_adicionales
									   left join adicionables using(ID_adicional) where ID_pedido=$id_pedido";
				$bdq5= $con->Ejecutar($producto_adicional) or die ("error en la consulta producto_adicional");
				
			while($row5 = mysqli_fetch_array($bdq5))
				{
					if($id_pedido == $row5['ID_pedido'])
					{
						$mail->Body .= '<div class="adicionales"><ul><li id_adicional="27243">'.$row5['nombre'].'<span class="adicionales_precio"> $'.$row5['precio'].'</span></li></ul>';
					}
					else{ 
					$mail->Body .= "nada";
					}
				}
		}
	
		while($row4 = mysqli_fetch_array($bdq4))
		{
			if($row4['accion'] == 'precio_grabado')
			{
				$mail->Body .= '<div class="producto"><input class="chk_separar_pedido" type="checkbox" value="109241">&nbsp;
					<span class="estado_despacho" title="P = pendiente | E = elaborado | D = despachado">
					D</span>&nbsp;<span class="cancelar_pedido" title="Cancelar este pedido">X</span>&nbsp;<span style="color:black;" title="109241">'.$row4['nombre_producto'].'</span>&nbsp;
					<span class="editar_pedido">$'.$row4['precio_producto'].'</span>&nbsp;<span class="detalle_hora">'.$row4['hora'].'</span>&nbsp;- <span class="historia">'.$row4['nota'].'</span></div>';
			}
			else{
					$mail->Body .= '<div class="producto"><input class="chk_separar_pedido" type="checkbox" value="109241">&nbsp;
					<span class="estado_despacho" title="P = pendiente | E = elaborado | D = despachado">
					-</span>&nbsp;-&nbsp;<span style="color:black;" title="109241">'.$row4['nombre_producto'].'</span>&nbsp;
					<span class="editar_pedido">$'.$row4['precio_producto'].'</span>&nbsp;<span class="detalle_hora">'.$row4['hora'].'</span>&nbsp; - 
					<span style="background-color:black;color:red;">ELIMINADO</span> - <span class="historia">'.$row4['nota'].'</span></div>';
				}
		}
		$mail->Body .= "</div></div>";
		$mail->IsHTML(true);
    } 
$mail->IsHTML(true); 
$mail->SetFrom('irvnsanchez@gmail.com', 'Irvin');
$mail->AddReplyTo("irvnsanchez@gmail.com","Irvin");
$mail->Subject    = "Cuentas Modificadas";
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
//direcciones de correo donde se enviara el email
$address = "irvnsanchez@gmail.com";
//$address2 = "gonzalezchristian2395@gmail.com";
//$address3 = "o.quintanilla@mupi.com.sv";
//$address4 = "a.molina@mupi.com.sv";
//indicar los correos creado anteriormente  para su envio
$mail->AddAddress($address, "Irvin");
//$mail->AddAddress($address2, "John Doe");
//$mail->AddAddress($address3, "Oscar");
//$mail->AddAddress($address4, "Alejandro");
//indicamos si el correo fue enviado con exito o si hubo algun error
if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "CORREO ENVIADO CON EXITO!";
}

