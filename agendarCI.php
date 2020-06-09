<?php
include 'cn.php';

if (isset($_POST ['Enviar'])) {

//RECIBIR DATOS
$nom_pro = $_POST['nombreP'];
$domicilio = $_POST["domicilio"];
$telefono = $_POST["telefono"];
$fecha_ingreso=$_POST["DATE"];
$nom_masc=$_POST["nombreM"];
$especie=$_POST["especie"];
$raza=$_POST["raza"];
$edad=$_POST["edad"];
$detallesPaciente=$_POST["detallesPaciente"];
$detallesProcedimiento=$_POST["detallesProcedimiento"];

//VALIDAR

if (empty($_POST['nombreP'] && $_POST["domicilio"] && $_POST['telefono'] && $_POST['DATE'] && $_POST['nombreM'] && $_POST['especie'] && $_POST['raza'] && $_POST["edad"] && $_POST['detallesPaciente'] && $_POST["detallesProcedimiento"])) {
  echo "LLene todos los campos"; 
}else{

/*echo "<br />";
echo "$nom_pro";
echo "<br />";
echo "$domicilio";
echo "<br />";
echo "$telefono";
echo "<br />";
echo "$fecha_ingreso";
echo "<br/>";
echo "$nom_masc";
echo "<br />";
echo "$especie";
echo "<br />";
echo "$raza";
echo "<br />";
echo "$edad";
echo "<br />";
echo "$detallesPaciente";
echo "<br/>";
echo "$detallesProcedimiento";
echo "<br/>";*/
//CONSULTA PARA INSERTAT



 $sql ="INSERT INTO ingreso_hospitalario(nom_pro,domicilio, telefono, fecha_ingreso, nom_masc, especie, raza, edad,detallesPaciente,detallesProcedimiento) VALUES('$nom_pro','$domicilio','$telefono','$fecha_ingreso','$nom_masc','$especie','$raza','$edad','$detallesPaciente','$detallesProcedimiento')";



//EJECUTAR CONSULTA

if ($conn->query($sql) === TRUE) {
  echo "Ingreso registrado correctamente";
  echo "<br/>";
  echo "La pagina se  redireccionara automaticamente";} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

 
    
}
$conn->close();
}

//header('Location: agendarC.html');
?>
<script type="text/javascript">
function Redirect()
{
window.location="agendarCI.html";
}
setTimeout('Redirect()', 3000);
</script>
