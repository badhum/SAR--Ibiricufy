
<html>
    <head>
        <?php include '../html/Head.html'?>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <body>
        <?php include '../php/Menus.php' ?>

        <form action="Register.php" method="post" enctype="multipart/form-data">
        <div class="wrapper"> 
            <div id="registerUser" class="loginTypeButton" >Register</div>
            <div id="registerArtist" class="loginTypeButton" >Register for Artists</div>
            <div class="loginForm">
                <input type="email" name="email" placeholder="Email" required />
                <input type="text" id="name"name="name" placeholder="Nombre y Apellido" required/>
                <input type="password" name="pass" placeholder="Password"required/>
                <input type="password" name="pass2" placeholder="Repeat Password"required/>
                <input type ="hidden" id="tipo" name="tipo" value="User"/>
                <input type="submit" id="upload" value="Register"></input>
            </div>
        </div>
        <form>
        <script src="../js/registerControler.js"></script>
        
      
        <?php

        if(isset($_POST['email'])){
            
            $server="localhost";
            $user="id11840726_ibiricu";
            $passw="ibiricu";
            $basededatos="id11840726_audios";

            $pass= $_POST['pass'];
            $rpass= $_POST['pass2'];
            $email=$_POST['email'];
            $name=$_POST['name'];


            if($pass!=$rpass){
                echo"Las contraseñas no coinciden";
            }else{
                $mysqli=mysqli_connect($server,$user,$passw,$basededatos);

                if(!$mysqli){	
                    die("Fallo al establecer conexion" .mysqli_connect_error());
                }

                
               

                if(($_POST['tipo']=='User')){
                    $name=$_POST['name'];
                    $n=strpos($name," ");
                    if($n==-1){
                        echo"Por favor introduzca tambi&ecute;n su apellido";
                    }else{
                        $nombre=substr($name,0,$n);
                        $apellidos=substr($name,$n,strlen($name));
                        
                        $nombre=$mysqli->real_escape_string($nombre);
                        $apellidos=$mysqli->real_escape_string($apellidos);
                        $email=$mysqli->real_escape_string($email);
                        $pass=$mysqli->real_escape_string($pass);
                        
                        
                        $pass=crypt($pass,"badhum");

                        mysqli_query( $mysqli,"INSERT INTO USUARIO (Email, Nombre, Apellidos, Pass) VALUES ('$email','$nombre', '$apellidos', '$pass')");
                        
                        $url="{$email}.xml";
                        $objetoXML=new XMLWriter();
                        $objetoXML->openURI($url);
                        $objetoXML->setIndent(true);
                        $objetoXML->startElement("user");
                        $objetoXML->startElement("userinfo");
                        $objetoXML->writeElement("name", $email);
                        $objetoXML->endElement();
                        $objetoXML->startElement("playlists");
                        $objetoXML->startElement("playlist");
                        $objetoXML->writeAttribute("name","Favoritas");
                        $objetoXML->writeElement("songID", 0);
                        $objetoXML->endElement();
                        $objetoXML->endElement();
                        $objetoXML->endDocument();
                        $objetoXML->flush();
                        unset($objetoXML);
                        rename("./$email.xml","../users/$email.xml");
                    }    
                    


                }else if($_POST['tipo']=='Artista'){
                    $nomArtista=$_POST['name'];
                    $pass=crypt($pass,"badhum");
                    mysqli_query( $mysqli,"INSERT INTO ARTISTA (Correo,nomArtista, Pass) VALUES ('$email', '$nomArtista','$pass')");
                }
                //Error de violación de clave primaria.
                if (mysqli_errno($mysqli) == 1062) {
                    echo("<script> alert ('No se ha podido registrar el usuario.')</script>");
                }else{
                    echo("<script> alert ('El usuario se ha registrado correctamente.')</script>");
                    mysqli_commit($mysqli);
                }

                mysqli_close( $mysqli);
            }
        }
    ?>
    </body>
</html>