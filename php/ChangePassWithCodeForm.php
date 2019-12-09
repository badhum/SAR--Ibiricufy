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
    <form action='ChangePassWithCodeForm.php' method="POST">
        <h1>Recuperar contraseña</h1>    
        <br>
        <div>      
        
            Email <input type="email" name="email" placeholder='email' size=35>
            <br>
            Código <input type="text" name="codigo" placeholder='tu código de 4 dígitos' required>
            <br>
            Nueva contraseña <input type="password" name="newpass" placeholder=' nueva contraseña' required>
        
        </div> 
        <br>
        <br>
        <input type="submit" value="Enviar">
        <input type="reset" value="Resetear">
    </form>
    </td>
    </tr>
</table>

<?php
if(isset($_POST['codigo'])){
    $codigo=$_POST['codigo'];
    $correo=$_POST['email'];
    $pass=$_POST['newpass'];

    $server="localhost";
    $user="id11840726_ibiricu";
    $passw="ibiricu";
    $basededatos="id11840726_audios";
        
    $mysqli=mysqli_connect($server,$user,$passw,$basededatos);
    $sql='SELECT tipo FROM USERCODIGO WHERE codigo="'.$codigo.'" AND Correo="'.$correo.'"';
    $result= mysqli_query($mysqli,$sql);
    $cont=  mysqli_num_rows($result); 
    $string=mysqli_fetch_array ($result);
    $tipo= $string[0];
    if($cont==1){
        $pass=crypt($pass,"badhum");
        
        if ($tipo=='Usuario'){
           $sql='UPDATE USUARIO SET Pass="'.$pass.'" WHERE Email="'.$correo.'"';
           mysqli_query($mysqli,$sql);
        }else{
           $sql='UPDATE ARTISTA SET Pass="'.$pass.'" WHERE Correo="'.$correo.'"';
           mysqli_query($mysqli,$sql);
        }
        $sql='DELETE FROM USERCODIGO WHERE correo="'.$correo.'"';
        mysqli_query($mysqli,$sql);
        echo "Contraseña cambiada correctamente";
    }else{
        echo "Codigo y correo no coinciden";
    }
    mysqli_close( $mysqli); 
}
?>

</body>
</html>