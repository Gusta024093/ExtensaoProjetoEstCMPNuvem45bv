<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php require_once("menu.php");?>
    <div class="formulario-cadastro">
        <fieldset class="border rounded-3 p-3">
            <div class="form1" id="id_titulo">
                <h1>Área de Cadastro</h1>
            </div>
            <form action="./dados.php" method="post">
                <div class="form1 input-group">
                    <span class="input-group-text">Nome e sobrenome</span>
                    <input type="text" name="nome" id="nome" aria-label="Primeiro Nome" placeholder="Primeiro Nome" class="form-control" maxlength="20">
                    <input type="text" name="sobrenome" id="sobrenome" aria-label="Último Nome" placeholder="Último Nome" class="form-control" maxlength="30">
                </div>
                <div class="form1 input-group">
                    <span class="input-group-text">CPF</span>
                    <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Digite seu CPF aqui" minlength="11" maxlength="11">
                </div >
                <div class="form1 input-group">
                    <span class="input-group-text">Telefone</span>
                    <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="Digite seu telefone aqui" minlength="13" maxlength="13">
                </div >
                <div class="form1 input-group">
                    <span class="input-group-text">E-mail</span>
                    <input type="mail" name="email" class="form-control" id="email" placeholder="Digite seu e-mail aqui" minlength="0" maxlength="30">
                </div >
                <div class="form1 input-group">
                    <span class="input-group-text">Crie sua Senha</span>
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha aqui" minlength="8" maxlength="30">
                </div >
                <div class="form1 input-group">
                    <span class="input-group-text">Confirmar Senha</span>
                        <input type="password" class="form-control" name="senha2" id="senha2" placeholder="Confirme a sua senha aqui" minlength="8" maxlength="30">
                </div > 
                <div class="form1" id="id_botao" >
                    <input type="submit" value="Cadastrar Agora" class="btn btn-dark">
                </div>
            </form>    
        </fieldset>
    </div>
    <script src="scripts.js"></script>
</body>
</html>