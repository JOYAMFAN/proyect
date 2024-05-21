<?php

include("conectar_bd.php");
$NOMBRE_DEL_ASPIRANTE = mysqli_real_escape_string($conexion, $_POST['NOMBRE']);
$APELLIDO_PATERNO = mysqli_real_escape_string($conexion, $_POST['APELLIDO_PATERNO']);
$APELLIDO_MATERNO = mysqli_real_escape_string($conexion, $_POST['APELLIDO_MATERNO']);
$CURP = mysqli_real_escape_string($conexion, $_POST['CURP']);

if(isset($_POST['BECA'])) {
    $BECA = 1;
} else {
    $BECA = 0;
}

$EDAD = mysqli_real_escape_string($conexion, $_POST['EDAD']);
$SEXO = mysqli_real_escape_string($conexion, $_POST['SEXO']);
$ESCUELA = mysqli_real_escape_string($conexion, $_POST['ESCUELA']);
$CICLO_ESCOLAR_DE_EGRESO = mysqli_real_escape_string($conexion, $_POST['CICLO_ESCOLAR_DE_EGRESO']);
$ENTIDAD = mysqli_real_escape_string($conexion, $_POST['ENTIDAD']);
$NACIONALIDAD = mysqli_real_escape_string($conexion, $_POST['NACIONALIDAD']);
$PLAN_DE_ESTUDIOS = mysqli_real_escape_string($conexion, $_POST['PLAN_DE_ESTUDIOS']);

try {
    // Verifica si el CURP ya existe en la base de datos
    $sql_verificar = "SELECT COUNT(*) AS total FROM preficha WHERE CURP = '$CURP'";
    $resultado_verificar = mysqli_query($conexion, $sql_verificar);

    if (!$resultado_verificar) {
        throw new Exception("Error al ejecutar la consulta de verificación del CURP.");
    }

    $fila_verificar = mysqli_fetch_assoc($resultado_verificar);

    if ($fila_verificar['total'] > 0) {
        echo "El CURP ya existe en la base de datos.";
    } else {
        // Si todos los campos están llenos y el CURP no existe en la base de datos, realiza la inserción en la base de datos
        $sql_insertar = "INSERT INTO preficha (NOMBRE, APELLIDO_PATERNO, APELLIDO_MATERNO, CURP, BECA, EDAD, SEXO, ESCUELA, CICLO_ESCOLAR, ENTIDAD_DE_PROCEDENCIA, NACIONALIDAD, PLAN_DE_ESTUDIOS) 
                VALUES ('$NOMBRE_DEL_ASPIRANTE', '$APELLIDO_PATERNO', '$APELLIDO_MATERNO', '$CURP', '$BECA', '$EDAD', '$SEXO', '$ESCUELA', '$CICLO_ESCOLAR_DE_EGRESO', '$ENTIDAD', '$NACIONALIDAD', '$PLAN_DE_ESTUDIOS')";
        $query = mysqli_query($conexion, $sql_insertar);

       

        // Redirecciona a la página 'preficha.php' si la inserción fue exitosa
        header("Location: preficha.php");
        exit(); // Asegura que el script no continúe ejecutándose después de la redirección
    }
} catch (Exception $e) {
    // Manejo de errores
    echo "Hubo un error al procesar tu solicitud. Detalles del error: " . $e->getMessage();
}

?>
