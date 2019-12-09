<?php
    session_start();
    $user = simplexml_load_file($_SESSION['Url']);
    $nuevo = $user->playlists->addChild('playlist');
    $nuevo->addAttribute('name',$_POST['name']);
    $user->asXML('../xml/'.$_SESSION['Url']);
?> 