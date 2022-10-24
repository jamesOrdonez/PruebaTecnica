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
    <title>Insertar marca</title>
</head>
<body>
    <div class="container">
    <h2 class="h2">marcas</h2><br>
    <form action="" method="post" class="container">
            <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Nombre</label>
          <input type="text" class="form-control" name="txtn" placeholder="Nombre" required>
        </div>
        <div class="mb-3">
        <input type="submit" value="Registrar" class="btn btn-success" name="btn1">
        </div>
    </form>
</div>
<?php
    try{
        if(isset($_POST['btn1'])) {
            //echo "funciona";
            $nombre=$_POST['txtn'];
    
            $sql="INSERT INTO marcas (id, nombre) VALUES ('',:nom)";
            $resultado=$conectar->prepare($sql);
            $resultado->execute(array(":nom"=>$nombre));
            ?>
            <script type="text/javascript">window.alert('Marca registrada exitosamente');</script>
            <?php
        }
    }catch(Exception $e){
        die('error al insertar una marca'.$e->getMessage());
    }

?>
</body>
</html>