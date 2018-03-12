<?php
$_html['titulo'] = 'Estadísticas';
?>
<h1>Estadísticas</h1>

<p>De <input id="periodo_inicio" type="text" value="<?php echo date('Y-m-d'); ?>" NAME="fechade" /> a 
<input id="periodo_final" type="text" value="<?php echo date('Y-m-d'); ?>" NAME="fechaa" /> 
<button id="actualizar">Actualizar</button></p>

<div id="estadisticas"></div>