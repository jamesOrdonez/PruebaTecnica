<?php
    include 'conectar.php';
    $codigo=$_GET['cod'];
    //echo $codigo;
    $sql="DELETE FROM ventas WHERE id_venta=$codigo";
    $resultado=$conectar->prepare($sql);
    $resultado->execute(array());
    ?>
    <script type="text/javascript">window.alert('Compra eliminada con éxito'); window.location="consultarVentas.php"</script>
    <?php
?>