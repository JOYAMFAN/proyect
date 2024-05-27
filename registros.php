<?php
session_start();
if (empty($_SESSION)) {
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            box-sizing: border-box;
        }
        .header {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }
        .header a {
            text-decoration: none;
            color: #333;
            padding: 10px 20px;
            background-color: white;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table-container {
            width: 100%;
            max-width: 1200px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            color: white;
            text-decoration: none;
            text-align: center;
            display: inline-block;
        }
        .btn-info {
            background-color: #4CAF50;
        }
        .btn-info:hover {
            background-color: #45a049;
        }
        .btn-danger {
            background-color: #f44336;
        }
        .btn-danger:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="cerrarsesion.php">Cerrar sesión</a>
        </div>
        <div class="table-container">
            <table>
                <thead>
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
</body>
</html>
