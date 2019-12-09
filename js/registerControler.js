    var loginTypeButtons = document.getElementsByClassName("loginTypeButton");
    var loginType = 0;
    

    for(let i=0; i<loginTypeButtons.length; i++) {
        loginTypeButtons[i].addEventListener("click", ()=>{
            loginType = i;
            var name = document.getElementById("name");
            var tipo=document.getElementById("tipo");
            
            if(loginType == 0) {
                name.setAttribute("placeholder","Nombre y Apellidos");
                tipo.value="User";
                
                loginTypeButtons[1].style.borderBottomColor = "black";
                loginTypeButtons[1].style.borderBottomWidth = "1px";
                loginTypeButtons[0].style.borderBottomColor = "green";
                loginTypeButtons[0].style.borderBottomWidth = "4px";
            } else {
                name.setAttribute("placeholder","Nombre de Artista");
                tipo.value="Artista";
                
                loginTypeButtons[0].style.borderBottomColor = "black";
                loginTypeButtons[0].style.borderBottomWidth = "1px";
                loginTypeButtons[1].style.borderBottomColor = "green";
                loginTypeButtons[1].style.borderBottomWidth = "4px";
            }
            
        });
    }

   







