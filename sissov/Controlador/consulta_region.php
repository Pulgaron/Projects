<?php
$html = " ";
$estado = $_POST["elegido"];
require_once("../Modelo/ConsultaRegion.php");
$consulta = new ConsultaRegion_Models();
$regiones = $consulta->getRegion($estado);
?>
<option value="0">Seleccionar</option>
<?php
foreach ($regiones as $region):
    ?>
    <option value="<?php echo $region['idRegion'];?>"> <?php echo $region['Region'];?> </option>
<?php endforeach;?>