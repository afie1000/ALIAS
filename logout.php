<?php

session_start();
session_destroy();
echo '<script language="javascript"> alert("Anda telah logout!"); document.location="../Alias/home.php"; </script>';

?>