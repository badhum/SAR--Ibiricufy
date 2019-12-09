<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

<div class='overlay' id='overlay-options'>
    <div class='popup' id='popup-options'>	                		
        <h2>Ajustes</h2>							
        <br>
        <button id='btn-abrir-popup-changepass' class='btn-abrir-popup'>Cambiar Contraseña</button>   								
        <button id='btn-abrir-popup-deleteaccount' class='btn-abrir-popup'>Borrar Cuenta</button>   
        <br>
        <br>
        <a href='#' id='btn-cerrar-popup-options' ><button >Cancelar</button></a>							
    </div>
</div>

<div class='overlay' id='overlay-changepass'>
	<div class='popup' id='popup-changepass'>										
		<h3>CAMBIAR CONTRASEÑA</h3>
		<form action='ChangePass.php' method='POST'>
			<br>
			Contraseña antigua:
			<br>
			<input id='antiguapass' name='antiguapass' type='password' required>                        
			<br>
			Nueva contraseña:
			<br>
			<input id='nuevapass' name='nuevapass' type='password' required>
			<br>
			<br>
			<input type='submit' id='btn-cambiar-pass'>                               
			<a href='#' id='btn-cerrar-popup-changepass' ><button >Cancelar</button></a>
		</form>
	</div>
</div>
	
<div class='overlay' id='overlay-deleteaccount'>
	<div class='popup' id='popup-deleteaccount'>	                		
		<h3>BORRAR CUENTA</h3>	
			<form action='BorrarUsuario.php' method='POST'>
				<div class='contenedor-inputs'>
					<font size='2'> ¿Está seguro que desea eliminar su cuenta? 
				</div>  
				<br>    
				<a href='#' id='btn-cerrar-popup-deleteaccount' ><button >CANCELAR</button></a>                
				<br>
				<br>
				Deseo borrar mi cuenta:
				<br>
				<input id='pass' name='pass' type='password' size='6' placeholder='contraseña' required>				
				<input id= 'btn-borrar-usuario' type='submit' value='Confirmar' >
			</form>
            
	</div>
</div>

<script src='../js/RemoveUser.js'></script>
