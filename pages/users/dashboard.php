<!-- -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <i class="fa-solid fa-list-check"></i>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <button class='btn btn-secondary' type="submit" name="logout" value="logout">Sair</button>

            <?php
            if (isset($_POST["logout"])) {
                logout();
            }
            ?>
    </div>
    <div class="table">
        <?php
        //  include __DIR__ . '/../projects/project-list.php';
        ?>
    </div>
</nav>
<?php

// Função para obter o id do usuário logado
function getLoggedInUserId() {
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];

    $sql = "SELECT id FROM users WHERE email = :email AND password = :password ";
    $stmt = $conn->prepare($sql);
    $stmt->binParam(':email', $email);
    $stmt->bindParam(':password', $password);

    $stmt->execute();

    $row = $stmt->fetch();

    if ($row) {
        return $row->id;
    } else {
        return null;
    }
}

// Barra de pesquisar
$search = isset($_GET['search']) ? $_GET['search'] : '';

if (!empty($search)) {
    $sql .= " WHERE projects.titulo LIKE '%$search%' OR projects.description LIKE '%$search%' OR users.username LIKE '%$search%'";
}

$sql = "SELECT projects.*, users.username FROM projects LEFT JOIN users ON projects.user_id = users.id WHERE projects.user_id = :logged_in_user_id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':logged_in_user_id', strval(getLoggedInUserId()));
$stmt->execute();
$res = $stmt->get_result();
$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<table class='table table-hover table-striped table-bordered'>";
    print "<thead>";
    print "<tr>";
    print "<th class='bg-info'>#</th>";
    print "<th class='bg-info'>Título</th>";
    print "<th class='bg-info'>Descrição</th>";
    print "<th class='bg-info'>Status</th>";
    print "<th class='bg-info'>Responsável</th>";
    print "<th class='bg-info'>Prazo</th>";
    print "<th class='bg-info'>Data de Criação</th>";
    print "<th class='bg-info'>Ações</th>";
    print "</tr>";
    print "</thead>";
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->id . "</td>";
        print "<td>" . $row->titulo . "</td>";
        print "<td>" . $row->description . "</td>";
        print "<td>" . $row->ativo . "</td>";
        print "<td>" . $row->username . "</td>";
        print "<td>" . $row->date_updated . "</td>";
        print "<td>" . $row->date_create . "</td>";
        print "<td>
            <button onclick=\"location.href='?page=edit-project&id=" . $row->id . "';\" class='btn btn-success'>Editar</button>
            <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=save-project&acao=excluir&id=" . $row->id . "';}else{false;}\" class='btn btn-danger'>Excluir</button>
        </td>";
        print "</tr>";
    }
} else {
    print "<tr><td colspan='7' class='alert alert-danger'>Nenhum projeto cadastrado ainda!</td></tr>";
}

print "</table>";

?>