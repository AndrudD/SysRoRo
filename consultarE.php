<?php
include 'cn.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar | RoRo</title>
    <link rel="stylesheet" href="css/ConsultarEStyle.css">
  </head>
 <body>
<form method="post" >
    <fieldset>
        <div class="container2">
            <div class="vertical-menu">
            <a href="menu.php" >Volver a Menu</a>
            <a class="active2">Menu Buscar</a>
            <a href="ConsultarC.php" >Consultas Agendadas</a>
            <a href="ConsultarE.php" class="active">Esteticas Agendadas</a>
            <a href="ConsultarCI.php">Ingreso Hosp. Agendados</a>
          </div>
        </div>
    </fieldset>

    <fieldset>
   
    <div class="container">
    <div class="search">
    <a>Búsqueda por fecha </a>
    <input type="date" name="busquedaFecha">
    <input type="submit" name="Buscar" value="Buscar">
    </div>
                <h1>Esteticas</h1>

    
        <table border="1" width="100">
            <tr class="encabezado">
                <td>Fecha</td>
                <td>Servicio    </td>
                <td>Nombre Mascota</td>
                <td>Raza</td>
                <td>Hora Entrada</td>
                <td>Hora Entrega</td>
                <td>Propietario</td>
                <td>Telefono</td>
                
            </tr>
    


            <?php
            if(isset($_POST ['Buscar'])){

            $sql = "SELECT * FROM citas_esteticas where fecha_cita='".$_POST['busquedaFecha']."'";}
            $result=@mysqli_query($conn,$sql);

            while ($mostrar=@mysqli_fetch_array($result)){
              
            ?> 
            <tr class="cuerpo">
                <td><?php echo $mostrar['fecha_cita']?></td>
                <td><?php echo $mostrar['TipoServicio']?></td>
                <td><?php echo $mostrar['nom_masc']?></td>
                <td><?php echo $mostrar['raza']?></td>
                <td><?php echo $mostrar['fechaEntrada']?></td>
                <td><?php echo $mostrar['fechaEntrega']?></td>
                <td><?php echo $mostrar['nom_pro']?></td>
                <td><?php echo $mostrar['telefono']?></td>
            </tr>
            <?php
            }
            ?>
        </table>

        <br><br>
        <table border="1">
            <tr class="encabezado2">
                <td>Nombre Mascota</td>
                <td>Notas</td>
            </tr>
    


            <?php
            if(isset($_POST ['Buscar'])){

            $sql = "SELECT * FROM citas_esteticas where fecha_cita='".$_POST['busquedaFecha']."'";}
            $result=@mysqli_query($conn,$sql);

            while ($mostrar=@mysqli_fetch_array($result)){
              
            ?> 
            <tr class="cuerpo2">
                <td><?php echo $mostrar['nom_masc']?></td>
                <td><?php echo $mostrar['detallesMascota']?></td>
            </tr>
            <?php
            }
            ?>
        </table>
  
    
    </div>

</fieldset>

  </body>
</html>