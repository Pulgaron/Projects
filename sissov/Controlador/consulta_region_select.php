<?php
    <option >Seleccionar</option>
    <?php
    $valor = $_POST["elegido"]
    require_once ("Controlador/consulta_region.php");
    
foreach($regiones as $region){
   $html.= "<option value="<?php echo $region['idRegion'];?>"> <?php echo $region['Region'];?> </option>";s
}
echo $html;
?>