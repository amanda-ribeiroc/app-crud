<?php
    switch (@$_REQUEST["acao"]) {
      case 'cadastrar':
        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, username, password) VALUES ('{$name}', '{$email}', '{$username}', '{$password}')";

        $res = $conn->query($sql);
        if ($res == true) {
            print "<script>alert('Cadastro realizado com sucesso');</script>";
            print "<script>location.href='?page=login';</script>";
        } else {
             print "<script>alert('Não foi possível realizar o cadastro, por favor verifique suas informações');</script>";
             print "<script>location.href='?page=login';</script>";
        }
        break;

    case 'editar':
        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $sql = "UPDATE users SET name = '{$name}', email = '{$email}', username = '{$username}', password = '{$password}' WHERE id = seu_id_de_usuário";

        $res = $conn->query($sql);
        if ($res == true) {
            print "<script>alert('Dados atualizados com sucesso');</script>";
            print "<script>location.href='?page=list-user';</script>";
        } else {
            print "<script>alert('Não foi possível atualizar os dados, por favor verifique suas informações');</script>";
            print "<script>location.href='?page=list-user';</script>";
        }
        break;

    case 'deletar':
        $id = $_POST["id"];

        $sql = "DELETE FROM users WHERE id = $id";

        $res = $conn->query($sql);
        if ($res == true) {
            print "<script>alert('Usuário excluído com sucesso');</script>";
            print "<script>location.href='?page=list-user';</script>";
        } else {
            print "<script>alert('Não foi possível excluir o usuário');</script>";
            print "<script>location.href='?page=list-user';</script>";
        }
        break;
    }
?>