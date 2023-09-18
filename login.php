<?php include("nav.php"); ?>
<?php
    include("config.php");
    error_reporting(0);
    //session_start();
    if(isset($_SESSION["email"])){
        header("location: index.php");
    }
    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        // encripto primero para luego comparar
        $password = hash('sha512',$password);
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){   
            foreach($result as $i){
                    $_SESSION["id"] = $i['id'];
                    $_SESSION["email"] = $i['email'];
                    $_SESSION["username"] = $i['username'];
                    $_SESSION["password"] = $i['password'];
                    $_SESSION["rol"] = $i['rol'];
                    $_SESSION["imagen"] = $i['imagen'];
            }
            header("location: index.php");
        }else{
            echo "<script>alert('La contraseña o el usuario son incorrectos.')</script>";
        }
    }
?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                </br>
                <div class="card">
                    <div class="card-header">
                        Iniciar Sesion
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            </br>
                            <h6> Correo: </h6><input class="form-control" type="text" name="email" id="">
                            <h6> Contraseña: </h6><input class="form-control" type="password" name="password" id="">
                            </br>
                            <button class="btn btn-success" name="submit" >Enviar informacion</button>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        Pie de pagina
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div> 
    </div>
<?php include("pie.php");?>
