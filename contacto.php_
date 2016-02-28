<?php
if(isset($_POST) && !empty($_POST)){
	$para = 'info@massanet.com.ar';
	$titulo = 'Consulta Web - RGD';
	$mensaje = 'Nombre: ' . $_POST['nombre'] . "\r\n";
	$mensaje .= 'Telefono: ' . $_POST['telefono'] . "\r\n";
	$mensaje .= 'Mail: ' . $_POST['mail'] . "\r\n";
	$mensaje .= 'Consulta: ' . $_POST['consulta'];
	$cabeceras = 'From: info@rgdobrasymontajes.com.ar' . "\r\n" .
	    'Reply-To: ' . $_POST['mail'] . "\r\n";

	mail($para, $titulo, $mensaje, $cabeceras);
}
?>
<html>
	<head>
		<title>CONTACTO | RGD - Grupo Cremonesi</title>
		<link href="css/estilos.css" type="text/css" rel="stylesheet">
		<link href="css/fuentes.css" type="text/css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/slick.css"/>
		<link rel="shortcut icon" href="favicon.ico" />

		<script type='text/javascript' src='js/jquery-1.11.0.min.js'></script>
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.0/highlight.min.js"></script>
		<script type='text/javascript' src='js/general.js'></script>
		<script type="text/javascript" src="js/slick.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
		<div id="container">
			<div id="content">
				<div id="header">
					<ul id="menu">
						<li id="logo-rgd">
							<a href="index.html" title="RGD - Grupo Cremonesi">
								<img class="logos" src="images/logo.png" alt="Logo RGD" title="RGD - Grupo Cremonesi">
							</a>
						</li>
						<li class="item-menu">
							<a href="somos.html" title="Somos">SOMOS</a>
						</li>
						<li class="item-menu">
							<a href="obras.html" title="Obras y Montajes">OBRAS Y MONTAJES</a>
						</li>
						<li class="item-menu">
							<a href="arquitectura.html" title="Arq. Comercial">ARQ. COMERCIAL</a>
						</li>
						<li class="item-menu">
							<a href="contacto.php" title="Contacto" class="active">CONTACTO</a>
						</li>
						<li id="logo-home">
							<a href="index.html" title="RGD - Grupo Cremonesi">
								<img class="logos" src="images/home.png" alt="Logo RGD" title="RGD - Grupo Cremonesi">
							</a>
						</li>
					</ul>
				</div>
				<div id="content-page">
					<div class="title">
						<h1>CONTACTO</h1>
					</div>
					<div class="contenido contenido-form">
						<div id="content-left">
							<img class="iconos-obras" src="images/consulta.png" alt="Consulta" title="Consulta">
								<form method="POST">
									<table id="formulario">
										<tr>
											<td colspan="2">
												<label class="form-text-nombre">Nombre <br /></label> 
												<input required type="text" class="input-text" name="nombre" id="consulta-nombre" />
											</td>
										</tr>
										<tr>
											<td>
												<label class="form-text-telefono">Tel&eacute;fono <br /></label> 
												<input required type="text" class="input-text" name="telefono" id="consulta-telefono" pattern="[0-9]+"/>
											</td>
											<td>
												<label class="form-text-mail">Mail <br /></label> 
												<input required type="email" class="input-text" name="mail" id="consulta-mail" />
											</td>
										</tr>
										<tr>
											<td colspan="2">
												<label class="form-text-consulta"> Consulta <br /></label>
												<textarea required id="form-consulta" name="consulta"></textarea>
											</td>
										</tr>
									</table>
									<div class="wrapper-buttons">
										<button id="btn-borrar" class="btn-contacto">BORRAR</button>
										<input type="submit" value="ENVIAR" id="btn-enviar" class="btn-contacto" />
									</div>
								</form>
						</div>
						<div id="content-right">
							<img class="ubicacion" src="images/ubicacion.png" alt="Ubicacion" title="Ubicacion">
							<p class="texto-ubicacion">
								<b>Grupo Cremonesi</b> <br />
								Av. Gaona 4526 (1702) Ciudadela.<br />
								Bs. As. Argentina <br />
								Tel./Fax: (54-11) 4653-5444 / 4052 <br />
								<a href="mailto:info@rgdobrasymontajes.com.ar" target="_top">info@rgdobrasymontajes.com.ar</a>
							</p>
							<iframe 
								src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3282.771924459494!2d-58.553104399999995!3d-34.635203499999946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc80795cdd63d%3A0xa0750be82377e527!2sAv+Gaona+4526!5e0!3m2!1ses!2sar!4v1398023123431" 
								width="375" 
								height="235" 
								frameborder="0" 
								style="border:0">
							</iframe>
						</div>
					</div>
				</div>
				<div id="footer">
					<ul id="footer-menu">
						<li class="footer-item-menu">
							<a href="somos.html" title="Somos">Somos</a>
						</li>
						<li>&bull;</li>
						<li class="footer-item-menu">
							<a href="obras.html" title="Obras y Montajes">Obras y Montajes</a>
						</li>
						<li>&bull;</li>
						<li class="footer-item-menu">
							<a href="arquitectura.html" title="Arq. Comercial">Arq. Comercial</a>
						</li>
						<li>&bull;</li>
						<li class="footer-item-menu">
							<a href="contacto.php" title="Contacto">Contacto</a>
						</li>					
					</ul>
					<div id="container-rule">
						<img src="images/linea.png" >
					</div>
					<img id="logo-grupo" src="images/logo-grupo.png" alt="Logo Grupo Cremonesi" title="Logo Grupo Cremonesi">
					<p>
						Av. Gaona 4526 (1702) - Ciudadela. Bs. As. Argentina - Tel./Fax: (54-11) 4653-5444 / 4052 - info@rgdobrasymontajes.com.ar<br />
						Copyright © 2014 . Todos los derechos reservados.
					</p>
					<img id="logo-cpa" src="images/logo-cpa.png" alt="Logo Grupo Cremonesi" title="Logo Grupo Cremonesi">
				</div>
				<?php if(isset($_POST) && !empty($_POST)): ?>
					<script type="text/javascript">
						alert("Mensaje enviado correctamente.");
					</script>
				<?php endif; ?>
			</div>
		</div>
	</body>
</html>