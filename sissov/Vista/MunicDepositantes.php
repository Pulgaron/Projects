
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Información</title>
    <link rel="icon" type="image/png" width="100%" height="100%" href="../imagenes/SSS.png">
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="all" />
    <link rel="stylesheet" href="../css/iconos.css" type="text/css" media="all" />
    <meta name="author" content="Genesis Mora Cruz">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6" style="margin-top: -50px">
            <h5 style="text-align: center">Municipios que depositan en este sitio:</h5>
            <table class="table table-hover" style="font-size: small">
                <tr class="table-success" style="text-align: center">
                    <th >Municipio</th>
                    <th >Toneladas que deposita</th>
                </tr>
                <tbody>
                <?php
                $mds = $_GET["depositante"];
                require_once("../Controlador/consultas/ConttroladorConsultaDepositantes.php");
                foreach ($mds as $md):
                ?>
                <tr>
                    <td>
                        <a> <?php echo $md["Municipio"]?></a>
                    </td>
                    <td>
                        <a> <?php echo $md["Toneladas_depositadas"]?></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>