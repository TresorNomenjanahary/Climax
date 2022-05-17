<?php
  require_once('db.php');
  $upload_dir = 'uploads/';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from Article where idArticle=".$id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Données introuvable';
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Climat Planet</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/templatemo-style.css">
  </head>
  <body>
     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="index.php" class="navbar-brand">Climat<span> - </span>Planet</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="index.php" class="smoothScroll">Accueil</a></li>
                         <li><a href="show.php" class="smoothScroll">Liste Actualités</a></li>
                    </ul>
               </div>

          </div>
     </section>

      <div class="container">
        <div class="row justify-content-center">
          <div class="card">
            <div class="card-header">
              Details de l'Actualité :
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md">
                    <a target="blank" href=<?php echo $upload_dir.$row['image'] ?>><img src="<?php echo $upload_dir.$row['image'] ?>" height="400"></a>
                </div>
                <div class="col-md">
                    <h5 class="form-control">
                      <u>Titre:</u>
                      <span><?php echo $row['intitule'] ?></span>
                    </i></h5>
                    <h5 class="form-control">
                      <u>Contenu:</u>
                      <span><?php echo $row['description'] ?></span>
                    </i></h5>
                    <h5 class="form-control">
                      <u>Date de Publication:</u>
                      <span><?php echo $row['date'] ?></span>
                    </i></h5>
                      <a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt"></i><span>Retour</span></a>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- SCRIPTS -->
      <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/jquery.magnific-popup.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>
    </body>
  </html>