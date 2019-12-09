<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include '../html/Head.html'?>
		<title>Lista de audios</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="libro_visitas.css" type="text/css">
	</head>
	<body>
		<?php include '../php/Menus.php' ?>
		<section class="main" id="s1"> 
		<h1 class="titulo">Lista de canciones:</h1>
        <br>
        <?php
			$audios=simplexml_load_file("../xml/audios.xml");
			echo"<br>";
		
			foreach($audios->audio as $audio){
				$autor=$audio->autor;
				$titulo=$audio->titulo;
				$extension=$audio->extension;
				$ruta="../audios/$autor-$titulo$extension";

				echo"<h3 class='name'>$autor-$titulo :</h3>";
				echo"<br>";
				echo"<p>$audio->comentario</p>";
				echo"<audio src='$ruta' controls></audio>";	
	
				echo"<br>";
				echo"<br>";
				
			}
			
        ?>

		</section>

	</body>
</html>
