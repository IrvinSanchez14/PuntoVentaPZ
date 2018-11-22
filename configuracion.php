<?php
setlocale                   (LC_ALL, 'es_SV.UTF-8');
date_default_timezone_set   ('America/El_Salvador');

define('NOMBRE_RESTAURANTE', 'Restaurante');
define('ID_SERVIDOR', 'LPCASTANOS');
define('MODO_GLOBAL', 'NORMAL'); // MODOS: [ NORMAL | DOMICILIO ]
define('URI_SERVIDOR', '/PuntoVentaPZ/SERV'); // URI relativa o absoluta hacia el servidor
define('URI_AUT', '/PuntoVentaPZ/AUT'); // URI relativa o absoluta hacia el autorizador
define('ID_CACHE', "RSV_SQL_" . crc32(ID_SERVIDOR . URI_SERVIDOR) );
define('SUCURSAL_EMPRESA','LA PIZZERIA S.A. de C.V.');
define('SUCURSAL_DIRECCION', 'Multiplaza<br />Carretera Panamericana<br />Antiguo Cuscatlan.'); // direccion de la sucursal
define('SUCURSAL_TELEFONO', '(503) 2207-3678');

define('USAR_AUT', false); // forzar autorizaciÃ³n para CAJA y PEDIDOS

define('db__host','localhost');
define('db__usuario','root'); // Nombre de usuario de base de datos
define('db__clave','010194'); // Clave de base de datos
define('db__db','rsv'); // Base de datos

$__listado_nodos['todos'] = 'Todas las ordenes';
$__listado_nodos['pizzas'] = 'Pizzas y entradas horneadas';
$__listado_nodos['pizzas1'] = 'Pizzas 1 + entradas horneadas';
$__listado_nodos['pizzas2'] = 'Pizzas 2';
$__listado_nodos['pastas'] = 'Pastas';
$__listado_nodos['pastas_ensaladas_entradas'] = 'Pastas, ensaladas y entradas';
$__listado_nodos['bebidas_postres'] = 'Bebidas preparadas y postres';
$__listado_nodos['bebidas'] = 'Solo bebidas preparadas';
$__listado_nodos['bebidas_ensaladas_postres_entradas'] = 'Bebidas, Ensaladas, Postres y Entradas';
$__listado_nodos['ensaladas_postres_entradas_pastas'] = 'Ensaladas, Postres, Entradas y Pastas';
$__listado_nodos['nada'] = 'Desactivar este nodo';

$__listado_nodos_sql['todos'] = 'AND t1.nodo IN ("pizzas","pizzas1","pizzas2", "pastas","entradas_horno","bebidas_preparadas","ensaladas","postres","entradas")';
$__listado_nodos_sql['horno'] = 'AND t1.nodo IN ("pizzas",pizzas1","pizzas2","entradas_horno","pastas")';
$__listado_nodos_sql['pizzas'] = 'AND t1.nodo IN ("pizzas","pizzas1","pizzas2","entradas_horno")';
$__listado_nodos_sql['pizzas1'] = 'AND t1.nodo IN ("pizzas","pizzas1","entradas_horno")';
$__listado_nodos_sql['pizzas2'] = 'AND t1.nodo IN ("pizzas2")';
$__listado_nodos_sql['pastas'] = 'AND t1.nodo IN ("pastas")';
$__listado_nodos_sql['pastas_ensaladas_entradas'] = 'AND t1.nodo IN ("pastas","ensaladas","entradas")';
$__listado_nodos_sql['bebidas_postres'] = 'AND t1.nodo IN ("bebidas_preparadas","postres")';
$__listado_nodos_sql['bebidas'] = 'AND t1.nodo IN ("bebidas_preparadas")';
$__listado_nodos_sql['bebidas_ensaladas_postres_entradas'] = 'AND t1.nodo IN ("bebidas_preparadas","ensaladas","postres","entradas")';
$__listado_nodos_sql['ensaladas_postres_entradas_pastas'] = 'AND t1.nodo IN ("ensaladas","postres","entradas","pastas")';
$__listado_nodos_sql['nada'] = 'AND 0';
$__listado_nodos_sql['domicilio'] = 'domicilio';

// OPCIONES ESPECIALES
define('TIQUETE_AGRUPADO', false); // Agrupar los productos en tiquete
define('CANCELAR_IMPRESION_DESPACHO', true); // No imprimir la orden al momento de despachar

$JSOPS[] = 'sin_clave';

$__caja['cave'] = ''; // Si se establece algo aqui, se utilizarÃ¡ como clave para CAJA

$__servidor_externo_pp['LPDOMICILIO'] = 'http://serv.domicilio.lapizzeria.com.sv';
?>
