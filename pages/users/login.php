<?php

  session_start();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST["email"];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();

    $res = $stmt->get_result();

    if ($res->num_rows == 1) {
      $row = $res->fetch_assoc();

      if (password_verify($password, $row['password'])) {
        $_SESSION["loggedin"] = true;

        header("Location: index.php");
        exit;
      }
    }
    else {
      $error = "Usuário e/ou senha incorreto(s)";
    }
  }
?>
<h1>Entrar</h1>
<form action="?page=dashboard" method="POST">
  <div class="form-row">
    <div class="col-md-4">
      <label class="col-form-label" for="inlineFormInput">Email</label>
      <input type="email" class="form-control" id="inlineFormInput" name="email" placeholder="exemplo@exemplo.com">
    </div>
    <div class="col-md-4">
      <label for="inputPassword3" class="col-form-label">Senha</label>
      <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Senha" style="width: 150px;">
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mt-2">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="autoSizingCheck">
        <label class="form-check-label" for="autoSizingCheck">
          Lembrar de mim
        </label>
      </div>
      <div class="form-row mt-2">
        <p>Ainda não é cadastrado (a)? <a href="?page=new-user">Crie sua conta.</a></p>
      </div>
    </div>
  </div>
  <div class="form-row mt-1">
    <div class="col-md-4">
      <button type="submit" class="btn btn-primary" id="btn-login">Entrar</button>
    </div>