<?php
include 'cn.php';

if (isset($_POST['Agendar'])) {

//RECIBIR DATOS
$nom_pro = $_POST['nombreP'];
$telefono = $_POST["telefono"];
$fecha_cita=$_POST["DATE"];
$fechaEntrada=$_POST["timeEntrada"];
$fechaEntrega=$_POST["timeEntrega"];
$TipoServicio=$_POST["select"];
$nom_masc=$_POST["nombreM"];
$especie=$_POST["especie"];
$raza=$_POST["raza"];
$detallesMascota=$_POST["detalles"];

//VALIDAR

if (empty($_POST['nombreP']  && $_POST['telefono'] && $_POST['DATE'] && $_POST['timeEntrada'] && $_POST['timeEntrega'] && $_POST['select']  && $_POST['nombreM'] && $_POST['especie'] && $_POST['raza'] && $_POST['detalles'])) {
  echo "LLene todos los campos"; 
}else{
/*
echo "<br />";
echo "$nom_pro";
echo "<br />";
echo "$telefono";
echo "<br />";
echo "$fecha_cita";
echo "<br />";
echo "$fechaEntrada";
echo "<br />";
echo "$fechaEntrega";
echo "<br/>";
echo "$TipoServicio";
echo "<br />";
echo "$nom_masc";
echo "<br />";
echo "$especie";
echo "<br />";
echo "$raza";
echo "<br />";
echo "$detallesMascota";
echo "<br/>";*/
//CONSULTA PARA INSERTAT


 $sql ="INSERT INTO citas_esteticas(nom_pro,telefono, fecha_cita, fechaEntrada,fechaEntrega, TipoServicio, nom_masc, especie, raza, detallesMascota) VALUES('$nom_pro','$telefono','$fecha_cita','$fechaEntrada','$fechaEntrega','$TipoServicio','$nom_masc','$especie','$raza','$detallesMascota')";


//EJECUTAR CONSULTA

if ($conn->query($sql) === TRUE) {
  echo "Registro exitoso";
  echo "<br/>";
  echo "La pagina se  redireccionara automaticamente";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

 
    
}
$conn->close();
}

//header('Location: agendarE.html');
?>
<script type="text/javascript">
function Redirect()
{
window.location="agendarE.html";
}
setTimeout('Redirect()', 3000);
</script>