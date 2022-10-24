<?php 
    try{
        $conectar=new PDO('mysql:host=localhost; dbname=prueba','root','');
        //echo "conexion exitosa";
    }catch(Exception $e){
        die('Error al conectar con bd'.$e->getMessage());
    }
?>