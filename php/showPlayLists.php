<?php
    session_start();
?>
<html>
    <head>
        <title>Mostrar PlayList</title>
        <link rel="stylesheet" type="text/css" href="../css/plList.css">
        <link rel="stylesheet" type="text/css" href="../css/createPLPopUp.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <body>
        <?php include '../php/Menus.php' ?>
        <div class="wrapper">
            <div id="plListContainer">
                <div id="plList">
                    <?php
                        $user = simplexml_load_file($_SESSION['Url']);
                        foreach ($user->playlists->playlist as $playlist){
                            echo '<div class="plButton" id="'.$playlist['name'].'">'.$playlist['name'].'</div>';
                        }
                    ?>
                </div>
                <div id="createPopUp"> + Crear Playlist</div>
            </div>
            <div id="sngListContainer">
                <div id="controlerContainer">
                    <img width="166" height="166" id="sngImage" src="../images/image.png"/>
                    <div id="controler">
                        <div id="sngInfo">
                            <h2 id="name"></h2>
                            <h3 id="autor"></h3>
                        </div>
                        <div id="timeTraveler"></div>
                        <div id="controlButtons">
                            <div class="controlButton" onclick="controlAudio(0)">
                                <span class="control-content">|&lt;</span>
                            </div>
                            <div class="controlButton" onclick="controlAudio(1)">
                                <span class="control-content">&gt;</span>
                            </div>
                            <div class="controlButton" onclick="controlAudio(2)">
                                <span class="control-content">&gt;|</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="sngList">
                </div>
            </div>
        </div>
        <div class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <h3>Nombre de la nueva Playlist</h3>
                <input type="text" id="newPlaylistName" size="60"/>
                <div id="uploadPlayListName">CREATE</div>
            </div>
        </div>
        <script src="../js/createPLPopUp.js"></script>
        <script src="../js/audioControler.js"></script>
        <script src="../js/sendPlayListRequest.js"></script>
    </body>
</html>
