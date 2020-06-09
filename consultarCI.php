<?php
include 'cn.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda Ingresados | RoRo</title>
    <link rel="stylesheet" href="css/ConsultarCIStyle.css">
  </head>
 <body>
<form method="post" >
    <fieldset >
        <div class="container2">
            <div class="vertical-menu">
            <a href="menu.php" >Volver a Menu</a>
            <a class="active2">Menu Buscar</a>
            <a href="ConsultarC.php" >Consultas Agendadas</a>
            <a href="ConsultarE.php">Esteticas Agendadas</a>
            <a href="ConsultarCI.php" class="active">Ingreso Hosp. Agendados</a>
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
    <h1>Ingreso Hospitalario</h1>
    
        <table border="1" width="100">
            <tr class="encabezado">
                
                <td>Fecha Ingreso</td>
                <td>Propietario</td>
                <td>Domicilio</td>
                <td>Telefono</td>
                <td>Paciente</td>
                <td>Especie</td>
                <td>Raza</td>
                <td>Edad</td>
            </tr>
    
            <?php
            if(isset($_POST ['Buscar'])){   

            $sql="SELECT * FROM ingreso_hospitalario where fecha_ingreso='".$_POST['busquedaFecha']."'";}
            $result=@mysqli_query($conn,$sql);

            while ($mostrar=@mysqli_fetch_array($result)){
              
            ?> 
            <tr class="cuerpo">
                
                <td><?php echo $mostrar['fecha_ingreso']?></td>
                <td><?php echo $mostrar['nom_pro']?></td>
                <td><?php echo $mostrar['domicilio']?></td>
                <td><?php echo $mostrar['telefono']?></td>
                <td><?php echo $mostrar['nom_masc']?></td>
                <td><?php echo $mostrar['especie']?></td>
                <td><?php echo $mostrar['raza']?></td>
                <td><?php echo $mostrar['edad']?></td>
            
            </tr>

            <?php

            }

            ?>

        </table>
        <br><br>
            <table>

            <tr class="encabezado2">
                <td>Detalles Paciente</td>
                <td>Detalles Procedimiento</td>
            </tr>


            <?php
            if(isset($_POST ['Buscar'])){   

            $sql="SELECT * FROM ingreso_hospitalario where fecha_ingreso='".$_POST['busquedaFecha']."'";}
            $result=@mysqli_query($conn,$sql);

            while ($mostrar=@mysqli_fetch_array($result)){
              
            ?> 
            <tr class="cuerpo2">
                <td><?php echo $mostrar['detallesPaciente']?></td>
                <td><?php echo $mostrar['detallesProcedimiento']?></td> 
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