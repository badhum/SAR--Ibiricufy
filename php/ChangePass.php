<?php
    session_start();
?>
<?php
$server="localhost";
$user="id11840726_ibiricu";
$passw="ibiricu";
$basededatos="id11840726_audios";

$antigua= crypt($_POST['antiguapass'],"badhum"); 
$nueva= crypt($_POST['nuevapass'],"badhum");

if ($_SESSION['Tipo']=='User'){
  $email= $_SESSION['Email'];
  $tipo='USUARIO'; 
  $ident='Email';
}else{
  $email= $_SESSION['NomArtista'];
  $tipo='ARTISTA';
  $ident='nomArtista';
}

$mysqli=mysqli_connect($server,$user,$passw,$basededatos);
$sql="SELECT * FROM {$tipo} WHERE {$ident}='$email' and pass='$antigua'";
$result= mysqli_query($mysqli,$sql);
$cont=  mysqli_num_rows($result); 

if($cont==1){
    mysqli_query($mysqli,"UPDATE {$tipo} SET pass='$nueva' where {$ident}='$email' "); 
    mysqli_close( $mysqli);
    echo '<script >alert("Contraseña cambiada correctamente");</script>';
    
}else{
    echo '<script >alert("Contraseña incorrecta");</script>';
}
mysqli_close( $mysqli); 
echo "<script language=Javascript> location.href=\"Layout.php\"; </script>";
 
?>