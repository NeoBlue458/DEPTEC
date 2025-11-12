<?php
include('config.php');

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $sql = "DELETE FROM servicios WHERE ID = $id_servicio";
    
    if ($conectar->query($sql) === TRUE) {
        echo "OK";
    } else {
        echo "Error: " . $conectar->error;
    }
}
?>
