<?php
    session_start();
    $user = simplexml_load_file($_SESSION['Url']);
    foreach($user->playlists->playlist as $playlist) {
        if($_POST['name'] == $playlist['name']) {
            $playlist->addChild('songID', $_POST['id']);
        }
    }
    $user->asXML($_SESSION['Url']);
?>