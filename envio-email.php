<?php
	$nombre=$_POST['nombre']
	$email=$_POST['correo'];
	$texto=$_POST['mensaje'];
	 
	$para = 'patriandrea.p@gmail.com';
	$titulo = 'Contacto Web';

	$mensaje= 'nombre: '.$nombre.' correo: '.$correo.' mensaje: '.$texto;
	// $mensaje =	'<html>
	// 				<head>
	// 				<title>Propuesta Web</title>
	// 				<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	// 				<style>
	// 					*{
	// 						font-family: "Raleway", sans-serif;
	// 					}
	// 					html,body{
	// 						margin:0;
	// 						padding:0;
	// 					}
	// 					#cuerpo{
	// 						width:70%;
	// 						margin: 0 auto;
	// 					}
	// 					h1{
	// 						text-align: center;
	// 						width: 100%;
	// 						color:grey;
	// 						padding-bottom: .4em;
	// 						padding-top: .4em;
	// 					}
	// 					#divLogo{
	// 						width:100%;
	// 						text-align: center;
	// 					}
	// 					#logo{
	// 						width: 35%;
	// 						margin: auto;
	// 					}
	// 					#spanFirma{
	// 						font-size: 1.2em;
	// 						color:grey;
	// 						font-weight: bold;
	// 					}
	// 					#pie{
	// 						margin-top: 3em;
	// 						background-color: grey;
	// 						color:white;
	// 						text-align: center;
	// 						padding-top: 2em;
	// 						padding-bottom: 2em;
	// 						width:100%;
	// 					}
	// 					#pie table a, #pie table span{
	// 						text-decoration: none;
	// 						color:white;
	// 						padding: .4em;
	// 					}
	// 					#mensaje{
	// 						font-style: italic;
	// 						text-align: justify;
	// 						margin-left: 5%;
	// 						margin-right: 5%;
	// 						padding-top: 10px;
	// 						padding-bottom: 10px;
	// 					}
	// 					#mensaje span, .justify span, table span{
	// 						font-weight: bold;
	// 					}
	// 					.justify{
	// 						text-align: justify;
	// 					}
	// 				</style>
	// 				</head>
	// 					<body>
	// 						<div class="div" id="cuerpo">
	// 						<div id="divLogo">
	// 							<img src="http://bitealo.cl/img/Logo-bitealo.jpg" alt="" id="logo">
	// 							</div>
	// 							<h1>!Tienen una nueva Propuesta!</h1>
	// 							<p class="justify">Hola, el cliente <span>'.$nombre.'</span> les realiza la siguiente propuesta:</p>
	// 							<p id="mensaje">"'.$prop.'"</br>
	// 							<span>Plan: '.$formula.'</span></br>
	// 							<span>A Financiar: '.$finan.' %</span></p>
								
								
	// 							<p>Sus datos de contacto son:</p>
	// 							<table>
	// 								<tr>
	// 									<td>Nombre: </td>
	// 									<td><span>'.$nombre.'</span></td>
	// 								</tr>
	// 								<tr>
	// 									<td>Empresa: </td>
	// 									<td><span>'.$empresa.'</span></td>
	// 								</tr>
	// 								<tr>
	// 									<td>Email: </td>
	// 									<td><span>'.$email.'</span></td>
	// 								</tr>
	// 								<tr>
	// 									<td>Telefono: </td>
	// 									<td><span>'.$telefono.'</span></td>
	// 								</tr>
	// 							</table>
	// 							<p>Analiza la propuesta y respondele a la brevedad.</p>
	// 							<p>Buen Dia! :)</p>
	// 							<p id="spanFirma">Financiamiento Bitealo.cl</p>
	// 						</div>
	// 					</body>
	// 				</html>';
	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$cabeceras .= 'From: PropuestaWeb@bitealo.cl' . "\r\n" . //La direccion de correo desde donde supuestamente se envió
	    'Reply-To: '.$email.'' . "\r\n" . //La direccion de correo a donde se responderá (cuando el recepto haga click en RESPONDER)
	    'X-Mailer: PHP/' . phpversion();  //información sobre el sistema de envio de correos, en este caso la version de PHP
	mail($para, $titulo, $mensaje, $cabeceras);
	
?>