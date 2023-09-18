<?php include("nav.php"); ?>
<?php
    include("config.php");
    error_reporting(0);
    //session_start();
    if(isset($_SESSION["email"])){
        header("location: index.php");
    }
?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                </br>
                <div class="card">
                    <div class="card-header">
                        Registrarse
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data" id="formulario">
                            </br>
                            <!-- Grupo: Usuario -->
                            <h6> Usuario: </h6>
                            <input class="form-control" type="text" name="username" id="username" value="">
                            <p class="formulario__input-error" id="p1">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
                            <h6> Nombre: </h6>
                            <input class="form-control" type="text" name="nombre" id="nombre" >
                            <p class="formulario__input-error" id="p2">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
                            <h6> Email: </h6>
                            <input class="form-control" type="text" name="email" id="email" >
                            <p class="formulario__input-error" id="p3">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
                            <h6> Contraseña: </h6>
                            <input class="form-control" type="password" name="password" id="password">
                            <p class="formulario__input-error" id="p4">La contraseña tiene que ser de 4 a 12 dígitos.</p>
                            <h6> Confirmar Contraseña: </h6>
                            <input class="form-control" type="password" name="cpassword" id="cpassword">
                            <p class="formulario__input-error" id="p5">Ambas contraseñas deben ser iguales.</p>
                            <h6> Imagen de perfil: </h6><input required type="file" class="form-control" name="imagen" id="">
                            </br>
                            <button class="btn btn-success" name="submit" >Enviar informacion</button>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        Pie de pagina
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div> 
    </div>
<script>
    const usuario = /^[a-zA-Z0-9\_\-]{4,16}$/ // Letras, numeros, guion y guion_bajo
    const nombre = /^[a-zA-ZÀ-ÿ\s]{1,40}$/ // Letras y espacios, pueden llevar acentos.
    const contrasenia = /^.{4,12}$/ // 4 a 12 digitos.
    const correo = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/
    const telefono = /^\d{7,14}$/ // 7 a 14 numeros.

    const username = document.getElementById("username");
    const name = document.getElementById("nombre");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const cpassword = document.getElementById("cpassword");
    const arregloinputs = [{username},{name},{email},{password},{cpassword}];

    for (let index = 0; index < arregloinputs.length; index++) {
        switch(index){
            case 0: {
                arregloinputs[index].username.addEventListener('keyup',() =>{
                    if(usuario.test(arregloinputs[index]['username']['value'])){
                        document.getElementById('username').classList.remove('incorrecto');
                        document.getElementById('username').classList.add('correcto');
                        document.getElementById('p1').classList.remove('formulario__input-error-activo');     
                        document.getElementById('p1').classList.add('formulario__input-error');   
                    }else{
                        document.getElementById('username').classList.add('incorrecto');
                        document.getElementById('username').classList.remove('correcto');  
                        document.getElementById('p1').classList.remove('formulario__input-error');
                        document.getElementById('p1').classList.add('formulario__input-error-activo');
                    }
                })
            }
            break;
            case 1: {
                arregloinputs[index].name.addEventListener('keyup',() =>{
                    if(nombre.test(arregloinputs[index]['name']['value'])){
                        document.getElementById('nombre').classList.remove('incorrecto');
                        document.getElementById('nombre').classList.add('correcto');
                        document.getElementById('p2').classList.remove('formulario__input-error-activo');     
                        document.getElementById('p2').classList.add('formulario__input-error');   
                    }else{
                        document.getElementById('nombre').classList.add('incorrecto');
                        document.getElementById('nombre').classList.remove('correcto');  
                        document.getElementById('p2').classList.remove('formulario__input-error');
                        document.getElementById('p2').classList.add('formulario__input-error-activo');
                    }
                })
            }
            break;
            case 2: {
                arregloinputs[index].email.addEventListener('keyup',() =>{
                    if(correo.test(arregloinputs[index]['email']['value'])){
                        document.getElementById('email').classList.remove('incorrecto');
                        document.getElementById('email').classList.add('correcto');
                        document.getElementById('p3').classList.remove('formulario__input-error-activo');     
                        document.getElementById('p3').classList.add('formulario__input-error');   
                    }else{
                        document.getElementById('email').classList.add('incorrecto');
                        document.getElementById('email').classList.remove('correcto');  
                        document.getElementById('p3').classList.remove('formulario__input-error');
                        document.getElementById('p3').classList.add('formulario__input-error-activo');
                    }
                })
            }
            break;
            case 3: {
                arregloinputs[index].password.addEventListener('keyup',() =>{
                    if(contrasenia.test(arregloinputs[index]['password']['value'])){
                        document.getElementById('password').classList.remove('incorrecto');
                        document.getElementById('password').classList.add('correcto');
                        document.getElementById('p4').classList.remove('formulario__input-error-activo');     
                        document.getElementById('p4').classList.add('formulario__input-error');   
                    }else{
                        document.getElementById('password').classList.add('incorrecto');
                        document.getElementById('password').classList.remove('correcto');  
                        document.getElementById('p4').classList.remove('formulario__input-error');
                        document.getElementById('p4').classList.add('formulario__input-error-activo');
                    }
                })
            }
            break;
            case 4: {
                arregloinputs[index].cpassword.addEventListener('keyup',() =>{
                    if(contrasenia.test(arregloinputs[index]['cpassword']['value'])){
                        document.getElementById('cpassword').classList.remove('incorrecto');
                        document.getElementById('cpassword').classList.add('correcto');
                        document.getElementById('p5').classList.remove('formulario__input-error-activo');     
                        document.getElementById('p5').classList.add('formulario__input-error');   
                    }else{
                        document.getElementById('cpassword').classList.add('incorrecto');
                        document.getElementById('cpassword').classList.remove('correcto');  
                        document.getElementById('p5').classList.remove('formulario__input-error');
                        document.getElementById('p5').classList.add('formulario__input-error-activo');
                    }
                })
            }
            break;
        }
    }
</script>   
<?php
    if(isset($_POST["submit"])){
        //echo "<script>alert('recibido pa.')</script>";
        $username=$_POST["username"];
        $nombre=$_POST["nombre"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $cpassword=$_POST["cpassword"];
        if($username != "" && $nombre != "" && $email != "" && $password != "" && $cpassword != ""){
            $fecha = new DateTime(); // con esto evitamos que se sobreescriban archivos con el mismo nombre
            /* nombre del archivo con su extension */
            $imagen = $fecha->getTimestamp()."_".$_FILES['imagen']['name'];
            $imagen_temporal = $_FILES['imagen']['tmp_name'];
            date_default_timezone_set('America/Argentina/Salta');    
            $DateAndTime = date('m-d-Y h:i:s a', time());  
            if($password == $cpassword){
                //echo "<script>alert('Contraseñas iguales pa.')</script>";
                // con esto encriptamos
                $password = hash('sha512',$password);
                $sql="SELECT * FROM users WHERE email='$email'";
                /* seleccionamos la tabla users donde el email de la base de datos sea igual a la variable $email
                que es la que ingresa la persona por el form */
                $result=mysqli_query($conn,$sql);
                if(!$result->num_rows>0){ // aca preguntamos si es que NO EXISTE una fila de la base que coincida con ese email
                    /* seleccionamos la tabla users donde el username de la base de datos sea igual a la variable $username
                    que es la que ingresa la persona por el form*/
                    //echo "<script>alert('no se encontro correo con ese correo, Perfecto.')</script>";
                    $sql="SELECT * FROM users WHERE username='$username'";
                    $result=mysqli_query($conn,$sql);
                    if(!$result->num_rows>0){// aca preguntamos si es que NO EXISTE una fila de la base que coincida con ese user
                        //echo "<script>alert('no se encontro user con ese user, Perfecto.')</script>";
                        $sql="INSERT INTO users (nombre,username,email,password,rol,imagen,fecha) VALUES ('$nombre','$username','$email','$password',0,'$imagen','$DateAndTime')";
                        $result=mysqli_query($conn,$sql);
                        if($result){
                            /* una vez se haya registrado exitosamente subimos la imagen*/ 
                            move_uploaded_file($imagen_temporal,"img/".$imagen);
                            echo"<script>alert('Usuario registrado con éxito')</script>";
                            echo "<script> setTimeout(\"location.href='index.php'\",100);</script>";
                            $username="";
                            $email="";
                            $_POST["password"]="";
                            $_POST["cpassword"]="";
                            $_POST["username"]="";
                            $_POST["nombre"]="";
                            $_POST["email"]="";
                        }else{
                            echo "<script>alert('Hay un error en la consulta.')</script>";
                        }        
                    }else{
                        echo "<script>alert('El usuario ya existe.')</script>";
                    }    
                }else{
                    echo "<script>alert('El correo ya existe.')</script>";
                }
            }else{
                echo "<script>alert('Las contraseñas no coinciden.')</script>";
            }
        }else{
            echo "<script> alert('por favor rellena todos los campos.')</script>";
        }
    }
?>

<?php include("pie.php");?>
