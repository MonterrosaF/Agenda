<?php 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
try {
    require_once('funciones/bd_conexion.php');
    $sql = "SELECT * FROM contactos WHERE `id` = {$id}";
    $resultado = $conn->query($sql);
} catch (Exception $e) {
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
              <div id="crear_contacto" class="crear">
                  <h2>Editar Contacto</h2>
                  
                  
                  <form action="actualizar.php" method="get" id="formulario_crear_usuario">
                  <?php while ($registro = $resultado->fetch_assoc()) { ?>
                          <div class="campo">
                              <label for="nombre">Nombre:</label>
                              <input type="text" value="<?php echo $registro['nombre']; ?>" name="nombre" id="nombre" placeholder="Nombre">
                          </div>
                          <div class="campo">
                              <label for="numero">Teléfono:</label>      
                              <input type="text" value="<?php echo $registro['telefono']; ?>" name="numero" id="numero" placeholder="Número">
                          </div>
                          <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
                          <input type="submit" value="Modificar" id="agregar" class="boton">  
                          <?php } ?>
                  </form>
              </div><!--.crear_contacto-->

        </div> <!--.contenido-->
    
    </div>
    <?php
    $conn->close();
    ?>
    </body>
    </html>