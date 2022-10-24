<?php
include 'conectar.php';

$cedula=$_GET['cod2'];
//echo $cedula;
$nombre=$_POST['txtn'];
$telefono=$_POST['txttel'];

$sql="UPDATE vendedores SET  nombre_v = :nom, telefono_v = :tel WHERE cedula = $cedula";
$resultado=$conectar->prepare($sql);
$resultado->execute(array(":nom"=>$nombre,":tel"=>$telefono));
?>
<script type="text/javascript">window.alert('Vendedor actualizado exitosamente'); window.location="consultarVendedor.php"</script>
<?php
?>
