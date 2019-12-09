    var loginTypeButtons = document.getElementsByClassName("loginTypeButton");
    var loginType = 0;

    //Configura los botones de tipo de login para cambiar su border-bottom y el placeholder
    for(let i=0; i<loginTypeButtons.length; i++) {
        loginTypeButtons[i].addEventListener("click", ()=>{
            var email = document.getElementById("email");
            var tipo=document.getElementById("tipo");
            loginType = i;
            if(loginType == 0) {
                email.setAttribute("placeholder","Email");
                tipo.value="User"
                loginTypeButtons[1].style.borderBottomColor = "black";
                loginTypeButtons[1].style.borderBottomWidth = "1px";
                loginTypeButtons[0].style.borderBottomColor = "green";
                loginTypeButtons[0].style.borderBottomWidth = "4px";
            } else {
                email.setAttribute("placeholder","Nombre de Artista");
                tipo.value="Artista";
                loginTypeButtons[0].style.borderBottomColor = "black";
                loginTypeButtons[0].style.borderBottomWidth = "1px";
                loginTypeButtons[1].style.borderBottomColor = "green";
                loginTypeButtons[1].style.borderBottomWidth = "4px";
            }         
        });
    }



