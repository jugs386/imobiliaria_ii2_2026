<?php
//guarda a saída em buffer: permite usar header() (redirecionamento) dentro das views
ob_start();
//importa o UsuarioController.php
require_once __DIR__ . '/controller/UsuarioController.php';
require_once __DIR__ . '/controller/ImovelController.php';
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
        <a href="?page=usuario">Cadastrar Usuário</a><br/>
        <a href="?page=imovel">Cadastrar Imóvel</a><br/>
        <?php


        if (isset($_GET['page'])) {
            if ($_GET['page'] == "imovel") {
                if (isset($_GET['action'])) {
                    if ($_GET['action'] == 'editar') {
                        //Chama uma função PHP que permite informar a classe e o Método que será acionado
                        $imovel = call_user_func(array('ImovelController', 'editar'), $_GET['id']);
                        require_once __DIR__ . '/view/cadImovel.php';
                    }
                    if ($_GET['action'] == 'listar') {
                        require_once __DIR__ . '/view/listImovel.php';
                    }

                    if ($_GET['action'] == 'excluir') {
                        //Chama uma função PHP que permite informar a classe e o Método que será acionado
                        $imovel = call_user_func(array('ImovelController', 'excluir'), $_GET['id']);
                        require_once __DIR__ . '/view/listImovel.php';
                    }
                } else {
                    require_once __DIR__ . '/view/cadImovel.php';
                }
            } elseif ($_GET['page'] == "usuario") {
                if (isset($_GET['action'])) {
                    if ($_GET['action'] == 'editar') {
                        //Chama uma função PHP que permite informar a classe e o Método que será acionado
                        $usuario = call_user_func(array('UsuarioController', 'editar'), $_GET['id']);
                        require_once __DIR__ . '/view/cadUsuario.php';
                    }
                    if ($_GET['action'] == 'listar') {
                        require_once __DIR__ . '/view/listUsuario.php';
                    }

                    if ($_GET['action'] == 'excluir') {
                        //Chama uma função PHP que permite informar a classe e o Método que será acionado
                        $usuario = call_user_func(array('UsuarioController', 'excluir'), $_GET['id']);
                        require_once __DIR__ . '/view/listUsuario.php';
                    }
                } else {
                    require_once __DIR__ . '/view/cadUsuario.php';
                }
            }
        }



        ?>
    </div>
</body>

</html>