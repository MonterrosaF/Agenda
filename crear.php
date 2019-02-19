<?php 
    if(isset($_POST['nombre'])){
        $nombre = $_POST['nombre'];
    }
    if(isset($_POST['numero'])){
        $numero = $_POST['numero'];
    }

    try{
        require_once('funciones/bd_conexion.php');
        $sql = "INSERT INTO `contactos` (`id`, `nombre`, `telefono`) ";
        $sql .= "VALUES (NULL,'{$nombre}','$numero'); "; 
        $resultado = $conn->query($sql);
    }catch(Exception $e){
        $error = $e->getMessage();
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agenda PHP</title>
    <link href="https://fonts.googleapis.com/css?family=Proza+Libre" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css" media="screen" title="no title">
  </head>
  <body>

    <div class="contenedor">
      <h1>Agenda de Contactos</h1>

        <div class="contenido">
            <?php 
                if ($resultado){
                    echo "Contacto creado";
                } else {
                    echo "Error " . $conn->error;
                }
            ?>
            <br>
        <a class="volver" href="index.php">Volver a Inicio</a>
        </div> <!--.contenido-->
    </div>

    <?php 
        $conn->close();
    ?>

    </body>
    </html>