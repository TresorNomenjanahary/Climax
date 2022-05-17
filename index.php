<?php
    require ('./inc/fonction.php');
    $data = getData();
    $top3news = getTop3News();
    $recentData = getRecentData();
    
?>
<!DOCTYPE html>
<html lang="fr">
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
                         <li><a href="php/actus.php" class="smoothScroll">Actualités</a></li>
                         <li><a href="php/login.php" class="smoothScroll">Se connecter</a></li>
                    </ul>
               </div>

          </div>
     </section>

     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="row">
               <div class="owl-carousel owl-theme">
                    <div class="item item-first">
                         <div class="caption">
                              <div class="container">
                              <?php for($i=0; $i<count($top3news); $i++){ ?>
                                   <div class="col-md-8 col-sm-12">
                                        <h3><?php echo $top3news[$i]['intitule'];?></h3>
                                        <h1><?php echo $top3news[$i]['description'];?></h1>
                                   </div>
                                   <?php }?>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>

     <section id="about" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
                         <div class="about-info">
                              <div class="section-title wow fadeInUp" data-wow-delay="0.2s">
                                   <h4>Le Rechauffement climatique</h4>
                                   <h2>La température moyenne globale de la planète a augmenté de 1.1°C entre 1850 et 2017. Parallèlement, la France a subi une augmentation moyenne de 1.5°C depuis 1900</h2>
                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.4s">
                                   <p>Le changement climatique est variable selon les régions. Par exemple, les zones polaires se réchauffent deux fois plus rapidement que le reste du monde. En continuant sur la trajectoire actuelle de réchauffement climatique, la banquise arctique pourrait disparaître totalement d’ici quelques dizaines d’années.</p>
                                   <p>Par exemple, une période de froid intense dans une région donnée ne remet pas en cause le réchauffement climatique. Pour l'affirmer, il faut être en mesure d'observer l’augmentation d’un évènement climatique (hausse de la température moyenne de la Terre, fortes précipitations, sécheresses intenses, etc.) de façon régulière et significative, sur une longue durée et dans une région précise. </p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="wow fadeInUp about-image" data-wow-delay="0.6s">
                              <img src="images/effet.jpeg" class="img-responsive" alt="">
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>


     <!-- TEAM -->
     <section id="team" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Les actualités</h2>
                              <h4>Climat Planet est une organisation indépendante des Etats, des pouvoirs politiques et économiques.</h4>
                         </div>
                    </div>
                    <?php for($i=0; $i<count($recentData); $i++){ ?>                                      
                    <div class="col-md-4 col-sm-4">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                              <img src="images/"<?= $recentData[$i]['image'];?> class="img-responsive" alt="">
                                   <div class="team-hover">
                                        <div class="team-item">
                                             <h4><a href=<?=$recentData[$i]['intitule'] .$recentData[$i]['intitule']?>></a></h4> 
                                        </div>
                                   </div>
                         </div>
                         <div class="team-info">
                              <h3><?=$recentData[$i]['intitule']?></h3>
                              <p><?=$recentData[$i]['date']?></p>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                              <img src="images/"<?=$recentData[$i]['image']?> class="img-responsive" alt="">
                                   <div class="team-hover">
                                        <div class="team-item">
                                             <h4><a href=<?=$recentData[$i]['idArticle'] .$recentData[$i]['intitule']?>></a></h4>
                                        </div>
                                   </div>
                         </div>
                         <div class="team-info">
                              <h3><?=$recentData[$i]['intitule']?></h3>
                              <p><?=$recentData[$i]['date']?></p>
                         </div>
                    </div>
                    <?php }?>
               </div>
          </div>
     </section>
     <section id="testimonial" data-stellar-background-ratio="0.5">
          <div class="overlay"></div>
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Retours / Témoignage</h2>
                         </div>
                    </div>  

                    <div class="col-md-offset-2 col-md-8 col-sm-12">
                         <div class="owl-carousel owl-theme">
                              <div class="item">
                                   <p>Il faut sortir des énergies fossiles. Dans cette perspective, Greenpeace s’oppose à tout nouveau projet climaticide, qu’il s’agisse d’ouvrir une nouvelle centrale à charbon ou d'entreprendre un nouveau forage pétrolier.</p>
                                        <div class="tst-author">
                                             <h4>Greenpeace</h4>
                                             <span>Site internet </span>
                                        </div>
                              </div>

                              <div class="item">
                                   <p>Sécheresse et montées des eaux entraînent des flux migratoires incontrôlés et des urgences humanitaires. Certaines îles du Pacifique commencent à disparaître, et les nations occidentales, jusqu’à présent épargnées, commencent à être exposées</p>
                                        <div class="tst-author">
                                             <h4>Greenpeace</h4>
                                             <span>Site Internet</span>
                                        </div>
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </section>

     <!-- FOOTER -->
     <footer id="footer" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-3 col-sm-8">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2 class="wow fadeInUp" data-wow-delay="0.2s">Trouvez-nous</h2>
                              </div>
                              <address class="wow fadeInUp" data-wow-delay="0.4s">
                                   <p>101 Antananarivo, Andoharanofotsy Mandrimena<br>IT University<br>Route RN7 vers Antsirabe</p>
                              </address>
                         </div>
                    </div>

                    <div class="col-md-2 col-sm-4">
                         <ul class="wow fadeInUp social-icon" data-wow-delay="0.4s">
                              <li><a href="www.facebook.fr" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                              <li><a href="www.twitter.com" class="fa fa-twitter"></a></li>
                              <li><a href="www.instagram.com" class="fa fa-instagram"></a></li>
                              <li><a href="www.google.fr" class="fa fa-google"></a></li>
                         </ul>

                         <div class="wow fadeInUp copyright-text" data-wow-delay="0.8s"> 
                              <p><br>Copyright &copy; 2022 <br>Climat Planet 
                         </div>
                    </div>
                    
               </div>
          </div>
     </footer>


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