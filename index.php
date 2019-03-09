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

if (isset($_SESSION['user']))
{  	
    echo $_SESSION['user'];
}
else
{
	echo 'bonjour !!! (sans session) ';
}


require('controller/frontend.php');


if (isset($_GET['action']))
{
	if ($_GET['action'] == 'connexion')	
	{
		require('view/frontend/connexion.php'); 		
	}

	if ($_GET['action'] == 'connexionpost')
	{		
		connexionpost();
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
		inscriptionpost();				
	}	

	if ($_GET['action'] == 'postcomment')//
	{
		postcommentf();
	}

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