<?php
session_start();

/*
if (isset($_COOKIE['user']))
{  	
    echo $_COOKIE['user'];
}
else
{
	echo 'bonjour !! (sans cookie) ';
}
*/


if (isset($_SESSION['rights']))
{  	
	//if (($_SESSION['rights']) == '0') {} else {}
    echo 'bonjour !!! (avec session) ';
    echo $_SESSION['rights'];
}
else
{
	echo 'bonjour !!! (sans session) ';
}


require('controller/frontend.php');

try {


	if (isset($_GET['action']))
	{	
		if ($_GET['action'] == 'connexion')	
		{
			require('view/frontend/connexion.php'); 		
		}


		if ($_GET['action'] == 'connexionpost')
		{
			if ((isset($_POST['user'])) AND (isset($_POST['pass'])))		
			{
				connexionpost();
			}
			else
			{
				throw new Exception('Aucun identifiant ou mot de passe');
			}





		}		

		if ($_GET['action'] == 'deconnexion')
		{
			deconnexion();
		}

		if ($_GET['action'] == 'inscription')//
		{
			require('view/frontend/inscription.php');
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

		if ($_GET['action'] == 'postcomment')//
		{
			postcommentf();
		}

		/*
		if ($_GET['action'] == 'admin_connexion')//
		{
			admin_connexionpost();
		}
		*/

	}

	else
	{
		if (isset($_GET['post'])) 	
		{
			require('view/frontend/comments.php');
		}
		else
		{
			require('view/frontend/listPostsView.php');
		}
	}

	}

catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}



/*
if (isset($_GET['action']))
{
	switch ($_GET['action'])
	{
		case 'connexion':
			require('view/frontend/connexion.php'); 
		break;
		case 'connexionpost':
			connexionpost();
		break;
	}	
}
*/