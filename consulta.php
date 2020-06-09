<?php
include 'cn.php';

if (isset($_POST ['Registrar'])) {

//RECIBIR DATOS
$fecha_consulta=$_POST["DATE"];
$mascota = $_POST['mascota'];
$sexo = $_POST["sexo"];
$peso = $_POST["peso"];
$raza = $_POST["raza"];
$temperatura=$_POST["temperatura"];
$nom_pro=$_POST["nombrePRO"];
$diagnostico=$_POST["diagnostico"];
$indicaciones=$_POST["indicaciones"];

//VALIDAR

if (empty($_POST['mascota'] && $_POST["DATE"]  && $_POST['sexo'] && $_POST['peso'] && $_POST['raza'] && $_POST['temperatura'] && $_POST["nombrePRO"] && $_POST['diagnostico'] && $_POST['indicaciones'])) {
  echo "LLene todos los campos"; 
}else{

/*echo "<br />";
echo "$fecha_consulta";
echo "<br />";
echo "$mascota";
echo "<br />";
echo "$sexo";
echo "<br />";
echo "$peso";
echo "<br />";
echo "$raza";
echo "<br />";
echo "$temperatura";
echo "<br />";
echo "$diagnostico";
echo "<br/>";
echo "$indicaciones";
echo "<br />";
*/

//CONSULTA PARA INSERTAT



 $sql ="INSERT INTO consultas(mascota,fecha_consulta,sexo, peso, raza, temperatura, nom_pro, diagnostico, indicaciones) VALUES('$mascota','$fecha_consulta','$sexo','$peso','$raza','$temperatura', '$nom_pro','$diagnostico','$indicaciones')";



//EJECUTAR CONSULTA

if ($conn->query($sql) === TRUE) {
  echo "Consulta registrada";
  echo "<br/>";
  echo "La pagina se  redireccionara automaticamente";} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

 
    
}
$conn->close();



}

require_once dirname(__FILE__).'/PHPWord-master/src/PhpWord/Autoloader.php';

\PhpOffice\PhpWord\Autoloader::register();
use PhpOffice\PhpWord\TemplateProcessor;



$templateWord = new TemplateProcessor('Receta-medica.docx');


$fecha_consulta=$_POST["DATE"];
$mascota = $_POST['mascota'];
$sexo = $_POST["sexo"];
$peso = $_POST["peso"];
$raza = $_POST["raza"];
$temperatura=$_POST["temperatura"];
$diagnostico=$_POST["diagnostico"];
$indicaciones=$_POST["indicaciones"];

$templateWord->setValue("mascota",$mascota);
$templateWord->setValue("sexo",$sexo);
$templateWord->setValue("peso",$peso);
$templateWord->setValue("raza",$raza);
$templateWord->setValue("fecha_consulta",$fecha_consulta);
$templateWord->setValue("temperatura",$temperatura);
$templateWord->setValue("diagnostico",$diagnostico);
$templateWord->setValue("indicaciones",$indicaciones);

//Guardando documento
$target = 'Recetas/Receta-medica-'; 
$target =$target.$mascota;

$templateWord->saveAs($target.'.docx');

header("Content-Disposition: attachment; filename=".$target.".docx;");
echo file_get_contents($target.'.docx');


?>
<script type="text/javascript">
function Redirect()
{
window.location="consulta.html";
}
setTimeout('Redirect()', 3000);
</script>