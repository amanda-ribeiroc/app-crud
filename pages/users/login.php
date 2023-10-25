<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['email']) && isset($_POST['password'])) {
    $login = $_POST['email'];
    $senha = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$login'";
    $res = $conn->query($sql);

    if (mysqli_num_rows($res) > 0) {
      $users = mysqli_fetch_assoc($res);
      if (password_verify($senha, $users['password'])) {
        session_start();
        $_SESSION['email'] = $login;
        header("Location: pages/users/list-user.php");
      } else {
        echo "<script>alert('Senha inválida');</script>";
      }
    } else {
      echo "<script>alert('Usuário não existe');</script>";
    }

    mysqli_close($conn);
  } else {
    echo "<script>alert('Por favor, preencha o formulário de login.');</script>";
  }
}
?>
<h1>Entrar</h1>
<form action="login.php" method="POST">
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
    </div>
  </div>
  <div class="form-row mt-1">
    <div class="col-md-4">
      <button type="submit" class="btn btn-primary" id="btn-login">Entrar</button>
    </div>
  </div>
</form>