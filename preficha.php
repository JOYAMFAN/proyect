<?php 
    include("conectar_bd.php");
   

    $sql="SELECT *  FROM preficha";
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
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <style>
            .altura-40px{
                height: 40px;
            }
            .altura-100-por-ciento
        {
            height: 100%;
        }
        .altura-100-por-ciento-menos-80px-20px
        {
            height:Calc(100% - 80px - 20px)
        }
        .anchura-50-por-ciento
        {
            width: 50%;
        }
        .anchura-50-por-ciento-padding-10px
        {
            width: calc(50% - 20px);
            padding:0px 10px;
        }
        .anchura-100-por-ciento
        {
            width: 100%;
        }
        .display-flex
        {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        </style>
    </head>
    <body style="background-color:CornflowerBlue;overflow-auto" class="altura-100-por-ciento">
    <form action="datos2.php" method="POST" class="altura-100-por-ciento" style="overflow:auto">
        <div class="altura-40px anchura-100-por-ciento display-flex" style="font-size: 1.5em; margin: 10px auto" >
                    <span>Ingresa tus datos</span>
    </div>
    <div class="altura-100-por-ciento-menos-80px-20px anchura-100-por-ciento">
   
        <div class="anchura-100-por-ciento altura-40-px display-flex">
            <div class="anchura-50-por-ciento-padding-10px altura-100-por-ciento">
            <input type="text" class="form-control mb-3" name="CURP" require placeholder="CURP">
            
            
            </div>
            <div class="anchura-50-por-ciento-padding-10px altura-100-por-ciento">
            <input type="text" class="form-control mb-3" name="NOMBRE" required  placeholder="Nombre(s) del Aspirante">
           
            </div>
        </div>
        <div class="anchura-100-por-ciento altura-40-px display-flex">
            <div class="anchura-50-por-ciento-padding-10px altura-100-por-ciento">
            <input type="text" class="form-control mb-3" name="APELLIDO_PATERNO" required placeholder="Primer Apellido">
            </div>
            <div class="anchura-50-por-ciento-padding-10px altura-100-por-ciento">
            <input type="text" class="form-control mb-3" name="APELLIDO_MATERNO" require placeholder="Segundo Apellido">
            </div>
        </div>
        <div class="anchura-100-por-ciento altura-40-px display-flex">
            <div class="anchura-50-por-ciento-padding-10px altura-100-por-ciento display-flex">
                <div class="altura-100-por-ciento display-flex" style="width:100px;">
                    <span>¿Tienes Beca?</span>
                </div>
                <div class="altura-100-por-ciento display-flex" style="width:calc(100% - 100px)">
                <input type="checkbox" name="BECA" value="si">
                </div>
                
            </div>
            <div class="anchura-50-por-ciento-padding-10px altura-100-por-ciento">
            <input type="text" class="form-control mb-3" name="EDAD" require placeholder="EDAD">
            </div>
        </div>
        <div class="anchura-100-por-ciento altura-40-px display-flex">
            <div class="anchura-50-por-ciento-padding-10px altura-100-por-ciento display-flex">
                <div class="altura-100-por-ciento display-flex" style="width:100px;">
                    <span>Sexo</span>
                </div>
                <div class="altura-100-por-ciento display-flex" style="width:calc(100% - 100px)">
                <select name="SEXO"  required placeholder="">
                                 <option value="">Seleccione</option>
                                 <option value="masculino">Masculino</option>
                                 <option value="femenino">Femenino</option>
                                 <option vaue="prefiero_no_decirlo">Prefiero no decirlo</option>
                                 </select>
                </div>
            </div>
            <div class="anchura-50-por-ciento-padding-10px altura-100-por-ciento">
            <input type="text" class="form-control mb-3" name="ESCUELA" require placeholder="Escuela Secundaria de Procedencia">
            </div>
        </div>
        <div class="anchura-100-por-ciento altura-40-px display-flex">
            <div class="anchura-50-por-ciento-padding-10px altura-100-por-ciento">
            <input type="text" class="form-control mb-3" name="CICLO_ESCOLAR_DE_EGRESO" require placeholder="Ciclo Escolar de Procedencia(solo si aplica)">
            </div>
            <div class="anchura-50-por-ciento-padding-10px altura-100-por-ciento display-flex">
            <div class="altura-100-por-ciento display-flex" style="width:100px;">
                    <span>Entidad</span>
                </div>
                <div class="altura-100-por-ciento display-flex" style="width:calc(100% - 100px)">
                <select name="ENTIDAD" id="">
                <?php
                $json_data = file_get_contents('estados.json');
                $data = json_decode($json_data, true);
                foreach($data as $item)
                {
                   echo '<option value="'.$item['nombre'].'">'.$item['nombre'].'</option>';
                }
                ?>
           </select>
            </div>
            </div>
        </div>
        <div class="anchura-100-por-ciento altura-40-px display-flex">
            <div class="anchura-50-por-ciento-padding-10px altura-100-por-ciento">
            <input type="text" class="form-control mb-3" name="NACIONALIDAD" require placeholder="Nacionalidad">
            </div>
            <div class="anchura-50-por-ciento-padding-10px altura-100-por-ciento">
            <input type="text" class="form-control mb-3" name="PLAN_DE_ESTUDIOS" require placeholder="Plan de Estudios">
            </div>
        </div>
            
    </div>
    <div class="altura-40px anchura-100-por-ciento display-flex" style="font-size: 1.5em;" >
                  <div class="altura-40px anchura-100-por-ciento display-flex" style="font-size: 1.5em; margin: 10px auto" >
                  <input type="submit" class="btn btn-primary" value="Enviar"><a href="datos2.php?">
    </div>
    </div>
    </form>
    </body>
</html>