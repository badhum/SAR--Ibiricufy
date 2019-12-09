<?php
    session_start();
    echo '<songs>';
    $user = simplexml_load_file($_SESSION['Url']);
    $audios = simplexml_load_file('../xml/audios.xml');
    foreach($user->playlists->playlist as $playlist) {
        if($playlist['name'] == $_POST['selectedPlayList']) {
            foreach($playlist->songID as $songID) {
                foreach($audios->audio as $audio) {
                    if(strval($songID) == strval($audio['id'])) {
                        echo '<song>';
                        echo '<titulo>'.$audio->titulo.'</titulo>';
                        echo '<autor>'.$audio->autor.'</autor>';
                        echo '<extension>'.$audio->extension.'</extension>';
                        echo '<image>'.$audio->image.'</image>';
                        echo '</song>';
                    }
                }
            }
        }
    }
    echo '</songs>';
    exit();
?>