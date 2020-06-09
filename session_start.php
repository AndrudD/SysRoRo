<?php
session_start(); 
if(isset($_SESSION['ok'])){
echo "<center>";
echo "<b> Nombre: </b> ".$_SESSION['Nombre']; 
echo "<br>";
echo "<b> Usuario: </b> ".$_SESSION['Usuario']; 
echo "</center>";
echo "<br>";
} else {
echo '<script> window.location="index.html" </script>';
}
?>