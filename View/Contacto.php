
<!DOCTYPE html>
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
	require_once('./Vendors/PHPMailer-master/class.phpmailer.php');
	$nombre = $_POST["name"];
	$correo = $_POST["email"];
	$mensaje = $_POST["message"];

	$mensaje_Email = "";
	$mensaje_Email .=  "Nombre: ".$nombre."\n";
	$mensaje_Email .=  "Correo: ".$correo."\n";
	$mensaje_Email .=  "Mensaje: ".$mensaje."\n";

	
	$email = new PHPMailer();
	$email->From      = 'you@example.com';
	$email->FromName  = 'Your Name';
	$email->Subject   = 'Message Subject';
	$email->Body      = $bodytext;
	$email->AddAddress( 'destinationaddress@example.com' );

	$file_to_attach = 'PATH_OF_YOUR_FILE_HERE';

	$email->AddAttachment( $file_to_attach , 'NameOfFile.pdf' );

	return $email->Send();
	header("Location: contacto.php?estado=exitoso");
	exit;
}
?>
<?php 
$tituloPagina = "Contacto | Superlots";
$pagina = "contacto"; 
?>

<html lang="en">
<head>
	<!-- Headers -->
    <?php include('./includes/encabezado.php');?>
</head>
<body>
	<!-- Navbar -->
	<?php include('./includes/navbar.php');?>

	<div class="container">
		<div class="page-header">
		    <h1>¿Tienes preguntas? <small>Comunicate con nosotros</small></h1>
		</div>
		<div class="row">
			<?php if (isset($_GET["estado"]) AND $_GET["estado"] == "exitoso") { ?>
				<p>Su correo se ha enviado exitosamente. Pronto estaremos en contacto.</p>
			<?php } else { ?>
				<div class="col-md-6 col-md-offset-3">
					<form class="form-horizontal" action="contacto.php" method="post">
						<!-- Name input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Nombre</label>
							<div class="col-md-9">
								<input id="name" name="name" type="text" placeholder="Tu nombre" class="form-control">
							</div>
						</div>
						<!-- Email input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="email">Correo</label>
							<div class="col-md-9">
								<input id="email" name="email" type="text" placeholder="Tu correo" class="form-control">
							</div>
						</div>
						<!-- Message body -->
						<div class="form-group">
							<label class="col-md-3 control-label" for="message">Mensaje</label>
							<div class="col-md-9">
								<textarea class="form-control" id="message" name="message" placeholder="Tu mensaje" rows="5"></textarea>
							</div>
						</div>
						<!-- Form actions -->
						<div class="form-group">
							<div class="col-md-12 text-right">
								<button type="submit" class="btn btn-primary">Enviar</button>
							</div>
						</div>
					</form>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php include('./View/CarritoModal.php');?>
	<!-- Footer -->
    <?php include('./includes/footer.php');?>
	
</body>
</html>