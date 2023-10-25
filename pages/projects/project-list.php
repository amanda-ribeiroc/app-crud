<h1>Projetos</h1>
<main>

  <section>
    <a href="?page=create-project">
      <button class="btn btn-success">Criar novo projeto</button>
    </a>
  </section>

</main>
<nav class="navbar navbar-light bg-light mt-2">
  <a class="navbar-brand">Navbar</a>
  <form class="form-inline" method="GET">
    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Pesquisar" aria-label="Pesquisar">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
  </form>
</nav>

<?php

  $search = isset($_GET['search']) ? $_GET['search'] : '';

  if (!empty($search)) {
    $sql .= " WHERE projects.titulo LIKE '%$search%' OR projects.description LIKE '%$search%' OR users.username LIKE '%$search%'";
  }

  $sql = "SELECT projects.*, users.username FROM projects LEFT JOIN users ON projects.user_id = users.id";

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $res = $stmt->get_result();
  $qtd = $res->num_rows;

  if ($qtd > 0) {
    print "<table class='table table-hover table-striped table-bordered'>";
    print "<thead>";
    print "<tr>";
    print "<th class='bg-primary'>#</th>";
    print "<th class='bg-primary'>Título</th>";
    print "<th class='bg-primary'>Descrição</th>";
    print "<th class='bg-primary'>Status</th>";
    print "<th class='bg-primary'>Responsável</th>";
    print "<th class='bg-primary'>Prazo</th>";
    print "<th class='bg-primary'>Data de Criação</th>";
    print "<th class='bg-primary'>Ações</th>";
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
      <button onclick=\"location.href='?page=edit-project&id=".$row->id."';\" class='btn btn-success'>Editar</button>
      <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=save-project&acao=excluir&id=" . $row->id . "';}else{false;}\" class='btn btn-danger'>Excluir</button>
    </td>";
    print "</tr>";
  }
  } else {
    print "<tr><td colspan='7' class='alert alert-danger'>Nenhum projeto cadastrado ainda!</td></tr>";
  }

  print "</table>";
?>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item">
      <a class="page-link" href="?page=projetos&pagina=<?php echo $currentPage - 1; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <?php
    for ($i = 1; $i <= $qtd / 15; $i++) {
      echo "<li class='page-item'><a class='page-link' href='?page=projetos&pagina=$i'>$i</a></li>";
    }
    ?>
    <li class="page-item">
      <a class="page-link" href="?page=projetos&pagina=<?php echo $currentPage + 1; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>