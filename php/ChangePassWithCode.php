<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<?php include '../html/Head.html'?>
    
</head>
<body>
<?php include '../php/Menus.php' ?> 

<br>
<table border=1>
    <tr>

    <td>
    <form action="ChangePassWithCode.php" method="post">
        <h1>Recuperar contraseña</h1>    
        <br>
        <div>           
            Por favor, introduce tu email.
            <input type="email" name="email" placeholder='Email' required>
            <br>
        </div> 
        Soy artista <input type='checkbox' id='radiobutton' name='soyartista'>
        <br>
        <br>
        <input type="submit" value="Enviar">
        <input type="reset" value="Resetear">		
        <p id='enviado'></p>       
        
    </form>
    </td>
    </tr>
</table>
<?php

    $server="localhost";
    $user="id11840726_ibiricu";
    $passw="ibiricu";
    $basededatos="id11840726_audios";

    

    if(isset($_POST['email'])){
        $email = $_POST['email'];

        $mysqli=mysqli_connect($server,$user,$passw,$basededatos);

        if(!$mysqli){
            die("Fallo al establecer conexion" .mysqli_connect_error());
        }
        if (isset($_POST['soyartista'])){
            $sql='SELECT * FROM ARTISTA WHERE Correo="'.$email.'"'; 
            $tipo='Artista';          
        }else{
            $sql='SELECT * FROM USUARIO WHERE Email="'.$email.'"';    
            $tipo='Usuario';   
        }
        $result= mysqli_query($mysqli,$sql);
        $cont=  mysqli_num_rows($result); 
        if($cont==1){
            $para = $email;
            $asunto = "Recuperación contraseña";
            $codigorecuperacion = rand(1000,9999);
            $sql='INSERT INTO USERCODIGO VALUES("'.$email.'","'.$codigorecuperacion.'","'.$tipo.'")'; 
            mysqli_query($mysqli,$sql); 
            $mensaje=
            "
            <html>
            <head>
            <title> Recuperar Contraseña </title>
            </head>
            <body>
            <h1> Codigo para recuperar la contraseña: </h1>
            <h2>".$codigorecuperacion."</h2>
            <h1> Para recuperar la contraseña pinche <a href='https://ibiricufy.000webhostapp.com/php/ChangePassWithCodeForm.php'>aqui</a> </h1>
            <h6>Algunos servicios de correo electrónico pueden, la primera vez, por seguridad, desactivar el link de redireccionamiento</h6>
            <h6>Si este es su caso por favor acceda a la URL: https://ibiricufy.000webhostapp.com/php/ChangePassWithCodeForm.php </h6>
            </body>
            </html>
            ";

            $header = "From: badhum@badhumcompany.com\r\n"; 
            $header.= "MIME-Version: 1.0\r\n"; 
            $header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
            $header.= "X-Priority: 1\r\n"; 
            mail($para,$asunto,$mensaje,$header);
            echo "El email se ha enviado correctamente, puede que aparezca como Spam.";
        }else{
            echo "El email no existe.";
        }
        mysqli_close( $mysqli); 
    }
?>


</body>
</html>