<?php 
    session_start();
?>
<html>
    <head>
        <?php include '../html/Head.html'?>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <body>
        <?php include '../php/Menus.php' ?>
        <form action="Login.php" method="post">
            <div class="wrapper"> 
                <div id="loginUser" class="loginTypeButton" >Login</div>
                <div id="loginArtist" class="loginTypeButton" >Login for Artists</div>
                <div class="loginForm">
                    <input type="text" id="email" name="email" placeholder="Email" />
                    <input type="password" id="pass" name="pass" placeholder="Password"/>
                    <input type ="hidden" id="tipo" name="tipo" name="tipo" value="User"/>
                    <input type="submit" id="upload" value="Login"></input>
                </div>
                <a href='ChangePassWithCode.php'>¿Has olvidado tu contraseña?</a>
            </div>
        </form>
        
        <script src="../js/loginControler.js" align='center'></script>


        <?php
        
        $server="localhost";
        $user="id11840726_ibiricu";
        $passw="ibiricu";
        $basededatos="id11840726_audios";
        
        if(isset($_POST['email'])){
            
            if($_POST['tipo']=="User"){
 
                $mysqli=mysqli_connect($server,$user,$passw,$basededatos);

                if(!$mysqli){
                    die("Fallo al establecer conexion" .mysqli_connect_error());
                }
                
                $email=$_POST['email'];
                $pass = $_POST['pass'];
                $email=$mysqli->real_escape_string($email);
                $pass=$mysqli->real_escape_string($pass);
                $pass=crypt($pass,"badhum");
                $user = mysqli_query( $mysqli,"SELECT Nombre, Apellidos FROM USUARIO WHERE Email ='$email' AND Pass='$pass'");
                $cont=  mysqli_num_rows($user); 
                $columna= mysqli_fetch_array($user);
                $name=$columna['Nombre'];
                $apellidos=$columna['Apellidos'];
                
                
                if($cont==1){
                    $_SESSION['Email']=$email;
                    $_SESSION['Nombre']=$name;
                    $_SESSION['Apellidos']=$apellidos;
                    $_SESSION['Url']="../users/$email.xml";
                    
                    $_SESSION['Tipo']="User";
                    echo"<script>alert('BIENVENIDO AL SISTEMA');</script>";
                    echo "<script language=Javascript> location.href=\"Layout.php\"; </script>";
                }
                else {
                    echo "<script>alert('Parametros de login incorrectos');</script>";
                } 


            }else if($_POST['tipo']=="Artista"){
                $mysqli=mysqli_connect($server,$user,$passw,$basededatos);

                if(!$mysqli){
                    die("Fallo al establecer conexion" .mysqli_connect_error());
                }

                $nomArtista=$_POST['email'];
                $pass=$_POST['pass'];
                $nomArtista=$mysqli->real_escape_string($nomArtista);
                $pass=$mysqli->real_escape_string($pass);
                $pass=crypt($pass,"badhum");
                $user=mysqli_query($mysqli,"SELECT nomArtista FROM ARTISTA WHERE nomArtista='$nomArtista' AND pass='$pass'");
                
                $cont=  mysqli_num_rows($user); 
                $columna= mysqli_fetch_array($user);
                
                
                if($cont==1){
                    $_SESSION['NomArtista']=$nomArtista;
                    $_SESSION['Tipo']="Artista";
                    
                    echo"<script>alert('BIENVENIDO AL SISTEMA');</script>";
                    echo "<script language=Javascript> location.href=\"Layout.php\"; </script>";

                }else{
                    echo "<script>alert('Parametros de login incorrectos');</script>";
                }
            }
        }
    ?>






    </body>
</html>
