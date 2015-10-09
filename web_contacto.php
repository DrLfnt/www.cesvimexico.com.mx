<?php
	include("smtpmail.php");

	// Aqui colocamos los campos que tiene nuestro formulario

	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$telefonoCelular = $_POST['telefonoCelular'];
	$telefonoEmpresa = $_POST['telefonoEmpresa'];
	$empresa = $_POST['empresa'];
	$emailEmpresa = $_POST['emailEmpresa'];
	$emailPersonal = $_POST['emailPersonal'];
	$cargoEmpresa = $_POST['cargoEmpresa'];
	$asunto = $_POST['asunto'];
	$comentario = $_POST['comentario'];
	$error = '';
	// Aqui comprobamos si el usuario ingreso los datos requeridos
	if ($nombre == "")
	{ 
		$error.="No ha ingresado su Nombre <br />\n";
	}if ($apellido == "")
	{ 
		$error.="No ha ingresado su Apellido <br />\n";
	}if ($telefonoCelular == "")
	{ 
		$error.="No ha ingresado su número de teléfono de celular <br />\n";
	}if ($telefonoEmpresa == "")
	{ 
		$error.="No ha ingresado su número de teléfono de oficina <br />\n";
	}if ($empresa == "")
	{ 
		$error.="No ha ingresado su el nombre de su Empresa <br />\n";
	}if ($emailEmpresa == "")
	{ 
		$error.="No ha ingresado su Email Empresarial <br />\n";
   	}if(ereg("[a-z0-9_.]+@[a-z0-9]+[.][.a-z0-9]+",$emailEmpresa)==0 && $emailEmpresa!="")
   	{
		$error.="El Email ingresado no es valido <br />\n";
   	if ($asunto == "")
   	{ 
		$error.="No ha ingresado su Asunto <br />\n";
	}
   	}if ($emailPersonal == "")
	{ 
		$error.="No ha ingresado su Email Personal <br />\n";
   	}if(ereg("[a-z0-9_.]+@[a-z0-9]+[.][.a-z0-9]+",$emailPersonal)==0 && $emailPersonal!="")
   	{
		$error.="El Email ingresado no es valido <br />\n";
   	if ($asunto == "")
   	{ 
		$error.="No ha ingresado su Asunto <br />\n";
	}
   	}if ($cargoEmpresa == "")
	{ 
		$error.="No ha ingresado su cargo en la empresa <br />\n";
	}if ($comentario=="")
   	{ 
		$error.="No ha ingresado su Consulta o Comentario <br />\n";	
   	}if ($error != "")
   	{
		// Este es el archivo que contendra el mensaje de error
		include ("contacto_error.php");
		exit;
	}else{
		
		// Aqui armamos el mensaje

		$TxtMensa="-------------------------------------------------------------\n\n";
		$TxtMensa.="Consulta en Atencion al Cliente Cesvi México \n\n";
		$TxtMensa.="------------------------------------------------------------\n\n";
		
		
		$TxtMensa.="Nombre: $nombre\n";
		$TxtMensa.="Apellido: $apellido \n";
		$TxtMensa.="Empresa: $empresa\n";
		$TxtMensa.="Cargo Empresa: $cargoEmpresa\n";
		$TxtMensa.="Telefono Empresa: $telefonoEmpresa\n";
		$TxtMensa.="Email Empresa: $emailEmpresa\n";
		$TxtMensa.="Telefono Celular: $telefonoCelular\n";
		$TxtMensa.="Email Personal: $emailPersonal\n";
		$TxtMensa.="Asunto: $asunto\n";
		$TxtMensa.="Consulta: $comentario \n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n";

	// Aqui hacemos el envio del email

        $Mail =& new PHPMailer();
        $Mail->IsSMTP();
        $Mail->Host = "localhost:25";
        $Mail->SMTPAuth = false;
        $Mail->WordWrap = 50;
        $Mail->FromName = $nombre;
        $Mail->From = $emailEmpresa;
        $Mail->Priority = 1;
        $Mail->Subject = $asunto;
        $Mail->Body = $TxtMensa;

 	 $Mail->AddAddress("ventas@cesvimexico.com.mx", "Ventas Cesvi México");
	 $Mail->Send();
	// Este es el archivo que contendra el mensaje de agradecimiento o puede ingresar otra ruta para que lo redireccione despues de enviado el correo
	 include ("contacto_gracias.php");
	
	}

?>