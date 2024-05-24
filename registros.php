<?php
session_start();
 if(empty($_SESSION))
 {
 header("location: login.php");
    exit;
 }
include("conectar_bd.php");

$sql = "SELECT * FROM preficha";
$query = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html style="width:100%;height:100%">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <style>
        .altura-100-por-ciento {
            height: 100%;
        }
        .anchura-50-por-ciento {
            width: 50%;
        }
        .anchura-100-por-ciento {
            width: 100%;
        }
        .display-flex {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body style="width:100%;height:100% overflow:auto">
    <div style="width:100%; height:40px; margin:10px auto">
        <a href="cerrarsesion.php">Cerrar sesión</a>
    </div>
    <div class="anchura-100-por-ciento" style="height:calc(100% - 40px - 20px); overflow:auto">
        <div style="min-width:1000px;">
            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>NOMBRE</th>
                            <th>PRIMER APELLIDO</th>
                            <th>SEGUNDO APELLIDO</th>
                            <th>CURP</th>
                            <th>BECA</th>
                            <th>EDAD</th>
                            <th>SEXO</th>
                            <th>ESCUELA DE PROCEDENCIA</th>
                            <th>CICLO ESCOLAR</th>
                            <th>ENTIDAD DE PROCEDENCIA</th>
                            <th>NACIONALIDAD</th>
                            <th>PLAN DE ESTUDIOS</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td><?php echo $row['NOMBRE']; ?></td>
                            <td><?php echo $row['APELLIDO_PATERNO']; ?></td>
                            <td><?php echo $row['APELLIDO_MATERNO']; ?></td>
                            <td><?php echo $row['CURP']; ?></td>
                            <td><?php echo $row['BECA']; ?></td>
                            <td><?php echo $row['EDAD']; ?></td>
                            <td><?php echo $row['SEXO']; ?></td>
                            <td><?php echo $row['ESCUELA']; ?></td>
                            <td><?php echo $row['CICLO_ESCOLAR']; ?></td>
                            <td><?php echo $row['ENTIDAD_DE_PROCEDENCIA']; ?></td>
                            <td><?php echo $row['NACIONALIDAD']; ?></td>
                            <td><?php echo $row['PLAN_DE_ESTUDIOS']; ?></td>
                            <td>
                                <a href="actualizar.php?id=<?php echo $row['ID']; ?>" class="btn btn-info">Editar</a>
                                <a href="delete.php?id=<?php echo $row['ID']; ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
