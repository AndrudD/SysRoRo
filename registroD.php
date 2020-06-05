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

if (isset($_POST ['Registrar'])) {


$target = 'imagenPropietarios/'; 
$target = $target . basename( $_FILES['image']['name']); 


//RECIBIR DATOS
$nom_propietario = $_POST['nombreP'];
$direccion = $_POST["direccionP"];
$telefono = $_POST["telP"];
$no_INE = $_POST["ineP"];
$Foto_propietario=($_FILES["image"]["name"]);


/*echo "<br />";
echo "$nom_propietario";
echo "<br />";
echo "$direccion";
echo "<br />";
echo "$telefono";
echo "<br />";
echo "$no_INE";
echo "<br />";
echo "$Foto_propietario";
echo "<br />";*/


//VALIDAR

if (empty($_POST['nombreP']  && $_POST['direccionP'] && $_POST['telP'] && $_POST['ineP'])) {
  echo "LLene todos los campos"; 
}else{

//CONSULTA PARA INSERTAT
$sql ="INSERT INTO propietario(nom_propietario, direccion, telefono, no_INE, Foto_propietario) VALUES ('$nom_propietario','$direccion','$telefono','$no_INE','$Foto_propietario')";


//GUARDADO DE IMAGEN
if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) 
{ 
	echo "La imagen". basename( $_FILES['image']['name']). " se subio correctamente"; 
} 
else {  
echo "No se pudo guardar la imagen"; 
} 

echo "<br />";


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


?>
<script type="text/javascript">
function Redirect()
{
window.location="registroD.html";
}
setTimeout('Redirect()', 3000);
</script>

