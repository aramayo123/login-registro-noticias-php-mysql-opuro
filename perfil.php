<?php include("nav.php");?>
<?php
    include("config.php");
    //session_start();
    if(!isset($_SESSION["email"])){
        echo "<script>alert('debes logearte para poder estar en este sector.')</script>";
        echo "<script> setTimeout(\"location.href='login.php'\",100);</script>";
        session_destroy();
    }
?>
    </br>
    <div class="card">
        <h1 class="text-center">Bienvenido a tu perfil  <?php echo $user_recuperado;?></h1>
    </div>
    </br>
    <div class="card mb-4" >
        <div class="row g-0">
            <div class="col-md-4">
                <div class="avatar avatar-story me-2">
                    <img src="img/<?php echo $imagen_recuperdo;?>" class="avatar-img rounded-circle" width="200" height="200">
                </div>
            <h5>Tu rool es: 
                <?php 
                if($rol_recuperado == 1){
                    echo "Admin";
                }else{
                    echo "Ninguno";
                }
                ?>
            </h5>    
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Tus datos son:</h5>
                <p class="card-text"><?php echo "Correo: ".$email_recuperado;?></p>
                <p class="card-text"><?php echo "Usuario: ".$user_recuperado;?></p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
            </div>
        </div>
    </div>
<?php include("pie.php");?>
