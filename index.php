<?php include('include/cambridgeController.php'); ?>
<html lang="es-Es">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded" rel="stylesheet">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</head>
	<div class="body">
		<div class="container">
			<div class="header clearfix">
				<nav>
					<h3 style="color:red">eClass</h3>
					<hr>
				</nav>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="jumbotron text-center">
						<h1>Cambridge Dictionary</h1>
						<div class="row">
							<div class="col-md-6">
								<form action="index.php" method="POST">
									<input type="text" name="buscar" class="form-control input-xxlarge">
									<input type="submit" value="Buscar" class="form-control btn btn-info">
								</form>
							</div>	
							<div class="col-md-6">
								<p>Search on the fly</p>
								<p id="onTheFly" data-toggle="popover" data-placement="top" data-content=""><i>Roses are red, violets are blue</i></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php 
			if(!empty($_POST)){
				$resultados = explotaApi();
				if(!empty($resultados[0]['busqueda'])){
			?>	
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#entradas">Entradas</a></li>
						<li><a data-toggle="tab" href="#definiciones">Definición</a></li>
						<li><a data-toggle="tab" href="#otros">Otro</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="entradas">
							<?php foreach($resultados as $resultado){ ?>
								<div class="row">
									<div class="col-md-12">
										<h4><?php print_r($resultado['busqueda'])?></h4>
										<p><?php print_r($resultado['definiciones'])?></p>
										<?php foreach($resultado['pronunciaciones'] as $tag => $pronuncia ){ ?>
												
											<p>
											<?php echo $tag;?>
											<audio controls class="playback">
												<source src="<?php echo $pronuncia ?>" type="audio/mp3">
												Tu navegador no soporta el elemento audio
											</audio>
											</p>
										<?php } ?>
									</div>
								</div>
								<hr>
							<?php }	?> 
						</div>
						<div class="tab-pane" id="definiciones">
							<div class="row">
								<div class="col-md-12">
									<h4>Definición</h4>
									<p>Definición</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<h4>Definición</h4>
									<p>Definición</p>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="otros">
							<div class="row">
								<div class="col-md-12">
									<h4>Otros</h4>
									<p>Definición</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<h4>Otros</h4>
									<p>Definición</p>
								</div>
							</div>
						</div>
					</div>
			<?php 	}elseif(!empty($resultados[0]['mean'])){ ?>
				<div class="alert alert-warning">
			 		<p class="text-center">No hay resultados.</p>
					<p>Quizá quisiste buscar uno de los siguientes términos</p>
					<br/>
			 		<ul>

			 			<?php foreach($resultados[0]['mean'] as $resultado){ ?>
			 				<li><?php print_r($resultado); ?></li>
			 			<?php } ?>
			 		</ul>
			 	</div>
			<?php }else{ ?>
				<div class="alert alert-danger text-center">
			 		<p>No hay resultados</p>
			 	</div>
			<?php } 
			}else{
				echo "no estoy en post";
			}?>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#onTheFly').mouseup(function(event){
				document.captureEvents(Event.MOUSEUP);
				var seleccion = window.getSelection().toString();
				console.log(document.selection.createRange().text);
				$('#onTheFly').popover({
					content: seleccion,
				});
			});
		});



		if (window.addEventListener) {
			window.addEventListener('load',addPlayBack, false);
		}
		else {
			window.attachEvent && window.attachEvent('onload',addPlayBack);
		}
		function addPlayBack() {
			var anchors = document.getElementsByClassName('playback');
			for (var i = 0; i < anchors.length; i++) {
				var anchor = anchors[i];
				anchor.onclick = function(){
					var audio = this.nextElementSibling;
					var audioclone = audio.cloneNode(1);
					audioclone.onended = function() {
						audioclone.pause();
						audioclone = null; 
					};
					audioclone.play();
					return false;
				};
			}
		}
	</script>
</html>