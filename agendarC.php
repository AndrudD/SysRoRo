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

if (isset($_POST ['Agendar'])) {

//RECIBIR DATOS
$nom_pro = $_POST['nombreP'];
$domicilio = $_POST["domicilio"];
$referencia = $_POST["Referencia"];
$telefono = $_POST["telefono"];
$fecha_cita=$_POST["DATE"];
$TipoConsulta=$_POST["select"];
$nom_masc=$_POST["nombreM"];
$especie=$_POST["especie"];
$raza=$_POST["raza"];
$detallesMascota=$_POST["detalles"];

//VALIDAR

if (empty($_POST['nombreP']  && $_POST['telefono'] && $_POST['DATE'] && $_POST['select'] && $_POST['nombreM'] && $_POST['especie'] && $_POST['raza'] && $_POST['detalles'])) {
  echo "LLene todos los campos"; 
}else{

/*echo "<br />";
echo "$nom_pro";
echo "<br />";
echo "$domicilio";
echo "<br />";
echo "$referencia";
echo "<br />";
echo "$telefono";
echo "<br />";
echo "$fecha_cita";
echo "<br/>";
echo "$TipoConsulta";
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



 $sql ="INSERT INTO citas_medicas(nom_pro,domicilio, referencia, telefono, fecha_cita, TipoConsulta, nom_masc, especie, raza, detallesMascota) VALUES('$nom_pro','$domicilio','$referencia','$telefono','$fecha_cita','$TipoConsulta','$nom_masc','$especie','$raza','$detallesMascota')";



//EJECUTAR CONSULTA

if ($conn->query($sql) === TRUE) {
  echo "Registro exitoso";
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
window.location="agendarC.html";
}
setTimeout('Redirect()', 3000);
</script>
