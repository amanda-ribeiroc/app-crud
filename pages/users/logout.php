<?php
    // Iniciar e/ou retornar sessão atual
    session_start();

    // Função para destroir os dados da sessão e redirecionar o usuário para a página de login
    function logout() {
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit;
    }

    // Verificar a variável da sessão se é verdadeira, caso seja diferente o usuário é direcionado para a página de login
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("Location: login.php");
        exit;
    }
?>
