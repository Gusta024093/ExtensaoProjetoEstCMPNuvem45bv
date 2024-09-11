<?php
    $server = "localhost";
    $nome = "root";
    $senha = "";
    $db = "gbras";

    $conn = new mysqli($server, $nome, $senha, $db);
    if ($conn->connect_error) {
        die("Falhou ao Conectar: " . $conn->connect_error);
    }

?> 