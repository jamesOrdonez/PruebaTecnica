<?php
    include 'conectar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2 class="h2">Actualización de datos de un vendedor</h2><br>
        <?php
        try{
            $cedula=$_GET['cod'];
            //echo $cedula;
            $sql="SELECT * FROM vendedores WHERE cedula = $cedula";
            $resultado=$conectar->prepare($sql);
            $resultado->execute(array());
            while($consulta = $resultado -> fetch(PDO::FETCH_ASSOC)){
                ?>
                <form action="actualizarVendedor3.php?cod2=<?php echo $consulta['cedula'];?>" method="post">
                    <input type="hidden" name="txtc" value="<?php echo $consulta['cedula'];?>">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="txtn" value="<?php echo $consulta['nombre_v'];?>">
                    </div>
                    <div class="mb-3">
                      <label for="formGroupExampleInput2" class="form-label">Teléfono</label>
                      <input type="text" class="form-control" id="formGroupExampleInput2" name="txttel" value="<?php echo $consulta['telefono_v'];?>">
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Actualizar" class="btn btn-success">
                    </div>
                    </form>
                <?php
            }
        }catch(Exception $e){
            die('Error al actualizar información de un vendedor'.$e->getMessage());
        }
        ?>

    </div>
</body>
</html>