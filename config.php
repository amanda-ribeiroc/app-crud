<!-- Base de dados conexão com MySQLi -->
<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('BASE', 'crud');

    $conn = new MySQLi(HOST, USER, PASS, BASE);
?>