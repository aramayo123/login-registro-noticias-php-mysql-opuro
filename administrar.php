<?php include("nav.php"); ?>
<?php
    $consulta = "SELECT * FROM `users`";
    $resultado = mysqli_query($conn,$consulta);
    $usuarios_registrados = $resultado->num_rows;

?>
    </br>
    <div class="card">
        <h1 class="text-center">Bienvenido al panel de administracion  <?php echo $user_recuperado;?></h1>
        <h1 class="text-center">Usuarios registrados: <?php echo $usuarios_registrados;?></h1>
    </div>
    </br>
    <div class="card">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Imagen de perfil</th>
                            <th>Fecha de registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {
                            $resultado->data_seek($num_fila);
                            $j = $resultado->fetch_assoc();
                        ?>
                        <tr>
                            <td><?php echo $j['id'];?></td>
                            <td><?php echo $j['username'];?></td>
                            <td><?php echo $j['email'];?></td>
                            <td>
                                <?php 
                                    if ($j['rol'] == 1) echo "admin";
                                    else echo "ninguno";
                                ?>
                            </td>
                            <td>    
                                <div class="avatar avatar-story me-2">
                                    <img class="avatar-img rounded-circle" src="img/<?php echo $j['imagen'];?>" width="45" height="45">
                                </div>
                            </td>
                            <td>    
                                <?php echo $j['fecha'];?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include("pie.php"); ?>