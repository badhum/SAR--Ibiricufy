<?php
	session_start();
	session_destroy();	
    echo "<script language=Javascript> location.href=\"Layout.php\"; </script>";
?>