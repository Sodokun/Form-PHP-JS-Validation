<?php 

include("con_db.php");


//Patrones 
$p_names = "/^[a-zA-ZÀ-ÿ\s]{1,40}$/"; // Letras y espacios, pueden llevar acentos.
$p_mail = "/^[a-zA-Z0-9.!#$%&'*+=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/"; // Email regex w3.org
$p_pass = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{7,11}[^'\s$@$!%*?&_.:,;]$/"; // 8 a 12 Upper+lower+Number  

$ser_Error = array();

//Registro de Datos en SQL
if (isset($_POST['register'])) {

	//var formulario
	$Fname =trim($_POST["Fname"]);
	$Lname=trim($_POST["Lname"]);
	$mail=trim($_POST["mail"]);
	$pass =trim($_POST["pass"]);

	//Validacion de campos vacios y por patrones
	if (empty($Fname) || empty($Lname) || empty($mail) || empty($pass)) {
		$ser_Error[]= '<p>Debe completar todos los campos</p>';
	} else {
		if( !preg_match($p_names, $Fname )){
			$ser_Error[] = '<p>El Nombre debe incluir solo  Letras y espacios</p>';
		};
		if( !preg_match($p_names, $Lname )){
			$ser_Error[] = '<p>El Apellido debe incluir solo  Letras y espacios</p>';
		};
		if( !preg_match($p_mail, $mail )){
			$ser_Error[] = '<p>El E-mail debe poseer la siguiente estructura example@correo.com</p>';
		};
		if( !preg_match($p_pass, $pass )){
			$ser_Error[] = '<p>La contraseña debe contener de 8 a 12 caracteres,<br> al menos 1 letra mayúscula, 1 letra minúscula y 1 número</p>';
		};		
	}

	//Consulta para clave primaria 'email' repetida
	$consult = "SELECT `email` FROM `form` WHERE email = '$mail'";
	$from_db = mysqli_query($link, $consult);
	$rows = mysqli_num_rows($from_db);

	if ($rows!=0){
		//Mensaje de Error si 'email' esta registrado
		$ser_Error[]= '<p><strong>E-mail ya registrado</strong></p>';		
	} ;

	if( count($ser_Error) > 0 )
	{
		echo '<div class="container p-3 text-white bad"><h3>Errores Encontrados:</h3>';

		for( $i=0; $i < count($ser_Error); $i++ ){
			echo $ser_Error[$i];
		}

		echo "</div>";

	} else { // 0 Errores

		// Insercion de datos en SQL
		$insert = "INSERT INTO `form`(`first_n`, `last_n`, `email`, `password`) VALUES ('$Fname','$Lname','$mail','$pass')";
		$to_db = mysqli_query($link, $insert);

		//Mensaje de Exito Error
		if ($to_db) {
			?> 
			<h3 class="ok">¡Te has inscrito correctamente!</h3>
			<?php
		} else {
			?> 
			<h3 class="bad">¡Ha ocurrido un error con la Base de datos!</h3>
			<?php
		}
	}

}
?>
