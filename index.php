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
				throw new Exception('Erreur'); 
			}
		}			
		

		if ($_GET['action'] == 'postcomment')
		{
			postUserComment();
		}

		if ($_GET['action'] == 'admin')
		{
			allersuradmin();
		}


		if ($_GET['action'] == 'addpostview') 
		{
			addpostview();
		}

		
		if ($_GET['action'] == 'addpost') 
		{
			actionpourajouterunpost();
		}





		if (($_GET['action'] == 'deletepost') AND isset(($_GET['post'])))
		{			
			actionpoursupprimerunpost();			
		}






		if (($_GET['action'] == 'editpostview') AND isset(($_GET['post'])))
		{			
			allersuradminpost();
		}


		if (($_GET['action'] == 'editpost') AND isset(($_GET['post'])))
		{
			actionpourediterlepost();
			//echo '450';
			
		}


		if (($_GET['action'] == 'report') AND isset(($_GET['post'])))
		{			
			actionpoursignalerlepost();			
		}


		if ($_GET['action'] == 'listesignalement') 
		{			
			actionpourvoirlessignalements();
		}


		/*
		


		if ($_GET['action'] == 'supprimerpost') 

		if ($_GET['action'] == 'supprimercomment') 
		if ($_GET['action'] == 'ignorercomment') 

		

		*/






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



