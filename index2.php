<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Cliente</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
        require("banco.php");
        require_once("menu.php");
        if (!empty($_SESSION['nome']) or isset($_SESSION['nome'])){
            if (isset($_GET['erro']) == '1'){
                echo "<p style='color: red';>Preencha corretamente os campos</p>";
            }
            else if (isset($_GET['sucesso']) == '1'){
                echo "<p style='color: green';>Agora espere o contato do funcionário que irá atender pelo telefone e combinar o local e o horário que deve se apresentar! </br>Lembre se de tirar uma print desta mensagem ;)</p>";
            }
    ?>
    <div id="formulario-login">
        <fieldset id="caixa-delimitadora" class="border rounded-3 p-3">
            <div class="form1" id="id_titulo">
                <h1>Bem vindo, <?php echo $_SESSION['nome'];?></h1>
                <div style="margin 55px 0 55px 0">

                </div>
                <h2>Como posso ajudar?</h2>
                <hr>
            </div>
            <form action="./registro.php" method="post">
                <div class="form1 input-group">
                    <span class="input-group-text">Título</span>
                    <input type="text" name="titulo" id="titulo" aria-label="Título" placeholder="Título" class="form-control" minlength="1" maxlength="49">
                </div>
                <div class="form1 input-group">
                    <span class="input-group-text">Problema</span>
                    <textarea name="descricao" id="descricao" minlength="1" maxlength="254" class="form-control" placeholder="Digite seu problema aqui"></textarea>
                </div>
                <hr>
                <div class="form1">
                    <label for="profissional">Escolha o Profissional:</label><br>
                    <select id="profissional"  name="profissional">
                        <?php
                            $resultado = $conn->query("SELECT id, nome FROM Administrador;");
                            foreach ($resultado as $r){
                                echo "<option value=" . $r['id'] .">" . $r['nome'] . "</option>";
                            }
                        ?>
                    </select>
                </div >
                <div class="form1" id="id_botao" >
                    <input type="submit" value="Enviar" class="btn btn-dark">
                </div>
            </form>       
        </fieldset>
    </div>
    <?php
        } else {
            echo "<h1>Não acesse diretamente essa página!!!</h1>";
        }
    ?>
    
</body>
</html>