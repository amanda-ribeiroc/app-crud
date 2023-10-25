<?php

switch ($_REQUEST["acao"]) {
  case 'cadastrar':
    $titulo = $_POST["titulo"];
    $description = $_POST["description"];
    $user_id = $_POST["user_id"];
    $date_create = date("Y-m-d H:i:s");
    $date_updated = date("Y-m-d H:i:s");
    $ativo = $_POST["ativo"];

    $sql = "INSERT INTO projects (titulo, `description`, user_id, date_create, date_updated) VALUES ('{$titulo}', '{$description}', '{$user_id}', '{$date_create}', '{$date_updated}')";
    $res = $conn->query($sql);
    if ($res == true) {
      print "<script>alert('Cadastro realizado com sucesso');</script>";
      print "<script>location.href='?page=project-list'</script>";
    } else {
      print "<script>alert('Não foi possível cadastro o projeto, por favor verifique todas as informações');</script>";
      print "<script>location.href='?page=project-list'</script>";
    }
    break;
  case 'editar':
    $titulo = $_POST["titulo"];
    $description = $_POST["description"];
    $user_id = $_POST["user_id"];
    $date_create = date("Y-m-d H:i:s");
    $date_updated = date("Y-m-d H:i:s");
    $ativo = $_POST["ativo"];

    $sql = "UPDATE projects SET titulo='{$titulo}', `description`='{$description}', user_id= '{$user_id}', date_updated= '{$date_updated}' WHERE id=".$_REQUEST["id"];
    $res = $conn->query($sql);
    if ($res == true) {
      print "<script>alert('Atualizado com sucesso');</script>";
      print "<script>location.href='?page=project-list';</script>";
    } else {
      print "<script>alert('Não foi possível editar o projeto');</script>";
      print "<script>location.href='?page=project-list';</script>";
    }
    break;

  case 'excluir':
    $sql = "DELETE FROM projects WHERE id=".$_REQUEST["id"];
    $res = $conn->query($sql);
    if ($res == true) {
      print "<script>alert('Excluído com sucesso');</script>";
      print "<script>location.href='?page=project-list';</script>";
    } else {
      print "<script>alert('Não foi possível excluir o projeto');</script>";
      print "<script>location.href='?page=project-list';</script>";
    }
    break;
}
