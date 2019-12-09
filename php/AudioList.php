<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../html/Head.html'?>
        <title>Audios</title>
        <link rel="stylesheet" type="text/css" href="../css/audList.css">
        <link rel="stylesheet" type="text/css" href="../css/addSongPopUp.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.1/jquery.min.js"></script>
    </head>
    <body onload="getAllAudios()">
        <?php include '../php/Menus.php' ?>
        <?php
        if(isset($_SESSION['Tipo'])&& $_SESSION['Tipo']=='User'){
            ?>
            
            <div id="filters">
            
                <p>Filtrar por genero: 
                    <select id="genero">                 
                        <option  value="Rock" selected>Rock</input>
                        <option  value="Pop">Pop</input>
                        <option  value="Indie">Indie</input>
                        <option  value="K-Pop">Kpop</input>
                        <option  value="EDM">EDM</input>
                        <option  value="Jazz">Jazz</input>
                        <option  value="Metal">Metal</input>
                        <option  value="K-Pop">Kpop</input>
                        <option  value="Blues">Blues</input>
                        <option  value="Otro">Otro</input>
                    </select>
                </p>
                <br>
                <input type="button" id="filter" value="Aceptar"></input>
                <input type="button" id="visualizeAll" value="Visualizar todos"></input>
                <br>
            </div>
            
            
            
            <div id="songs" class="wrapper">
            </div>
            <div class="modal">
                <div class="modal-content">
                    <span class="close-btn">&times;</span>
                    <h3>Elige Playlist</h3>
                    <br/>
                    <?php
                        $user = simplexml_load_file($_SESSION['Url']);
                        foreach ($user->playlists->playlist as $playlist) {
                            echo '<div class="plButton" id="'.$playlist['name'].'">'.$playlist['name'].'</div>';
                        }
                    ?>
                </div>
            </div>
            <script src="../js/addSongPopUp.js"></script>
            <script src="../js/audioListControler.js"></script>
            <script src="../js/getAudiosFromServer.js"></script>
        <?php
        }else{
          echo("No tienes permissos para acceder aquí");
        }
        ?>
        
    </body>
</html>