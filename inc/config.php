<?php
include_once('odbcss_c.php');
$DSN = "CENTURA-DACE";
$user = "c";
$pass = "c";
$conex = new ODBC_Conn($DSN,$user,$pass,TRUE,$laBitacora);
$sql1 = "select lapso_act,lapso_ant from lapso_sem";
$conex->ExecSQL($sql1,__LINE__,true);
$resulte = $conex->result;
$lapsoProceso=$conex->result[0][0];
$LapsoAnterior=$conex->result[0][1];



$enProduccion		= true;
$raizDelSitio		= 'http://'.$_SERVER['SERVER_NAME'].'/web/urace/pregrado/estudiantes/beneficio/';
$urlDelSitio		= 'http://'.$_SERVER['SERVER_NAME'].'/web/urace';
//$lapsoProceso		= '2014-U';
/*$lapsoProceso		= '2017-1';// Lapso Actual
$LapsoAnterior		= '2016-U';// Lapso Anterior*/
$tLapso				= ' Lapso '.$lapsoProceso;
$laBitacora			= $_SERVER[DOCUMENT_ROOT].'/log/pregrado/estudiantes/sol_beneficio_'.$lapsoProceso.'.log';
$inscHabilitada		= true;
//  $inscHabilitada		= false;
$modoInscripcion	= '1'; // 1: Inscripcion, 2: Inclusion y Retiro

$tProceso	= 'Solicitud de Beneficios Econ&oacute;micos';

//Si se requiere imprimir en planilla un mensaje extra, activar esto y colocarlo
// en inc/msgExtra.php
$mensajeExtra		= false; 

//$DSN = "dacepoz";


$sedesUNEXPO = array (	'CCS' => array('BQTO','CARORA'), 
						'CCS_'  => array('DACECCS'),
						'POZ'  => array('CENTURA-DACE')
						//'POZ'  => array('dacepoz')
				);

//$sedeActiva = 'BQTO';
//$sedeActiva = 'CCS';
$sedeActiva = 'POZ';
$pensumPoz = '4';

$nucleos = $sedesUNEXPO[$sedeActiva];

$tablaOrdenInsc = 'ORDEN_INSCRIPCION';

//$vicerrectorado		= "Luis Caballero Mej&iacute;as";
//$vicerrectorado		= "Barquisimeto";
$vicerrectorado		= "Puerto Ordaz";
$nombreDependencia = 'Unidad Regional de Admisi&oacute;n y Control de Estudios';

///Unidad Tributaria:
$unidadTributaria	= 7421;
// Los rangos de sueldo minimo en UT a mostrar para elegir el ingreso familiar:
$rangosIngresoFamiliar = array(1, 2, 3, 4, 5);

// Proteccion de las paginas contra boton derecho, no javascript y navegadores no soportados:
if ($enProduccion){
	$botonDerecho = 'oncontextmenu="return false"';
	$noJavaScript = '<noscript><meta http-equiv="REFRESH" content="0;URL=no-javascript.php"></noscript>';
	$noCache	  = "<meta http-equiv=\"Pragma\" content=\"no-cache\">\n";
	$noCache	 .= '<meta http-equiv="Expires" content="-1">';
	$noCacheFin	  = '<head><meta http-equiv="Pragma" content="no-cache"></head>';
}
else {
	$botonDerecho = '';
	$noJavaScript = '';
	$noCache	  = '';
	$noCacheFin	  = '';
}
?>