<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
        <?php include '../html/Head.html'?>
        <link rel="stylesheet" type="text/css" href="../css/uploadSong.css">
		<title>Subir archivo de audio</title>
		<meta charset="UTF-8">
	</head>
	<body>
       
        <?php include '../php/Menus.php' ?>
        <?php
        if(isset($_SESSION['Tipo'])&& $_SESSION['Tipo']=='Artista'){
            ?>
            <section class="main" id="s1">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="wrapper">
            <div class="uploadSongForm">
                <h1>Subir nuevo audio:</h1>
                    <br>
                    <p>Título: <input id="titulo" name="titulo" type="text" heigth="48"/></p>
                    <br>
                    <p>Comentario: <input  name="comentario" type="text"/></p>
                    <br>
                    Audio:
                    <br>
                    <input id="file-input" name="file-input" type="file"/>
                    <br>
                    <br>
                    Género:   <select name="genero">                 
                        <option  value="Rock">Rock</input>
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
                    <br>
                    <br>
                    <p>Imagen portada: <input id="image-input" name="file-input" type="file"/></p>
                    <br>             
                    <input id="upload" width="50" type="submit" value="Subir"/>
                
            </div>
            </div>
            </form>
            <?php
               }else{
                    echo("No tienes permissos para acceder aquí");
                }
            ?>
        
        <?php

            if(isset($_POST['titulo'])){

                //Validar campos
                $autor=$_SESSION['NomArtista'];
                $titulo=$_POST['titulo'];
                $comentario=$_POST['comentario'];
                $genero=$_POST['genero'];
                $extension=substr($_FILES['file-input']['name'],-4);
                
                if( (strcmp($comentario,"")==0 ) || (strcmp($autor,"")==0) ){
                    echo"<script>alert('Se deben completar todos los campos')</script>";
                }else if($_FILES['file-input']['error']==4){
                    echo"<script>alert('No se ha añadido ningun audio')</script>";
                }else if( (strcmp($extension,".mp3") != 0) && (strcmp($extension,".wav") != 0) && (strcmp($extension,".ogg") != 0) ){
                    echo"<script>alert('El formato del archivo no está soportado por el sistema')</script>";
                }else{
    
                    //Mover archivo de audio a carpeta de audios.
                    
                    $ruta="../audios/".$autor . "-" . $titulo.$extension;
                    move_uploaded_file($_FILES['file-input']['tmp_name'],$ruta);
                    
                    
                    $nombreFoto=$autor ."-". $titulo;
                    $rutaImg="../images/".$nombreFoto;
                    move_uploaded_file($_FILES['image-input']['tmp_name'],$rutaImg);

                    //Añadir al xml
                    $audios=simplexml_load_file('../xml/audios.xml');

                    $audios['ultid']=$audios['ultid']+1;
                    $id=$audios['ultid'];
                    
                    $audio=$audios->addChild('audio');
                    $audio->addAttribute('id',$id);
                    $audio->addAttribute('genero',$genero);
                    $audio->addChild('fecha',date("Y/m/d H:i"));
                    $audio->addChild('autor',$autor);
                    $audio->addChild('titulo',$titulo);
                    $audio->addChild('comentario',$comentario);
                    $audio->addChild('extension',$extension);
                    $audio->addChild('image',$rutaImg);
                   

                    if(!$audios->asXML('../xml/audios.xml')){
                        echo "Ha ocurrido un problema al guardar el audio.";
                    }
                    echo"<script>alert('El audio se ha añadido correctamente.')</script>";
                    
                }
            }
        ?>

        </section>

    </body>
</html>     














