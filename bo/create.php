<?php
  include('add.php');
  $region = getRegion($conn);
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
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">Ajouter un article </div>
              <div class="card-body">
                <form class="" action="add.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="region">Region: </label>
                      <select class="form-control" id="region" name="region">
                        <?php for($i=0; $i<count($region); $i++){ ?>
                          <option value=<?php echo $region[$i]['idRegion'] ?>><?php echo $region[$i]['nom'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="name">Titre:</label>
                      <input type="text" class="form-control" name="intitule"  placeholder="Titre">
                    </div>
                    <div class="form-group">
                      <label for="contact">Contenu:</label>
                      <textarea type="text" class="form-control" name="description"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="email">Date Publication(YYYY-MM-DD):</label>
                      <input type="date" class="form-control" name="date" placeholder="Date de Publication">
                    </div>
                    <div class="form-group">
                      <label for="image">Choisissez une Image:</label>
                      <div class="col-md-12">
                        <input type="file" class="form-control" name="image" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" name="Submit" class="btn btn-primary waves">Valider</button>
                    </div>
                </form>
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
