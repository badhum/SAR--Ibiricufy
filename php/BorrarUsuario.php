<?php
  session_start();

$server="localhost";
$user="id11840726_ibiricu";
$passw="ibiricu";
$basededatos="id11840726_audios";

$contrase=$antigua= crypt($_POST['pass'],'badhum');


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
$sql="SELECT * FROM {$tipo} WHERE {$ident}='$email' and pass='$contrase'";
$result= mysqli_query($mysqli,$sql);
$cont=  mysqli_num_rows($result); 

if($cont==1){ 
    $mysqli=mysqli_connect($server,$user,$passw,$basededatos);
    $resultado= mysqli_query($mysqli,"DELETE FROM {$tipo} WHERE {$ident}='$email'");
    mysqli_close( $mysqli);   
    echo "EH";
    if ($tipo=='USUARIO'){
        $url="{$email}.xml";
        unlink('../users/'.$url.'');
    }
    session_destroy(); 
    echo "<script language=Javascript> location.href=\"Layout.php\"; </script>";
}else{
  echo "
  <script language=Javascript> 
  alert('Contraseña incorrecta');
  location.href='Layout.php'; 
  </script>";
}
?>