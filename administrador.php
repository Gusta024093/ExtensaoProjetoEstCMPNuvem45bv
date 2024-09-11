<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Administrador</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
        require("banco.php");
        require_once("menu.php");
        if (!empty($_SESSION['nome']) or isset($_SESSION['nome']) and $_SESSION['admin'] == 1){
    ?>
    <div id="formulario-login">
        <fieldset id="caixa-delimitadora" class="border rounded-3 p-3">
            <div class="form1" id="id_titulo">
                <h1>Bem vindo, <?php echo $_SESSION['nome'];?></h1>
                <div style="margin 55px 0 55px 0">

                </div>
                <hr>
            </div>
            <div class="container mt-5">
                <h1>Pedidos</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $consulta = $conn->prepare("
                        SELECT pedido.id, Cliente.telefone, Cliente.email, pedido.titulo, pedido.descricao, pedido.estado FROM Cliente, Pedido,
                        Administrador_Pedido, Administrador where Cliente.cpf = Pedido.cpf_cliente and Pedido.id = Administrador_Pedido.id_pedido
                        and Administrador_Pedido.id_administrador = Administrador.id and Administrador.cpf = ?;
                    ");
                    
                    if ($consulta === false) {
                        die('Erro na preparação da consulta: ' . $conn->error);
                    }
                    
                    $consulta->bind_param("s", $_SESSION["cpf"]);

                    if ($consulta->execute() === false) {
                        die('Erro na execução da consulta: ' . $consulta->error);
                    }

                    $resultado = $consulta->get_result();
                    if ($resultado === false) {
                        die('Erro ao obter o resultado: ' . $consulta->error);
                    }
                    if ($resultado->num_rows > 0) {
                        while ($linha = $resultado->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($linha['id']) . '</td>';
                            echo '<td>' . htmlspecialchars($linha['telefone']) . '</td>';
                            echo '<td>' . htmlspecialchars($linha['email']) . '</td>';
                            echo '<td>' . htmlspecialchars($linha['titulo']) . '</td>';
                            echo '<td>' . htmlspecialchars($linha['descricao']) . '</td>';
                            echo '<td class="editable" data-id="' . htmlspecialchars($linha['id']) . '">' . htmlspecialchars($linha['estado']) . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="4">Nenhum pedido encontrado.</td></tr>';
                    }
                    $consulta->close();
                        ?>
                    </tbody>
                </table> 
            </div>    
        </fieldset>
    </div>
    <?php
        } else {
            echo "<h1>Não acesse diretamente essa página!!!</h1>";
        }
    ?>
    <script src="scripts.js"></script>
    
</body>
</html>