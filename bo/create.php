<?php
  include('add.php');
  $region = getRegion($conn);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP CRUD</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="index.php">PHP CRUD WITH IMAGE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt"></i></a></li>
            </ul>
        </div>
      </div>
    </nav>

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">Create</div>
              <div class="card-body">
                <form class="" action="add.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="region">Region: </label>
                      <select class="form-control" id="region" name="region">
                        <?php for($i=0; $i<count($region); $i++){ ?>
                          <option value=<?php echo $region[$i]['id'] ?>><?php echo $region[$i]['nom'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="name">Titre:</label>
                      <input type="text" class="form-control" name="titre"  placeholder="Titre">
                    </div>
                    <div class="form-group">
                      <label for="contact">Contenu:</label>
                      <textarea type="text" class="form-control" name="contenu"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="email">Auteur:</label>
                      <input type="text" class="form-control" name="auteur" placeholder="Auteur">
                    </div>
                    <div class="form-group">
                      <label for="email">Source:</label>
                      <input type="text" class="form-control" name="source" placeholder="Source">
                    </div>
                    <div class="form-group">
                      <label for="email">Date Publication(YYYY-MM-DD):</label>
                      <input type="date" class="form-control" name="date" placeholder="Date Publication">
                    </div>
                    <div class="form-group">
                      <label for="image">Choose Image:</label>
                      <div class="col-md-12">
                        <input type="file" class="form-control" name="image" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" name="Submit" class="btn btn-primary waves">Submit</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    <script src="js/bootstrap.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
  </body>
</html>
