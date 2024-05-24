<?php

include("conectar_bd.php");
try {
    // Validar que los datos están presentes en la solicitud POST
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $USUARIO = mysqli_real_escape_string($conexion, $_POST['username']);
        $PASSWORD = mysqli_real_escape_string($conexion, $_POST['password']);

        // Cifrar la contraseña usando SHA-256
        $PASSWORD = hash('sha256', $PASSWORD);
        // Consulta para verificar si el usuario y contraseña existen en la base de datos
        $sql_consulta = "SELECT * FROM usuarios WHERE USUARIO = '$USUARIO' AND PASSWORD = '$PASSWORD'";
        $query = mysqli_query($conexion, $sql_consulta);

        // Verificar si la consulta fue exitosa
        if ($query) {
            // Verificar si se encontró algún resultado
            if (mysqli_num_rows($query) > 0) {
               session_start();
               $_SESSION['Usuario']=$USUARIO;
               header("location: registros.php");

            } else {
                // Usuario no encontrado
                echo "Usuario no encontrado.";
            }
        } else {
            throw new Exception("Error en la consulta: " . mysqli_error($conexion));
        }
    } else {
        throw new Exception("Datos incompletos en el formulario.");
    }
} catch (Exception $e) {
    // Manejo de errores
    echo "Hubo un error al procesar tu solicitud. Detalles del error: " . $e->getMessage();
} finally {
    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}

?>
