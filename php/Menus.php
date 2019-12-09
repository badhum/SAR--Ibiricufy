<div id='page-wrap'>
<header class='main' id='h1'>
	
</header>

	<nav class='main' id='n1' role='navigation'>
			<link rel='stylesheet' href='../css/options.css'>
			<link rel='stylesheet' href='../css/menu.css'>
			
			<div id='menu'>
				<span class='op'><a href='Layout.php'>Inicio</a></span>
				<span class='op'><a href='Credits.php'>Cr&eacute;ditos</a></span>
						
				

				<?php 
				if(isset($_SESSION['Tipo'])){
				    include '../php/popup.php';
					if($_SESSION['Tipo']=='User'){
						echo("<span class='op'><a href='AudioList.php'> Visualizar lista de audios</a></span>");
						echo("<span class='op'><a href='showPlayLists.php'> Visualizar playlists</a></span>");
					}else if($_SESSION['Tipo']=='Artista'){
						echo("<span class='op'><a href='subirArchivo.php'> Añadir audio</a></span>");

					}
					echo"<span class='op'><a href='Logout.php'>Logout</a></span>";

					?>
					<p align= 'right' >
						<?php 
						if($_SESSION['Tipo']=='User'){
							echo "{$_SESSION['Nombre']} {$_SESSION['Apellidos']}   ";
							
						}else{
							echo "{$_SESSION['NomArtista']}   ";
						}
						    
						?>																	
						<button id='btn-abrir-popup-options' class='btn-abrir-popup-options'>
							<img src='../images/ajuste.png' width='15' height='15'/>Ajustes 
						</button>    
					</p>
				<?php
				}else{
					echo"<span class='op'><a href='Register.php'>Registrarse</a></span>";
					echo"<span class='op'><a href='Login.php'>Login</a></span>";

				}
					
				?>			

			</div>
			<?php 
				if(isset($_SESSION['Tipo'])){
					echo"<script src='../js/popup.js'></script>";
				}
			?>
				
		
		

	</nav>

 	
