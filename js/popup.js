//PopUp Change Password
var btnAbrirPopupChangePass = document.getElementById('btn-abrir-popup-changepass'),
	overlayChangePass = document.getElementById('overlay-changepass'),
	popupChangePass = document.getElementById('popup-changepass'),
	btnCerrarPopupChangePass = document.getElementById('btn-cerrar-popup-changepass');

	btnAbrirPopupChangePass.addEventListener('click', function(){
		overlayChangePass.classList.add('active');
		popupChangePass.classList.add('active');
	});
	
	btnCerrarPopupChangePass.addEventListener('click', function(e){
		e.preventDefault();
		overlayChangePass.classList.remove('active');
		popupChangePass.classList.remove('active');
	});


//PopUp Delete Account
var btnAbrirPopupDeleteAcount = document.getElementById('btn-abrir-popup-deleteaccount'),
	overlayDeleteAcount = document.getElementById('overlay-deleteaccount'),
	popupDeleteAcount = document.getElementById('popup-deleteaccount'),
	btnCerrarPopupDeleteAcount = document.getElementById('btn-cerrar-popup-deleteaccount');
	

btnAbrirPopupDeleteAcount.addEventListener('click', function(){
	overlayDeleteAcount.classList.add('active');
	popupDeleteAcount.classList.add('active');
});

btnCerrarPopupDeleteAcount.addEventListener('click', function(e){
	e.preventDefault();
	overlayDeleteAcount.classList.remove('active');
	popupDeleteAcount.classList.remove('active');
});

//PopUp Opciones Usuarios
var btnAbrirPopupOptions = document.getElementById('btn-abrir-popup-options'),
	overlayOptions = document.getElementById('overlay-options'),
	popupOptions = document.getElementById('popup-options'),
	btnCerrarPopupOptions = document.getElementById('btn-cerrar-popup-options');
	

btnAbrirPopupOptions.addEventListener('click', function(){
	overlayOptions.classList.add('active');
	popupOptions.classList.add('active');
});

btnCerrarPopupOptions.addEventListener('click', function(e){
	e.preventDefault();
	overlayOptions.classList.remove('active');
	popupOptions.classList.remove('active');
});



