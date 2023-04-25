<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?= $this->_titlepage ?></title>
	<link rel="stylesheet" type="text/css" href="/scripts/carousel/carousel.css">
	<link rel="stylesheet" href="/components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="/skins/page/css/global.css">
	<link rel="shortcut icon" href="/favicon.ico">
	<script type="text/javascript" id="www-widgetapi-script" src="https://s.ytimg.com/yts/jsbin/www-widgetapi-vflS50iB-/www-widgetapi.js" async=""></script>
	<script src="https://www.youtube.com/player_api"></script>
	<script src="/components/jquery/dist/jquery.min.js"></script>
	<script src="/scripts/popper.min.js"></script>
	<script src="/components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/scripts/carousel/carousel.js"></script>
	<script src="/skins/page/js/main.js"></script>
</head>
<body>
	<header>
        <div class="fondo-encuentas">
            <div class="container">
                <div class="row margen_logo_encuesta">
                    <div class="col-md-6"><img src="/skins/page/images/logo-feroldan.png"></div>
                    <div class="col-md-6 margen_user text-right"><?php if ($_SESSION['kt_login_id'] > 0) { ?> 
						<span style="font-size:15px;"><i class="fas fa-user-tie" aria-hidden="true"></i> Hola, <?php echo $_SESSION['kt_login_name']; ?></span>
						<a href="/page/login/logout" class="enlace-salir">Salir <i class="fas fa-sign-out-alt"></i></a></i>
					<?php } else { ?>
						<a href="" data-toggle="modal" data-target="#exampleModal" class="iniciar-sesion"><i class="fas fa-user"></i> Iniciar Sesión</a>
					<?php } ?></div>
                </div>
            </div>
        </div>
	</header>
	<div><?= $this->_content ?></div>
    <div class="footer_encuesta">
        <div class="text-center col-md-12">
            &copy; FEROLDÁN | Diseñado por Omega Soluciones Web
        </div>
	</div>
	<div class="adicionales">
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Iniciar Sesión</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
				<form  method="POST" id="formulario">
					<div class="form-group">
					<label for="exampleInputEmail1">Usuario</label>
					<input type="text" name="user"class="form-control" placeholder="Usuario" required>
					</div>
					<div class="form-group">
					<label for="exampleInputPassword1">Contraseña</label>
					<input type="password" name="password"class="form-control" placeholder="Contraseña" required>
					</div>
					<div id="resp"  align="center"></div>
					<div class="text-center"><a href="/page/index/olvido" class="olvido-contrasena">¿Haz olvidado tu contraseña?</a></div> </br>
					<div align=center><a id="btn-ingresar" style="color:#ffffff;" class="btn btn-primary">Ingresar</a></div>
				</form>
				</div>
			</div>
			</div>
		</div>
	</div>
	<script>
		$('#btn-ingresar').click(function(){
			console.log("entro");
			var url = "/page/login";
			$.ajax({                        
				type: "POST",                 
				url: url,                     
				data: $("#formulario").serialize(), 
				success: function(data)             
				{
				console.log(data);
					$('#resp').html(data.mensaje); 
					if(data.error == false){
					location.reload();
					}              
				}
			});
		});
	</script>
</body>
</html>