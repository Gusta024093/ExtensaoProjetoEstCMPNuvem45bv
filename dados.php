<?php
    session_start();
    require("banco.php");

    function sanitizeInput($data) {
        return htmlspecialchars(trim($data));
    }

    $nome = sanitizeInput($_POST['nome'] ?? '');
    $sobrenome = sanitizeInput($_POST['sobrenome'] ?? '');
    $cpf = sanitizeInput($_POST['cpf'] ?? '');
    $senha = sanitizeInput($_POST['senha'] ?? '');
    $senha2 = sanitizeInput($_POST['senha2'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $telefone = sanitizeInput($_POST['telefone'] ?? '');
    $admin = sanitizeInput($_POST["useradministrador"] ?? '');


    $nomecompleto = $nome . " " . $sobrenome;

    if (!empty($admin) && !empty($cpf) && !empty($senha)){
        $consulta = $conn->prepare("SELECT nome FROM Administrador WHERE cpf = ? AND senha = ?");
        $consulta->bind_param("ss", $cpf, $senha);
        $consulta->execute();
        $consulta->store_result();
        $consulta->bind_result($nome);

        if ($consulta->num_rows > 0) {
            if ($consulta->fetch()) {
                $_SESSION["cpf"] = $cpf;
                $_SESSION['nome'] = htmlspecialchars($nome);
                $_SESSION['admin'] = 1;
                header("Location:administrador.php");
                exit();
            }
        } else {
            header("Location:index.php?login=0");
            exit();
        }

        $consulta->close();
    }

    else if (!empty($nome) && !empty($senha2) && !empty($telefone)) {
        if ($senha === $senha2) {
            $consulta = $conn->prepare("INSERT INTO Cliente (nome, cpf, senha, telefone, email) VALUES (?, ?, ?, ?, ?)");
            $consulta->bind_param("sssis", $nomecompleto, $cpf, $senha, $telefone, $email);
            $successo = $consulta->execute();
            if ($successo) {
                $consulta->close();
                header("Location: index.php?registro=1");
            } else {
                $consulta->close();
                header("Location: index.php?registro=0");
            }
            exit();
        } else {
            header("Location: index.php?registro=0");
            exit();
        }
    } 
    else if (!empty($cpf) && !empty($senha)) {
        $consulta = $conn->prepare("SELECT nome FROM Cliente WHERE cpf = ? AND senha = ?");
        $consulta->bind_param("ss", $cpf, $senha);
        $consulta->execute();
        $consulta->store_result();
        $consulta->bind_result($nome);

        if ($consulta->num_rows > 0) {
            if ($consulta->fetch()) {
                $_SESSION["cpf"] = $cpf;
                $_SESSION['nome'] = htmlspecialchars($nome);
                header("Location: index2.php");
                exit();
            }
        } else {
            header("Location: index.php?login=0");
            exit();
        }

        $consulta->close();
    } else {
        header("Location: index.php?login=0");
        exit();
    }
?>
