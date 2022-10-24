<?php
    include 'conectar.php';
    try{
        $cedula=$_GET['cod2'];
        //echo $cedula;

        $sql="SELECT * FROM vendedores WHERE cedula = $cedula";
        $resultado=$conectar->prepare($sql);
        $resultado->execute(array());
        while($consulta = $resultado -> fetch(PDO::FETCH_ASSOC)){
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
            <table class="table table-striped container">
                <tr>
                    <td colspan="2">Esta seguro que desea actualizar los datos del vendedor <?php echo $consulta['nombre_v']; ?>?</td>
                </tr>
                <tr>
                    <td><a class="btn btn-success" href="actualizarVendedor3.php?cod3=<?php echo $consulta['cedula']; ?>">Si </a></td>
                    <td><a class="btn btn-danger" href="consultarVendedor.php">No</a></td>
                </tr>
            </table>
            </div>
</body>
</html>
            <?php
        }
    }catch(Exception $e){
        die('Error al consultar un vendedor'.$e->getMessage());
    }
?>