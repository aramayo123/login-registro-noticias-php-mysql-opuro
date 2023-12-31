<?php 
    include("config.php");
    session_start(); 
    error_reporting(0);
    $id_recuperado = "";
    $user_recuperado = "";
    $email_recuperado = "";
    $rol_recuperado = "";
    $imagen_recuperdo = "";
    if($_SESSION["email"] != "" && $_SESSION["password"] != ""){
        $email_start = $_SESSION["email"];
        $password_start = $_SESSION["password"];
        $sql = "SELECT * FROM users WHERE email='$email_start' AND password='$password_start'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){   
            foreach($result as $i){
                    $id_recuperado = $i['id'];
                    $user_recuperado = $i['username'];
                    $email_recuperado = $i['email'];
                    $rol_recuperado = $i['rol'];
                    $imagen_recuperdo = $i['imagen'];
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi pagina web</title>
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">    
    
</head>
<body>
    <div class="container">
        </br>
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand text-white" href="index.php">Inicio</a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if(isset($_SESSION["email"])){?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="perfil.php">perfil</a>
                        </li>
                    <?php }else{ ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="login.php">login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="register.php">registrarse</a>
                        </li>
                    <?php } ?>
                    <?php if(isset($_SESSION["email"])){?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="publicar.php">publicar</a>
                        </li>
                    <?php } ?>
                    <?php if($rol_recuperado == 1){?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="administrar.php">Administrar</a>
                        </li>
                    <?php } ?>
                    
                    <?php if(isset($_SESSION["email"])){?>
                        <li class="nav-item ">
                            <a class="nav-link text-white" href="logout.php">cerrar session</a>
                        </li>
                    <?php } ?>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>
        </nav>
    
