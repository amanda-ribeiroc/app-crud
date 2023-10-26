<!-- Base de dados conexão com MySQLi -->
<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('BASE', 'crud');

    $conn = new MySQLi(HOST, USER, PASS, BASE);

    // verificar a conexão
    if($conn->connect_error) {
        die('Erro ao conectar com o banco de dados: '. $conn->connect_error);
    }
?>