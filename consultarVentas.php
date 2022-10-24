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
        <h2 class="h2">Ventas</h2><br>
        <form action="" method="post">
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Cedula</label>
          <input type="number" class="form-control" name="txtc" placeholder="Cedula" required>
        </div>
        <div class="mb-3">
            <input type="submit" value="Buscar" name="btn1" class="btn btn-primary">
        </div>
        </form><br>
        <table class="table table-striped">
            <tr>
                <th>Codigo</th>
                <th>Fecha</th>
                <th>Vehiculo</th>
                <th>Vendedor</th>
                <th>Admin</th>
            </tr>
            <?php
            try{
                if(isset($_POST['btn1'])){
                    //echo 'funciona';
                    $cedula=$_POST['txtc'];

                    $sql="SELECT * FROM ventas INNER JOIN vendedores ON cedula=vendedor INNER JOIN vehiculo ON id=vehiculo WHERE vendedor = $cedula";
                    $resultado=$conectar->prepare($sql);
                    $resultado->execute(array());
                    while($consulta=$resultado->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <tr>
                            <td><?php echo $consulta['id_venta'];?></td>
                            <td><?php echo $consulta['fecha'];?></td>
                            <td><?php echo $consulta['placa'];?></td>
                            <td><?php echo $consulta['nombre_v'];?></td>  
                            <td><a class="btn btn-danger" href="PreguntaEliminar.php?cod=<?php echo $consulta['id_venta'];?>">Eliminar</a></td>
                        </tr>
                        <?php
                    }
                }
            }catch(Exception $e){
                die('Error al consultar compras'.$e->getMessage());
            }
            ?>
        </table>
    </div>
</body>
</html>