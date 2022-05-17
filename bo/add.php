<?php
	require_once('db.php');
	$upload_dir = 'uploads/';
	function getRegion($conn)
	{
		$requete = "SELECT * FROM Region";
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

  if (isset($_POST['Submit'])) {
  	$region = $_POST['region'];
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $date = $_POST['date'];

    /*$name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];*/

    $imgName = $_FILES['image']['name'];
		$imgTmp = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];

    /*if(empty($name)){
			$errorMsg = 'Please input name';
		}elseif(empty($contact)){
			$errorMsg = 'Please input contact';
		}elseif(empty($email)){
			$errorMsg = 'Please input email';
		}else{*/

			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');

			$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

			if(in_array($imgExt, $allowExt)){

				if($imgSize < 5000000){
					//move_uploaded_file($imgTmp ,$upload_dir.$userPic);
				}else{
					$errorMsg = 'Image trop grand';
				}
			}else{
				$errorMsg = 'Choisissez une image valide';
			}
		/*}*/

		if(!isset($errorMsg)){
			$titres = mysqli_real_escape_string($conn, $titre);
			$contenus = mysqli_real_escape_string($conn, $contenu);
			$auteurs = mysqli_real_escape_string($conn, $auteur);
			$sql = "insert into article(idArticle, intitule, description, date,image)
					values('%s', '%s', '%s', '%s', '%s')";
			$sql = sprintf($sql,$titres,$contenus,$date,$userPic);

			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'Vous avez ajouter une nouvelle actualité';
				header('Location: index.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
		}
  }
?>
