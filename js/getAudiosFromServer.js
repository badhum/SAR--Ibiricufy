var container = document.getElementsByClassName("wrapper");

document.getElementById("filter").addEventListener("click", function(){
    getAudiosByGenre();
});
document.getElementById("visualizeAll").addEventListener("click", function(){
    document.getElementById("songs").innerHTML="";
    getAllAudios();
});

//Pide al servidor todas las canciones disponibles en la aplicacion
function getAllAudios() {
    $.ajax({
        type: "POST",
        url: "../php/GetAllAudios.php",
        data: {},
        success: function(result) {
            let parser = new DOMParser();
            let xmlDoc = parser.parseFromString(result,"text/xml");
            let songs = xmlDoc.getElementsByTagName("song");
            for(let i=0; i<songs.length; i++) {
                let song = songs[i];
                addSongCard(song, i);
            }
        },
        error: function(result) {
            alert("Mierda");
        }
    });
}

//Añade una "carta" de cancion a la pagina
function addSongCard(song, index) {
    let id = song.getElementsByTagName("id")[0].childNodes[0].nodeValue;
    let titulo = song.getElementsByTagName("titulo")[0].childNodes[0].nodeValue;
    let autor = song.getElementsByTagName("autor")[0].childNodes[0].nodeValue;
    let extension = song.getElementsByTagName("extension")[0].childNodes[0].nodeValue;
    let image = song.getElementsByTagName("image")[0].childNodes[0].nodeValue;
    let card = "";
    card += '<div class="sngCard">';
        card += '<div class="sngInfo">';
            card += '<img width="100" height="100" src="../images/'+image+'"/>';
            card += '<h3>'+titulo+'</h3>';
            card += '<h4>'+autor+'</h4>';
        card += '</div>'; 
        card += '<div class="controler">';
            card += '<div class="timeTravelerContainer">';
                card += '<div class="timeTraveler"></div>';
            card += '</div>';
            card += '<div class="playButtonContainer">';
                card += '<div id="'+index+' "class="playButton" onclick="startSong('+index+')">';
                    card += '<div class="playButton-content">></div>';
                card += '</div>';
                //Añadir cancion
                card += '<div id="'+index+' "class="addSng" onclick="displayPopUp('+id+')">';
                    card += '<div class="addSng-content">+</div>';
                card += '</div>';
            card += '</div>';
        card += '</div>';
    card += '</div>';
    songsURL.push(autor+"-"+titulo+extension+"\n");
    songID.push(id);
    container[0].innerHTML += card;
}

//Pide al servidor todas las canciones de un genero en concreto que esten disponibles en la aplicacion
function getAudiosByGenre() {
    document.getElementById("songs").innerHTML="";
    $.ajax({
        type: "POST",
        url: "../php/GetAllAudios.php",
        data: {},
        success: function (result) {
            let parser = new DOMParser();
            let xmlDoc = parser.parseFromString(result, "text/xml");
            let songs = xmlDoc.getElementsByTagName("song");
            let genero = document.getElementById("genero").value;
            
            for (let i = 0; i < songs.length; i++) {
                let song = songs[i];
                
                if (song.getElementsByTagName("genero")[0].childNodes[0].nodeValue==genero) {
                    addSongCard(song, i);
                }
            }
        },
        error: function (result) {
            alert("Se ha producido un error.");
        }
    });
}




