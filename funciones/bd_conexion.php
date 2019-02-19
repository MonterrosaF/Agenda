<?php 
    $conn = new mysqli('localhost','root', 'Owlblack24', 'contactos');

    if ($conn->connect_error){
        echo $error = $conn->connect_error;
    }
?>