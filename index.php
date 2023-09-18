<?php include("nav.php");?>

<?php 
    $consulta = "SELECT * FROM `noticias2`";
    $resultado = mysqli_query($conn,$consulta);

?>
  </br>
  <div class="card">
    <h1 class="text-center">Bienvenido a la pagina de inicio</h1>
  </div>
  </br>
    <?php 
    //foreach($resultado as $j) {
      for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {
        $resultado->data_seek($num_fila);
        $j = $resultado->fetch_assoc();
    ?>  
    <div class="card">
          <!-- Card header START -->
          <div class="card-header border-0 pb-0">
            <div class="d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">
                <!-- Avatar -->
                <div class="avatar avatar-story me-2">
                  <a href="#!"> <img class="avatar-img rounded-circle" src="img/<?php echo $j['imagen'];?>" width="45" height="45"> </a>
                </div>
                <!-- Info -->
                <div>
                  <div class="nav nav-divider">
                    <h6 class="nav-item card-title mb-0"> <a href="#!"> <?php echo $j['autor'];?></a></h6>
                    <span class="nav-item small" style="padding-left: 20px"><?php echo $j['fecha'];?></span>
                    <h5 class="nav-item card-title mb-0 text-center" style="padding-left: 20px"><?php echo $j['titulo'];?></h5>
                  </div>
                  <p class="mb-0 small">Rango: 
                  <?php if($j['rol'] == 1) {
                          echo "Admin";
                        }else{
                          echo "Ninguno";
                        }
                  ;?> </p>
                </div>
              </div>
              <!-- Card feed action dropdown START -->
              <div class="dropdown">
                <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardFeedAction" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-three-dots"></i>
                </a>
                <!-- Card feed action dropdown menu -->
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction">
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a></li>
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-x-circle fa-fw pe-2"></i>Hide post</a></li>
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
                </ul>
              </div>
              <!-- Card feed action dropdown END -->
            </div>
          </div>
          <!-- Card header END -->
          <!-- Card body START -->
          <div class="card-body">
            
            <p style="padding: 20px"><?php echo $j['cuerpo'];?></p>
            <!-- Card img -->
            <?php if($j['imagen_publicacion'] != ""){ ?>
              <img class="card-img" src="noticias/<?php echo $j['imagen_publicacion']; ?>" alt="Post">
            <?php } ?>
            <!-- Feed react START -->
            <ul class="nav nav-stack py-3 small">
              <li class="nav-item">
              <a class="nav-link active" href=""> <i class="bi bi-hand-thumbs-up-fill pe-1"></i>Liked <?php echo $j['likes'];?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
              </li>
              <!-- Card share action START -->
              <li class="nav-item dropdown ms-sm-auto">
                <a class="nav-link mb-0" href="#" id="cardShareAction" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
                </a>
               
              </li>
              <!-- Card share action END -->
            </ul>
            <!-- Feed react END -->

            <!-- Add comment -->
            <div class="d-flex mb-3">
              <!-- Avatar -->
              <div class="avatar avatar-xs me-2">
                <a href="#!"> <img class="avatar-img rounded-circle" src="assets/images/avatar/12.jpg" alt=""> </a>
              </div>
              <!-- Comment box  -->
              <form class="w-100">
                <textarea data-autoresize="" class="form-control pe-4 bg-light" rows="1" placeholder="Add a comment..."></textarea>
              </form>
            </div>
          </div>
          <!-- Card body END -->
        </div>
    </br>
    <?php } ?>
<?php include("pie.php");?>
