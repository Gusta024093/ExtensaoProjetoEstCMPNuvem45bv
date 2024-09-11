<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
        require_once("menu.php");
    ?>
    <div class="formulario-login">
        <fieldset class="border rounded-3 p-3">
            <div class="form1" id="id_titulo">
                <h1>Área de Acesso</h1>
            </div>
            <form action="./dados.php" method="post">
                <div class="form1 input-group">
                    <span class="input-group-text">CPF</span>
                    <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Digite seu CPF aqui" minlength="11" maxlength="11" oninput="formatarCPF(this)">
                </div >
                <div class="form1 input-group">
                    <span class="input-group-text">Senha</span>
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha aqui" minlength="8" maxlength="30">
                </div >
                <div class="form1 form-check" style="text-align: left">
                    <input class="form-check-input" type="checkbox" id="useradministrador" name="useradministrador">
                    <label class="form-check-label" for="useradministrador">
                        É Admin?
                </label>
                </div>
                <div class="form1" id="id_botao" >
                    <input type="submit" value="Entrar" class="btn btn-primary">
                </div>
            </form>    
            <p id="cliente-cadastro">Não tem login? <a href="./cadastro_cliente.php">Clique aqui</a></p>   
            <?php
                if (isset($_GET['login']) == 1){
                    echo "<p style='color: red'>Erro ao logar!</p>";
                }
            ?>
        </fieldset>
    </div>
    <script src="scripts.js"></script>
</body>
</html>