<?php
//guarda a saída em buffer: permite usar header() (redirecionamento) dentro das views
ob_start();
//importa o UsuarioController.php
require_once __DIR__ . '/controller/UsuarioController.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.1.0/css/all.css' rel='stylesheet'>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js'></script>
</head>
<body>
<div class="container mt-4">
<?php

if(isset($_GET['action'])){
    if($_GET['action'] == 'editar'){
        //Chama uma função PHP que permite informar a classe e o Método que será acionado
        $usuario = call_user_func(array('UsuarioController','editar'), $_GET['id']);
        require_once __DIR__ . '/view/cadUsuario.php';
    }
    if($_GET['action'] == 'listar'){
        require_once __DIR__ . '/view/listUsuario.php';
    }

    if($_GET['action'] == 'excluir'){
        //Chama uma função PHP que permite informar a classe e o Método que será acionado
        $usuario = call_user_func(array('UsuarioController','excluir'), $_GET['id']);
        require_once __DIR__ . '/view/listUsuario.php';
    }
}else{
    require_once __DIR__ . '/view/cadUsuario.php';
}

?>
</div>
</body>
</html>
