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
        <h2 class="h2">Vendedores registrados</h2><br>
<table class="table table-striped">
    <tr>
        <th>Cedula</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Admin.</th>
    </tr>
    <?php
    try{
        $sql="SELECT * FROM vendedores";
        $resultado=$conectar->prepare($sql);
        $resultado->execute(array());
        while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?php echo $consulta['cedula'];?></td>
                <td><?php echo $consulta['nombre_v'];?></td>
                <td><?php echo $consulta['telefono_v'];?></td>
                <td><a class="btn btn-primary" href="actualizarVendedor.php?cod=<?php echo $consulta['cedula'];?>">Actualizar</a></td>
            </tr>
            <?php
        }
    }catch(Exception $e){
        die('Error al consultar un vendedor'.$e->getMessage());
    }
    ?>
</table>
</div>
</body>
</html>