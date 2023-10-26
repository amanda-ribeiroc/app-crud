<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- jQuery (Bootstrap depende do jQuery) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXn2x2xg21i5FY5F5f5v5aOJ5E" crossorigin="anonymous">
    </script>

    <!-- Bootstrap JavaScript (incluindo Popper.js para funcionalidade do dropdown) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuF2V4LHtr1tknyLq5r5BkL0WLaUcbz3xMAca4bILylzGPnj8u1FqnFfnJ6y" crossorigin="anonymous">
    </script>

    <!-- biblioteca Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">


    <title>Gerenciador de Projetos</title>
</head>

<body class="bg-dark text-light">
    <div class="container">
        <div class="jumbotron text-center">
            <a href="https://git.io/typing-svg"><img src="https://readme-typing-svg.demolab.com?font=Source+Code+Pro&weight=700&size=32&duration=4000&pause=1000&color=A024F7&random=false&width=500&lines=Gerenciador+de+Projetos" alt="Typing SVG" /></a>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php">
                    <i class="fas fa-home"></i>
                </a>
                <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link text-dark font-weight-bold" href="?page=project-list">HOME<span class="sr-only">(página atual)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PROJETOS</a>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="?page=create-project">Criar novo projeto</a>
                                <a class="dropdown-item" href="?page=project-list">Projetos</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="?page=list-user">Usuários</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark font-weight-bold" href="?page=login" aria-controls="nav-home">ENTRAR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark font-weight-bold" href="?page=new-user">CRIAR CONTA</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                    </form>
                </div>
            </nav>
        </div>
        <?php
        include("config.php");
        switch (@$_REQUEST["page"]) {
            case "login":
                include("pages\users\login.php");
                break;
            case "create-project":
                include("pages\projects\create-new-project.php");
                break;
            case "save-project":
                include("pages\projects\save-project.php");
                break;
            case "edit-project":
                include("pages\projects\atualizar.php");
                break;
            case "delete-project":
                include("pages\projects\delete.php");
                break;
            case "project-list":
                include("pages\projects\project-list.php");
                break;
            case "new-user":
                include("pages\users\create-user.php");
                break;
            case "salve-user":
                include("pages\users\save-user.php");
                break;
            case "list-user":
                include("pages\users\list-user.php");
                break;
            case "logout":
                include("pages\users\logout.php");
                break;
            case "dashboard":
                include("pages\users\dashboard.php");
                break;
            default:
                print " ";
        }
        ?>
    <!-- /.container -->
<!-- /.body -->