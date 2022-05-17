<?php
    require '../bo/connexion.php';
	function login($email, $pass)
	{
		$requete = sprintf("SELECT * FROM admin WHERE email='%s' AND mdp='%s'", 
					mysqli_real_escape_string(dbconnect(), $email), 
					mysqli_real_escape_string(dbconnect(), $pass));
		$result = mysqli_query(dbconnect(),$requete);
		$tab = array();
		while ($temp = mysqli_fetch_array($result)) 
		{
			$tab[] = $temp;
		}		
		mysqli_free_result($result);
		return $tab;
	}
?>