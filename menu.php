<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<?php
    session_start();
    if(!empty($_SESSION['admin']) or isset($_SESSION['admin'])){
?>
<fieldset style="background-color: #6c757d; height: 150%; width:150%">
    <div class="dropdown">
    <button style="margin: 2px 0 2px 2%" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Menu
    </button>
    <ul class="dropdown-menu">
        <!-- <li><button class="dropdown-item" type="button" href="./sair.php">Sair</button></li> -->
        <li><a class="dropdown-item" href="./administrador.php">Página de <?php echo $_SESSION['nome'];?></a></li>
        <li><a class="dropdown-item" href="./sair.php">Sair</a></li>
        
    </ul>
    </div>
</fieldset>   
<?php  
    }
    else if (!empty($_SESSION['cpf']) or isset($_SESSION['cpf'])){
?>
<fieldset style="background-color: #6c757d; height: 150%; width:150%">
    <div class="dropdown">
    <button style="margin: 2px 0 2px 2%" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Menu
    </button>
    <ul class="dropdown-menu">
        <!-- <li><button class="dropdown-item" type="button" href="./sair.php">Sair</button></li> -->
        <li><a class="dropdown-item" href="./index2.php">Página de <?php echo $_SESSION['nome'];?></a></li>
        <li><a class="dropdown-item" href="./sair.php">Sair</a></li>
        
    </ul>
    </div>
</fieldset>      

<?php
    } else {
?>
<fieldset style="background-color: #6c757d; height: 150%; width:150%">
    <div class="dropdown">
    <button style="margin: 2px 0 2px 2%" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Menu
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="./index.php">Inicial</a></li>
        <li><a class="dropdown-item" href="./cadastro_cliente.php">Novo Cadastro</a></li>
    </ul>
    </div>
</fieldset> 

<?php   
    }
?>

