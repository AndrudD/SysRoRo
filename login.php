<?php
session_start();
require("cn.php");
if (isset($_POST ['Ingresar'])) {
if (!empty($_POST['user']) && !empty($_POST['pass'])){
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $sql = 'SELECT nombre, User, password from usuarios where User = "'.@$user.'"';
     $result=@mysqli_query($conn,$sql);
    if ($result->num_rows > 0) {
    $row=@mysqli_fetch_array($result);
            if ($pass == $row['password']){
            $_SESSION['ok'] = true;
            $_SESSION['Nombre'] = $row["nombre"];
            $_SESSION['Usuario'] = $row["User"];
            echo '<script> window.location="menu.php" </script>';
        }
        else 
    {
            echo "Usuario o contraseña incorrecta";
            echo '<script> window.location="index.html" </script>';
    }
    } 
    else 
    {
            echo "Usuario o contraseña incorrecta";
            echo '<script> window.location="index.html" </script>';
    }
}
mysqli_close($conn);
}
?>