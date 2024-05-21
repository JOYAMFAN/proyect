<?php 
include("conectar_bd.php");

$sql="SELECT * FROM preficha";
$query=mysqli_query($conexion,$sql);

if (!$query) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html style="height: 100vh;width: 100vw;">
<head>
    <title>PRE-FICHA</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            overflow: auto;
        }
        .form-container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .form-container input[type="text"],
        .form-container input[type="password"],
        .form-container select,
        .form-container input[type="checkbox"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group label {
            display: block;
            margin-bottom: .5rem;
        }
    </style>
</head>
<body>
    <form action="datos2.php" method="POST" class="form-container">
        <h2>Ingresa tus datos</h2>
        <div class="form-group">
            <label for="CURP">CURP</label>
            <input type="text" id="CURP" name="CURP" required placeholder="CURP">
        </div>
        <div class="form-group">
            <label for="NOMBRE">Nombre(s) del Aspirante</label>
            <input type="text" id="NOMBRE" name="NOMBRE" required placeholder="Nombre(s) del Aspirante">
        </div>
        <div class="form-group">
            <label for="APELLIDO_PATERNO">Primer Apellido</label>
            <input type="text" id="APELLIDO_PATERNO" name="APELLIDO_PATERNO" required placeholder="Primer Apellido">
        </div>
        <div class="form-group">
            <label for="APELLIDO_MATERNO">Segundo Apellido</label>
            <input type="text" id="APELLIDO_MATERNO" name="APELLIDO_MATERNO" required placeholder="Segundo Apellido">
        </div>
        <div class="form-group">
            <label for="BECA">¿Tienes Beca?</label>
            <input type="checkbox" id="BECA" name="BECA" value="si">
        </div>
        <div class="form-group">
            <label for="EDAD">EDAD</label>
            <input type="text" id="EDAD" name="EDAD" required placeholder="EDAD">
        </div>
        <div class="form-group">
            <label for="SEXO">Sexo</label>
            <select id="SEXO" name="SEXO" required>
                <option value="">Seleccione</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="prefiero_no_decirlo">Prefiero no decirlo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="ESCUELA">Escuela Secundaria de Procedencia</label>
            <input type="text" id="ESCUELA" name="ESCUELA" required placeholder="Escuela Secundaria de Procedencia">
        </div>
        <div class="form-group">
            <label for="CICLO_ESCOLAR_DE_EGRESO">Ciclo Escolar de Procedencia (solo si aplica)</label>
            <input type="text" id="CICLO_ESCOLAR_DE_EGRESO" name="CICLO_ESCOLAR_DE_EGRESO" required placeholder="Ciclo Escolar de Procedencia (solo si aplica)">
        </div>
        <div class="form-group">
            <label for="ENTIDAD">Entidad</label>
            <select id="ENTIDAD" name="ENTIDAD" required>
                <?php
                $json_data = file_get_contents('estados.json');
                $data = json_decode($json_data, true);
                foreach($data as $item) {
                   echo '<option value="'.$item['nombre'].'">'.$item['nombre'].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="NACIONALIDAD">Nacionalidad</label>
            <input type="text" id="NACIONALIDAD" name="NACIONALIDAD" required placeholder="Nacionalidad">
        </div>
        <div class="form-group">
            <label for="PLAN_DE_ESTUDIOS">Plan de Estudios</label>
            <input type="text" id="PLAN_DE_ESTUDIOS" name="PLAN_DE_ESTUDIOS" required placeholder="Plan de Estudios">
        </div>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>