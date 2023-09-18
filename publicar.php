<?php include("nav.php");?>
<?php
    //session_start();
    if(!isset($_SESSION["email"])){
        header("location: login.php");
        echo "<script>alert('debes logearte para poder estar en este sector.')</script>";
        session_destroy();
    }
    /*
    if($rol_recuperado != 1){
        echo "<script>alert('este sector es solo para admins.')</script>";
        header("location: index.php");
    }
    */
    /* INSERTAR / ACTUALIZAR */
    if($_POST){
        $titulo = $_POST['titulo'];
        $cuerpo = $_POST['cuerpo'];
        $autor = $_SESSION["username"]; // nombre del autor
        $imagen = $_SESSION["imagen"]; // imagen del autor
        $rol = $_SESSION["rol"];
        $fecha = new DateTime(); // con esto evitamos que se sobreescriban archivos con el mismo nombre
        
        $imagen_publicacion = $fecha->getTimestamp()."_".$_FILES['imagen_publicacion']['name']; // imagen de la noticia
        $imagen_publicacion_temporal = $_FILES['imagen_publicacion']['tmp_name'];
        $likes = 0;
        date_default_timezone_set('America/Argentina/Salta');    
        $DateAndTime = date('m-d-Y h:i:s a', time());  
        $sql="INSERT INTO noticias2 (titulo,cuerpo,autor,rol,imagen,imagen_publicacion,likes,fecha) VALUES ('$titulo','$cuerpo','$autor','$rol','$imagen', '$imagen_publicacion','$likes','$DateAndTime')";
        $result=mysqli_query($conn,$sql);
        if($result){
            move_uploaded_file($imagen_publicacion_temporal,"noticias/".$imagen_publicacion);
            echo"<script>alert('Noticia publicada con exito.')</script>";
        }else{
            echo"<script>alert('La noticia no se publico.')</script>";
        }
    }
    if($_GET){
        $imagen_eliminar = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM noticias2 WHERE id=".$_GET['borrar']));
        $sql2 = "DELETE FROM `noticias2` WHERE `noticias2`.`id` =".$_GET['borrar'];
        $resultado_eliminar = mysqli_query($conn,$sql2);
        
        if($resultado_eliminar){
            echo"<script>alert('Noticia eliminada con exito.')</script>";
            unlink("noticias/".$imagen_eliminar['imagen_publicacion']);
            header("location: publicar.php");
            //echo "<script> setTimeout(\"location.href='panel.php'\",100);</script>";
        }
    }
    $consulta = "SELECT * FROM `noticias2`";
    $resultado = mysqli_query($conn,$consulta);
?>
    </br>
    <div class="card">
        <h1 class="text-center">Bienvenido <?php echo $user_recuperado;?></h1>
        <h1 class="text-center">
                                    <?php if ($rol_recuperado == 1){
                                            echo "Usted es Admin";
                                    }?>
        </h1>
    </div>
    </br>
    <div class="card">
        <div class="row">
            <div class="col-md-5">
                </br>
                <div class="card">
                    <div class="card-header">
                            Datos de la noticia
                    </div>
                    <div class="card-body">
                        <form action="publicar.php" method="post" enctype="multipart/form-data">
                            <h4>Titulo de la noticia: </h4>
                            <input required type="text" class="form-control" name="titulo" id="">
                            <h4>Cuerpo de la noticia: </h4>
                            <textarea required class="form-control" type="text" name="cuerpo" id="" rows="3"></textarea>
                            <h6> Imagen de la noticia: </h6><input required type="file" class="form-control" name="imagen_publicacion" accept="image/png, image/jpeg">
                            </br>
                            <input type="submit" class="btn btn-success" value="Enviar Proyecto">
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        Footer
                    </div>
                </div>
            </div>
            <?php if($rol_recuperado == 1){ ?>
            <div class="col-md-7">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Eliminar</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($resultado as $j) {?>
                        <tr>
                            <td><?php echo $j['id'];?></td>
                            <td><?php echo $j['titulo'];?></td>
                            <td><?php echo $j['autor'];?></td>
                            <td><a name="" id="" class="btn btn-danger" href="?borrar=<?php echo $j['id'];?>">Eliminar</a></td>
                            <td><a name="" id="" class="btn btn-danger" href="editar.php?id=<?php echo $j['id'];?>">Editar</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php } ?>
        </div>
    </div>
    </br>
<?php include("pie.php");?>
