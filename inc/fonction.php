<?php
    require ('bo/connexion.php');

	function getFirst()
	{
		$requete = "SELECT idArticle FROM article ORDER BY date LIMIT 1";
		$result = mysqli_query(dbconnect(),$requete);
		$tab = array();
		while ($temp = mysqli_fetch_array($result)) 
		{
			$tab[] = $temp;
		}		
		return $tab;
	}

	function getData()
	{
		$requete = "SELECT * FROM article_v";
		$result = mysqli_query(dbconnect(),$requete);
		$tab = array();
		while ($temp = mysqli_fetch_array($result)) 
		{
			$tab[] = $temp;
		}		
		return $tab;
	}

	function getRecentData3()
	{
		$requete = "SELECT * FROM article_v ORDER BY date DESC LIMIT 1,2";
		$result = mysqli_query(dbconnect(),$requete);
		$tab = array();
		while ($temp = mysqli_fetch_array($result)) 
		{
			$tab[] = $temp;
		}		
		return $tab;
	}

	function getRecentData()
	{
		$requete = "SELECT * FROM article ORDER BY date LIMIT 3";
		$result = mysqli_query(dbconnect(),$requete);
		$tab = array();
		while ($temp = mysqli_fetch_array($result)) 
		{
			$tab[] = $temp;
		}		
		return $tab;
	}

	function getDataById($id, $url)
	{
		$requete = "SELECT * FROM article_v WHERE id=".$id."";
		$result = mysqli_query(dbconnect(),$requete);
		$tab = array();
		while ($temp = mysqli_fetch_array($result)) 
		{
			$tab[] = $temp;
		}		
		return $tab;
	}

	function getTop3News()
	{
		$requete = "SELECT intitule FROM article ORDER BY date LIMIT 3";
		$result = mysqli_query(dbconnect(),$requete);
		$tab = array();
		while ($temp = mysqli_fetch_array($result)) 
		{
			$tab[] = $temp;
		}		
		return $tab;
	}

    function getDataWPagination($pagination){
		$requete = "SELECT * FROM article_v ORDER BY date LIMIT ".$pagination;
		$result = mysqli_query(dbconnect(),$requete);
		$tab = array();
		while ($temp = mysqli_fetch_array($result)) 
		{
			$tab[] = $temp;
		}		
		return $tab;
	}

	function getCategorie(){
		$requete = "SELECT * FROM Region";
		$result = mysqli_query(dbconnect(),$requete);
		$tab = array();
		while ($temp = mysqli_fetch_array($result)) 
		{
			$tab[] = $temp;
		}		
		return $tab;
	}
?>