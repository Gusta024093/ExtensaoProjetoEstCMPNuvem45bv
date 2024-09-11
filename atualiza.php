<?php
    require_once("banco.php");

    $id = $_POST['id'];
    $estado = $_POST['estado'];

    $consulta = $conn->prepare("UPDATE Pedido SET estado = ? WHERE id = ?;");
    $consulta->bind_param("ss", $estado, $id);

    if ($consulta->execute()) {
        echo "success";
    } else {
        echo "Erro: " . $consulta->error;
    }
    $consulta->close();
?>