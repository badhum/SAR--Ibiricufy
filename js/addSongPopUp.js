let modal = document.querySelector(".modal");
let closeBtn = document.querySelector(".close-btn");

//Array en la que se guardan los id de las canciones en orden de aparicion
var songID = [];
let plButtons = document.getElementsByClassName("plButton");

//Añade los eventos de click para seleccionar playlist a la que añadir cancion
for(let i=0; i<plButtons.length; i++) {
    plButtons[i].addEventListener("click", ()=> {
        addSong(plButtons[i].id, songID[i]);
    });
}

closeBtn.onclick = function(){
    modal.style.display = "none";
}

function displayPopUp(id) {
    modal.style.display = "block";
}

//hace la peticion al servidor de añadir la cancion songID a la playlist plName
function addSong(plName, songId) {
    $.ajax({
        type: "POST",
        url: "../php/addSongToPLaylist.php",
        data: { 
            name: plName,
            id: songId
        },
        success: function(result) {
            modal.style.display = "none";
        },
        error: function(result) {
            alert("Ha ocurriso un error");
        }
    });
}
