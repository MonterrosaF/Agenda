<?php 
function peticion_ajax()
{
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

$nombre = htmlspecialchars($_POST['nombre']);
$numero = htmlspecialchars($_POST['numero']);

try {
    require_once('funciones/bd_conexion.php');
    $sql = "INSERT INTO `contactos` (`id`, `nombre`, `telefono`) ";
    $sql .= "VALUES (NULL,'{$nombre}','$numero'); ";
    $resultado = $conn->query($sql);

    if (peticion_ajax()) {
        echo json_encode(array(
            'respuesta' => $resultado
        ));
    } else {
        exit;
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}


$conn->close();
?>