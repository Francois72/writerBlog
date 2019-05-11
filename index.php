<?php
session_start();
include ("controller/frontend.php");
include ("controller/backend.php");

try {
	//début du getaction
	if (isset($_GET['action']))
	{

		if ($_GET['action'] == 'connexion')
		{

			$frontend = new Frontend();
			$req = $frontend->loginPage();			

			/*
			$frontend = new Frontend();
			$req = $frontend->
			*/

		}

		if ($_GET['action'] == 'connexionpost')
		{

			if ((isset($_POST['user'])) AND (isset($_POST['pass'])))
			{				
				$frontend = new Frontend();
				$req = $frontend->connexion();				
			}
			else
			{
				throw new Exception('Aucunnnn identifiant ou mot de passe');
			}
		}

		if ($_GET['action'] == 'deconnexion')
		{
			$frontend = new Frontend();
			$req = $frontend->deconnexion();
		}

		if ($_GET['action'] == 'inscription')
		{
				$frontend = new Frontend();
				$req = $frontend->registrationPage();
		}

		if ($_GET['action'] == 'inscriptionpost')
		{
			if ((isset($_POST['user'])) AND (isset($_POST['pass'])) AND (isset($_POST['pass2'])) AND (isset($_POST['email'])))
			{
				$frontend = new Frontend();
				$req = $frontend->inscriptionpost();				
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
				$frontend = new Frontend();
				$req = $frontend->getPostCommentsPage();				
			}
			else
			{
				throw new Exception('Erreursss');
			}
		}

		if ($_GET['action'] == 'postcomment')
		{	
			$frontend = new Frontend();
			$req = $frontend->postUserComment();
		}

		if (($_GET['action'] == 'report') AND isset($_GET['postid']) AND isset($_GET['commentid']))
		{					
			$frontend = new Frontend();
			$req = $frontend->reportPostAction($_GET['postid'],$_GET['commentid']);
			
		}




		if ($_GET['action'] == 'admin')
		{
			$backend = new Backend();
			$req = $backend->getAdminPage();			
		}

		if ($_GET['action'] == 'addpostview')
		{
			$backend = new Backend();
			$req = $backend->addpostview();			
		}
		
		if ($_GET['action'] == 'addpost') 
		{
			$backend = new Backend();
			$req = $backend->addPostAction();			
		}

		if (($_GET['action'] == 'deletepost') AND isset(($_GET['post'])))
		{				
			$backend = new Backend();
			$req = $backend->deletePostAction();
		}
		

		if (($_GET['action'] == 'editpostview') AND isset(($_GET['post'])))
		{			
			$backend = new Backend();
			$req = $backend->getEditPostPage();			
		}


		if (($_GET['action'] == 'editpost') AND isset(($_GET['post'])))
		{
			$backend = new Backend();
			$req = $backend->updatePostAction();			
		}



		if (($_GET['action'] == 'ignore') AND isset(($_GET['post'])))
		{	
			$backend = new Backend();
			$req = $backend->ignoreReportAction();			
		}

		if (($_GET['action'] == 'supprimercommentaire') AND isset(($_GET['post'])))
		{			
			$backend = new Backend();
			$req = $backend->deleteReportedComment();
		}

		if ($_GET['action'] == 'listesignalement')
		{			
			$backend = new Backend();
			$req = $backend->getAdminreportListView();			
		}

	}

	else		
	{
		$frontend = new Frontend();
		$req = $frontend->getPostIndex();		
	}
}

catch(Exception $e) 
{ 
    echo 'Erreur : ' . $e->getMessage();
}