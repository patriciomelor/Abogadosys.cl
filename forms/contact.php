<?php 
// Seteo zona horaria
date_default_timezone_set("America/Santiago");
$dt = new DateTime();	
$fechayhora = $dt->format('d/m/Y H:i');

//Variables que recibimos desde el formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['Apellido'];
$email = $_POST['email'];
$Telefono = $_POST['Telefono'];
$mensaje =$_POST['message'];

// ARMO EL CORREO
$destino = 'contacto@abogadosys.cl';	
//Al asunto, trato de mandarlo con la fecha y hora, porque asi, evitamos que caiga en spam
$asunto = 'Contacto por Formulario - '.$fechayhora;						

$contenido  = "Se ha recibido mensaje de parte de: $nombre $apellido \r\n\n"  ;
$contenido .= "Numero: $Telefono \r\n\n";
$contenido .=  "$mensaje \r\n\n";
$contenido .= "responder a este correo: $email \r\n" ;

/* EN EL CONTENIDO, SI EL HEADER ES CONTENT-TYPE:HTML, PUEDES OCUPAR ETIQUETAS <BR> PARA LOS SALTOS DE LINEA
	 SI EL CONTENT-TYPE ES PLAIN-TEXT, SE DEBE OCUPAR LOS \n */


//HEADERS DE CONFIGURACION DEL EMAIL, ESTOS DEBEN QUEDAR CON LOS \r\n
$header = "From: no-reply@abogadosys.cl\r\n";
$header .= "Reply-To: $email\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: text/html; charset=UTF-8\r\n"; 


if(@mail($destino, $asunto, $contenido, $header)):
	//SI EL EMAIL SE ENVIA
	echo 'Mail enviado';  
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$location.'">';
else:
	//SI EL EMAIL NO SE ENVIA
	echo 'No se envio email'; 
	
endif;	
 ?>