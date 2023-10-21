<?php

    session_start();
    session_destroy();
?>
<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://shiranaisaito.000webhostapp.com/Adaptativo/conexionpublicaciones/css/estilo.css">
    <title>Historietas</title>
</head>
<body>
    
    <center>
        <tr>Integrantes de NewJeans</tr>
        <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Nacionalidad</th>
                        <th>Edad</th>
                        <th>Imagen</th>
                    </tr>
                </thead>
        
    
    <!--------------TITULOS------------------------------------------->
        <tbody>
            <?php
                include ("open.php");
                $consulta = "SELECT * FROM integrantesnj";
                $resultado = $conexion->query($consulta);
                while($row = $resultado->fetch_assoc()){
            ?>
                <tr>
                    <td><?php echo $row['id']; ?> </td>
                    <td><?php echo $row['nombre']; ?> </td>
                    <td><?php echo $row['nacionalidad']; ?> </td>
                    <td><?php echo $row['edad']; ?> </td>
                    <td> <img width="50px" src="data:image/jpg;base64, <?php echo base64_encode ($row['imagen']);?>">  </td>
                </tr>
                <?php
                }
            ?>
        </tbody>
    </table>
    </center>
</body>
</html>