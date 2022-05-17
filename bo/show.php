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
    <meta charset="utf-8">
    <title>Climat Planet</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
  </head>
  <body>

      <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
          <a class="navbar-brand" href="index.php">Crud</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto"></ul>

          </div>
        </div>
      </nav>

      <div class="container">
        <div class="row justify-content-center">
          <div class="card">
            <div class="card-header">
              Details de l'Actualité :
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md">
                    <a target="blank" href=<?php echo $upload_dir.$row['photo'] ?>><img src="<?php echo $upload_dir.$row['photo'] ?>" height="400"></a>
                </div>
                <div class="col-md">
                    <h5 class="form-control">
                      <u>Titre:</u>
                      <span><?php echo $row['titre'] ?></span>
                    </i></h5>
                    <h5 class="form-control">
                      <u>Contenu:</u>
                      <span><?php echo $row['contenu'] ?></span>
                    </i></h5>
                    <h5 class="form-control">
                      <u>Auteur:</u>
                      <span><?php echo $row['auteur'] ?></span>
                    </i></h5>
                    <h5 class="form-control">
                      <u>Date Publication:</u>
                      <span><?php echo $row['datePublication'] ?></span>
                    </i></h5>
                    <h5 class="form-control">
                      <span> <a href=<?php echo $row['source'] ?>> Source </a> </span>
                    </i></h5>
                      <a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt"></i><span>Back</span></a>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>


      <script src="js/bootstrap.min.js" charset="utf-8"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
      <script type="text/javascript">
      $(document).ready(function() {
          $('#example').DataTable();
        } );
      </script>
    </body>
  </html>