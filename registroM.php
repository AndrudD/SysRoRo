<?php
include 'cn.php';

if (isset($_POST ['Registrar'])) {


$target = 'imagenMascotas/'; 
$target = $target . basename( $_FILES['image']['name']); 


//RECIBIR DATOS
$nom_mascota = $_POST['nombreM'];
$fecha_nac = $_POST["DATE"];
$especie = $_POST["especie"];
$raza = $_POST["raza"];
$detallesMascota = $_POST["detallesMascota"];
$sexo = $_POST["sexo"];
$color = $_POST["color"];
$identificacion = $_POST["identificacion"];
$nom_pro = $_POST["nombreP"];
$fotoMascota=($_FILES["image"]["name"]);


/*echo "<br />";
echo "$nom_masc";
echo "<br />";
echo "$fecha_nac";
echo "<br />";
echo "$especie";
echo "<br />";
echo "$raza";
echo "<br />";
echo "$detallesMascota";
echo "<br />";
echo "$sexo";
echo "<br />";
echo "$color";
echo "<br />";
echo "$identificacion";
echo "<br />";
echo "$nom_pro";
echo "<br />";
echo "$fotoMascota";
echo "<br />";*/


//VALIDAR

if (empty($_POST['nombreM']  && $_POST['DATE'] && $_POST['especie'] && $_POST['raza']  && $_POST['detallesMascota']   && $_POST['sexo']   && $_POST['color']   && $_POST['nombreP'])) {
  echo "LLene todos los campos"; 
}else{

//CONSULTA PARA INSERTAT
$sql ="INSERT INTO mascotas(nom_mascota, fecha_nac, especie, raza, detallesMascota, sexo, color, identificacion, nom_pro, fotoMascota) VALUES ('$nom_mascota','$fecha_nac','$especie','$raza','$detallesMascota','$sexo','$color','$identificacion','$nom_pro','$fotoMascota')";


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
window.location="registroM.html";
}
setTimeout('Redirect()', 3000);
</script> 


