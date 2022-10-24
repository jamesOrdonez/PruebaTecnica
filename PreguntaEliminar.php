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
    <table class="table table-striped">
                     <tr>
                         <th>Esta seguro que desea eliminar la compra?</th>
                     </tr>
        <?php
        try{
            $codigo=$_GET['cod'];

            $sql="SELECT * FROM ventas WHERE id_venta=$codigo";
            $resultado=$conectar->prepare($sql);
            $resultado->execute(array());
            while($consulta=$resultado->fetch(PDO::FETCH_ASSOC)){
                ?>
                     <tr>
                         <td><a class="btn btn-success" href="eliminarVenta.php?cod=<?php echo $consulta['id_venta'];?>">Si</a></td>
                         <td><a class="btn btn-danger" href="consultarVentas.php">No</a></td>
                     </tr>
                <?php
            }
        }catch(Exception $e){
            die('Error al consultar compras'.$e->getMessage());
        }
        ?>
        </table>
    </div>
</body>
</html>