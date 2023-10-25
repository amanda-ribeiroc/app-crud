<h2>Lista de Usuários</h2>
<?php
    $sql = "SELECT * FROM users";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();

    $qtd = $res->num_rows;

    if ($qtd > 0) {
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<thead>";
        print "<tr>";
        print "<th class='bg-warning'>#</th>";
        print "<th class='bg-warning'>Nome</th>";
        print "<th class='bg-warning'>E-mail</th>";
        print "<th class='bg-warning'>Username</th>";
        print "</tr>";
        print "</thead>";
        while ($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>" . $row->id . "</td>";
            print "<td>" . $row->name . "</td>";
            print "<td>" . $row->email . "</td>";
            print "<td>" . $row->username . "</td>";
            print "</tr>";
        }
    } else {
        print "<p class='alert alert-danger'>Nenhum usuário cadastrado!</p>";
    }
    print "</table>";
?>