<?php
    session_start();
    require("banco.php");

    $titulo = sanitizeInput($_POST['titulo'] ?? '');
    $descricao = sanitizeInput($_POST['descricao'] ?? '');
    $profissional = $_POST['profissional'];
    $estado = "Não Iniciado";

    function sanitizeInput($data) {
        return htmlspecialchars(trim($data));
    }

    if (!empty($titulo) && !empty($descricao) && !empty($profissional)){
        $consulta = $conn->prepare("INSERT INTO Pedido (cpf_cliente, titulo, descricao, estado) VALUES (?, ?, ?, ?)");
        $consulta->bind_param("ssss", $_SESSION['cpf'], $titulo, $descricao, $estado);
        $consulta2 = $conn->prepare("INSERT INTO Administrador_Pedido (id_administrador) VALUES (?);");
        $consulta2->bind_param("s", $profissional);

        $successo = $consulta->execute();
        $successo2 = $consulta2->execute();

        if ($successo and $successo2) {
            header("Location:index2.php?sucesso=1");
        } else {
            echo "Ah, não deu algum erro :(";
        }
        exit();
    }
    else{
        header("Location:index2.php?erro=1");
    }




?>