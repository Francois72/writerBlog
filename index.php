<?php
session_start();
require('controller/frontend.php');

try {
	//début du getaction
	if (isset($_GET['action']))
	{
		if ($_GET['action'] == 'connexion')
		{
			loginPage();
		}

		if ($_GET['action'] == 'connexionpost')
		{

			if ((isset($_POST['user'])) AND (isset($_POST['pass'])))
			{				
				connexionpost();
			}
			else
			{
				throw new Exception('Aucunnnn identifiant ou mot de passe');
			}
		}

		if ($_GET['action'] == 'deconnexion')
		{
			deconnexion();
		}

		if ($_GET['action'] == 'inscription')
		{
			registrationPage();
		}


		if ($_GET['action'] == 'inscriptionpost')
		{
			if ((isset($_POST['user'])) AND (isset($_POST['pass'])) AND (isset($_POST['pass2'])) AND (isset($_POST['email'])))
			{
				inscriptionpost();
			}
			else
			{
				throw new Exception('Aucun identifiant ou mot de passe'); 
			}
		}

		if ($_GET['action'] == 'viewPost') 
		{
			if (isset($_GET['post']))
			{
					commentsf();
			}
			else
			{
				echo 'Erreur ';
			}
		}			
		

		if ($_GET['action'] == 'postcomment')
		{
			postUserComment();
		}
	// fin du if (isset($_GET['action']))	
	}
	else		
	{
		getPostIndex();
	}
}



catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}



