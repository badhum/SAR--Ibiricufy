var sngImage = document.getElementById("sngImage");
var sngName = document.getElementById("name");
var sngAutor = document.getElementById("autor");
var controlButtons = document.getElementsByClassName("controlButton");
var timeTraveler = document.getElementById("timeTraveler");

//Array de urls de las canciones en orden de apracion
var songsURL = [];
//Url de las imagenes de las canciones en orden de aparicion
var imageURL = [];
var actSngIndex;
var audio;

//Cambia la cancion seleccionada
function startSong(selectedIndex) {
    if(audio != null) {
        audio.pause();
    }
    configAudio(selectedIndex);
    audio.play();
    controlButtons[1].innerHTML = "||";
}

//Control de los botones |<; >; >|
function controlAudio(controlID) {
    if(audio == null) {
        return -1;
    }
    switch(controlID) {
        case 0:
            actSngIndex--;
            if(actSngIndex < 0) {
                actSngIndex = songsURL.length-1;
            }
            startSong(actSngIndex);
        break;
        case 1:
            if(!audio.paused) {
                audio.pause();
                controlButtons[1].innerHTML = ">";
            } else {
                audio.play();
                controlButtons[1].innerHTML = "||";
            }
        break;
        case 2:
            actSngIndex++;
            if(actSngIndex >= songsURL.length) {
                actSngIndex = 0;
            }
            startSong(actSngIndex);
        break;
    }
}

//Actualiza l controlador de audio para poner la info de la cancion
function updateSngInfo(url, index) {
    let values = url.split('.')[0].split('-');
    sngName.innerHTML = values[1];
    sngAutor.innerHTML = values[0];
    sngImage.src = "../images/"+imageURL[index];
}

function restartTimeTraveler() {
    timeTraveler.style.width = "0%";
}

//Reconfigura le audio para que suena la cancion seleccionada
function configAudio(selectedIndex) {
    restartTimeTraveler();
    let url = songsURL[selectedIndex];
    updateSngInfo(url, selectedIndex);
    audio = new Audio("");
    audio.currentTime = 0;
    audio.src = "../audios/"+url;
    actSngIndex = selectedIndex;
    
    audio.addEventListener("timeupdate", ()=>{
        let aux = (100*audio.currentTime)/audio.duration;
        timeTraveler.style.width = aux+"%";   
    });

    audio.addEventListener("ended", ()=>{
        controlAudio(2);
    });
}