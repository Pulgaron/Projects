<?php
$estado = $_POST["elegido"];
require_once("../Modelo/ConsultaMunicipios.php");
$consulta = new ConsultaMunicipios_Models();
$municipios = $consulta->getMunicipioEstado($estado);
?>
<option value="0">Seleccionar</option>
<?php
foreach ($municipios as $municipio):
    ?>
    <option value="<?php echo $municipio['idMunicipios'];?>"> <?php echo $municipio['Municipio'];?> </option>
<?php endforeach;?>