<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "roro";

$conn = new mysqli($servername, $username, $password, $dbname);
//Checking connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial| RoRo</title>
    <link rel="stylesheet" href="css/historialStyle.css">

  </head>
 <body>
  <form method="post">  
    <fieldset>
        <div class="container2">
            <div class="vertical-menu">
                <a class="active2">Menu</a>
                <a href="menu.html">Inicio</a>
                <a href="registroD.html">Registro</a>
                <a href="agendarC.html">Agendar</a>
                <a href="consulta.html">Dar Consulta</a>
                <a href="historialmedico.php" class="active">Historial Medico</a>
                <a href="ConsultarC.php">Buscar</a>
            </div>
        </div>
    </fieldset>

    <fieldset>
    <div class="container">
    <h1>Historial Medico | Busqueda</h1>
    <div class="search">
    <a>Búsqueda de Mascota: </a>
    <input type="search" name="busquedaM" placeholder="Nombre Mascota" required="">
    <input type="search" name="busquedaP" placeholder="Nombre Propietario" required="">
    <input type="submit" name="Buscar" value="Buscar">
    </div>
      <h2>Datos Mascota:</h2>
      
       <table border="1">
            <tr class="encabezado">
                <th>Foto</th>
                <th>Nombre Mascota</th>
                <th>Sexo</th>
                <th>Especie</th>
                <th>Color</th>
                <th>Raza</th>
              
                
            </tr>
            <?php

            $target = 'imagenMascotas/'; 
            if(isset($_POST ['Buscar'])){

            $sql ="SELECT mascotas.nom_pro, mascotas.nom_mascota, mascotas.sexo, mascotas.especie, mascotas.color, mascotas.raza, mascotas.fotoMascota, propietario.nom_propietario, propietario.telefono, consultas.mascota, consultas.diagnostico, consultas.indicaciones 
                FROM mascotas 
                INNER JOIN propietario ON  mascotas.nom_pro=propietario.nom_propietario 
                INNER JOIN consultas ON mascotas.nom_mascota=consultas.mascota AND propietario.nom_propietario=consultas.nom_pro
                WHERE mascotas.nom_mascota='".$_POST['busquedaM']."'  AND mascotas.nom_pro='".$_POST['busquedaP']."' ";}  
                //WHERE mascotas.nom_pro="Andres David Capetillo Castaneda" AND mascotas.nom_mascota="Anaru"          

            $result=@mysqli_query($conn,$sql);

            while ($mostrar=@mysqli_fetch_array($result)){
              
            ?> 
            <tr class="cuerpo">
                <td><img src="<?php echo $target.$mostrar['fotoMascota']?>" width="100" height="100"></td>
                <td><?php echo $mostrar['nom_mascota']?></td>
                <td><?php echo $mostrar['sexo']?></td>
                <td><?php echo $mostrar['especie']?></td>
                <td><?php echo $mostrar['color']?></td>
                <td><?php echo $mostrar['raza']?></td>
                
                
            </tr>
            
        </table>
        <table border="1" >
            
           
            <tr class="cuerpo3">
                <th>Diagnostico</th>
                <th>Indicaciones</th>
            </tr>
            <tr class="cuerpo4">
                <td><?php echo $mostrar['diagnostico']?></td>
                <td><?php echo $mostrar['indicaciones']?></td>
            </tr>
           
        </table>
        <td>
            En caso de emergencia llamar a:
        </td>
        <table border="1">
            <tr class="encabezado2">
                <th>Propietario</th>
                <th>Telefono</th>
            </tr>
           
            <tr class="cuerpo2">
                <td><?php echo $mostrar['nom_propietario']?></td>
                <td><?php echo $mostrar['telefono']?></td>
            </tr>
            <?php
            }
            ?>
        </table>

    </div>
    </fieldset>
      </form>
  </body>
</html>