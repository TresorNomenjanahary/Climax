<?php
  require_once('db.php');
  $upload_dir = 'uploads/';

  function getRegion($conn)
  {
    $requete = "SELECT * FROM region";
    $result = mysqli_query($conn,$requete);
    $tab = array();
    while ($temp = mysqli_fetch_array($result)) 
    {
      $tab[] = $temp;
    }   
    return $tab;
  }
  function slugify($str) {
    // Convert to lowercase and remove whitespace
    $str = strtolower(trim($str));  

    // Replace high ascii characters
    $chars = array("ä", "ö", "ü", "ß");
    $replacements = array("ae", "oe", "ue", "ss");
    $str = str_replace($chars, $replacements, $str);
    $pattern = array("/(é|è|ë|ê)/", "/(ó|ò|ö|ô)/", "/(ú|ù|ü|û)/");
    $replacements = array("e", "o", "u");
    $str = preg_replace($pattern, $replacements, $str);

    // Remove puncuation
    $pattern = array(":", "!", "?", ".", "/", "'");
    $str = str_replace($pattern, "", $str);

    // Hyphenate any non alphanumeric characters
    $pattern = array("/[^a-z0-9-]/", "/-+/");
    $str = preg_replace($pattern, "-", $str);

    return $str;
  }

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from article where id=".$id;
    $result = mysqli_query($conn, $sql);
    $region = getRegion($conn);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

  if(isset($_POST['Submit'])){
    $region = $_POST['region'];
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $auteur = $_POST['auteur'];
    $source = $_POST['source'];
    $date = $_POST['date'];

		/*$name = $_POST['name'];
    $contact = $_POST['contact'];
		$email = $_POST['email'];*/

		$imgName = $_FILES['image']['name'];
		$imgTmp = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];

		if($imgName){

			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');

			$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

			if(in_array($imgExt, $allowExt)){

				if($imgSize < 5000000){
					unlink($upload_dir.$row['image']);
					move_uploaded_file($imgTmp ,$upload_dir.$userPic);
				}else{
					$errorMsg = 'Image too large';
				}
			}else{
				$errorMsg = 'Please select a valid image';
			}
		}else{

			$userPic = $row['image'];
		}

		if(!isset($errorMsg)){
			/*$sql = "update article
									set name = '".$name."',
										contact = '".$contact."',
                    email = '".$email."',
										image = '".$userPic."'
					where id=".$id;*/

      /*$sql = "update article
                  set idRegion = '".$region."',
                    titre = '".$titre."',
                    contenu = '".$contenu."',
                    auteur = '".$auteur."',
                    source = '".$source."',
                    datePublication = '".$date."',
                    photo = '".$imgName."',
                    slug = '".slugify($titre)."' 
          where id=".$id;*/

      $sql = "update article
                set idRegion = '%s', titre = '%s', contenu = '%s', auteur = '%s', source = '%s',
                  datePublication = '%s', photo = '%s', slug = '%s' where id=%s";

      $titres = mysqli_real_escape_string($conn, $titre);
      $contenus = mysqli_real_escape_string($conn, $contenu);
      $auteurs = mysqli_real_escape_string($conn, $auteur);

      $sql=sprintf($sql, $region, $titres, $contenus, $auteurs, $source, $date, $imgName, slugify($titre), $id);

      $result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record updated successfully';
				header('Location:index.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
		}
	}
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
              <div class="card-header">
                Edit
              </div>
              <div class="card-body">
                <form class="" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="region">Region: </label>
                      <select class="form-control" id="region" name="region">
                        <?php for($i=0; $i<count($region); $i++){ ?>
                          <option value=<?=$region[$i]['id']?>><?php echo $region[$i]['nom'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="name">Titre:</label>
                      <input type="text" class="form-control" name="titre"  placeholder="Titre" value="<?php echo $row['titre']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="contact">Contenu:</label>
                      <textarea type="text" class="form-control" name="contenu"><?php echo $row['contenu']; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="email">Auteur:</label>
                      <input type="text" class="form-control" name="auteur" placeholder="Auteur" value="<?php echo $row['auteur']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="email">Source:</label>
                      <input type="text" class="form-control" name="source" placeholder="Source" value="<?php echo $row['source']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="email">Date Publication(YYYY-MM-DD):</label>
                      <input type="date" class="form-control" name="date" placeholder="Date Publication" value="<?php echo $row['datePublication']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="image">Choose Image:</label>
                      <div class="col-md-12">
                        <img src="<?php echo $upload_dir.$row['photo'] ?>" width="100">
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
