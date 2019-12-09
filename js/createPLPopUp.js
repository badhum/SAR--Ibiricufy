var createPopUpButton = document.getElementById("createPopUp");
var newName = document.getElementById("newPlaylistName");
var uploadNameButton = document.getElementById("uploadPlayListName");
let modal = document.querySelector(".modal");
let closeBtn = document.querySelector(".close-btn")

createPopUpButton.onclick = function(){
    modal.style.display = "block";
}

closeBtn.onclick = function(){
    modal.style.display = "none";
    newName.value = "";
}

uploadNameButton.addEventListener("click", ()=> {
    $.ajax({
        type: "POST",
        url: "../php/createNewPlayList.php",
        data: { 
            name: newName.value,
        },
        success: function(result) {
            newName.value = "";
            modal.style.display = "none";
            location.href="../php/showPlayLists.php";
        },
        error: function(result) {
            alert("Ha ocurrido un error.");
        }
    });
});

