<?php include("nav.php");?>
<?php
    //session_start();
    if(!isset($_SESSION["email"])){
        header("location: login.php");
        echo "<script>alert('debes logearte para poder estar en este sector.')</script>";
        session_destroy();
    }
    if($rol_recuperado != 1){
        echo "<script>alert('este sector es solo para admins.')</script>";
        header("location: index.php");
    }
    $id = $_GET['id'];
    $noticia = "SELECT * FROM noticias2 WHERE id='$id'";
    $resultado = mysqli_query($conn,$noticia);
    $row = mysqli_fetch_array($resultado);
    
    /* INSERTAR / ACTUALIZAR */
    if($_POST){
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $cuerpo = $_POST['cuerpo'];
        $actualizar = "UPDATE `noticias2` SET titulo='$titulo',cuerpo='$cuerpo' WHERE id='$id'";
        $result2=mysqli_query($conn,$actualizar);
        if($result2){
            echo"<script>alert('Noticia Modificada con exito.')</script>";
            header("location: index.php");
        }else{
            echo"<script>alert('Hubo un error.')</script>";
        }
    }
?>
    </br>
    <div class="card">
        <h1>Bienvenido al panel de administracion <?php echo $user_recuperado;?></h1>
    </div>
    </br>
    <div class="row">
        <div class="col-md-5">
            </br>
            <div class="card">
                <div class="card-header">
                        Datos de la noticia a editar:
                </div>
                <div class="card-body">
                    <form action="editar.php" method="post">
                        <h4>Titulo de la noticia: </h4>
                        <input required type="text" class="form-control" name="titulo" id="" value="<?php echo $row['titulo'];?>">
                        <h4>Cuerpo de la noticia: </h4>
                        <input required class="form-control" type="text" name="cuerpo" value="<?php echo $row['cuerpo'];?>">
                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                        </br>
                        <input type="submit" class="btn btn-success" value="Actualizar">
                        
                    </form>
                </div>
                <div class="card-footer text-muted">
                    Footer
                </div>
            </div>
        </div>
<?php include("pie.php");?>