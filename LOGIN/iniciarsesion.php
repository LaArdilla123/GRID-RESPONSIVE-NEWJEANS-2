<?php
/* Inicializa las variables*/
session_start();
include('conexion.php');

 

if(isset($_POST['usuario']) && isset($_POST['clave'])){
    function validar($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

 

    $usuario = validar($_POST['usuario']);
    $clave   = validar($_POST['clave']);
    if(empty($usuario)){
        header("Location: index.php?error=Usuario requerido");
        exit();
    }elseif(empty($clave)){
        header("Location: index.php?error=Clave requerida");
        exit();
    }else{
        $sql = "SELECT * FROM alumnos WHERE usuario = '$usuario' AND clave = '$clave'";
        $result = mysqli_query($conexion, $sql); //El resultado debe ser TRUE para continuar
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['usuario'] === $usuario && $row['clave'] === $clave){
                //En este momento se generan las variables
                $_SESSION['usuario']            = $row['usuario'];
                $_SESSION['nombre_completo']   = $row['nombre_completo'];
                $_SESSION['id']                 = $row['id'];

 

                header("Location: inicio.php");
                exit();
            }else{
                header("Location: index.php?error=El usuario o la clave no corresponden");
                exit();
            }
        }else{
            header("Location: index.php?error=El usuario o la clave no corresponden");
                exit();
        }
    }
}else{
    header("Location: index.php?error=El usuario o la clave no corresponden");
    exit();
}
?>