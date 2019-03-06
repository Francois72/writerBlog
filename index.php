<?php
session_start();
//if (isset($_GET['user']))
//{
//setcookie('user', $_GET['Mathieu'], time() + 365*24*3600, null, null, false, true);
//}

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
		require('view/frontend/connexion.php'); // à transformer en fonction et à déplacer dans le frontend: connexion();
	}


	if ($_GET['action'] == 'connexionpost')
	{		
		//début ancien connexion_post.php
		include ("model/Manager.php");
		$db = dbConnect();

		$user = $_POST['user'];
		//echo $_POST['user'];


		//  Récupération de l'utilisateur et de son pass hashé
		$req = $db->prepare('SELECT id, pass, rights FROM users WHERE user = :user');


		$req->execute(array(
		    'user' => $user));
		$resultat = $req->fetch();

		// Comparaison du pass envoyé via le formulaire avec la base
		$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

		if (!$resultat)
		{
		    echo 'Mauvais identifiant ou mot de passe !';
		}
		else
		{
		    if ($isPasswordCorrect) {
		        session_start();
		        $_SESSION['id'] = $resultat['id'];
		        $_SESSION['user'] = $user;
		        echo 'Vous êtes connecté '.$_SESSION['user'].' !';
		        ;
		        echo 'Admin = 1, non admin = 0 : resultat ='.$resultat['rights'];
		        //header('Location: ../../index.php?user='.$user);
		        header('Location: index.php');
		    }
		    else {
		        echo 'Mauvais identifiant ou mot de passe !!';
		    }
		}
		//fin ancien connexion_post.php
	}	

	if ($_GET['action'] == 'deconnexion')
	{	
		// Suppression des variables de session et de la session
		$_SESSION = array();
		session_destroy();

		// Suppression des cookies de connexion automatique
		setcookie('login', '');
		setcookie('pass_hache', '');
		

		header('Location:index.php');
	}






	
	if ($_GET['action'] == 'inscription')//
	{
		require('view/frontend/inscription.php');
	}


	if ($_GET['action'] == 'inscriptionpost')
	{
		
		include ("model/Manager.php");

		$db = dbConnect();

		$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
		$user = $_POST['user'];
		$email = $_POST['email'];




		if (isset($_POST['email']))
		{
		    $_POST['email'] = htmlspecialchars($_POST['email']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer
		    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
		    {
		        echo 'L\'adresse ' . $_POST['email'] . ' est <strong>valide</strong> !';


		        // Insertion
				//$req = $bdd->prepare('INSERT INTO membres (pseudo,email,pass,date_inscription) VALUES(?,?,?,NOW())');
				//$req->execute(array($_POST['pseudo'],$_POST['email'],$pass_hache));

				// Insertion
				$req = $db->prepare('INSERT INTO users(user,pass,email) VALUES(:user, :pass, :email)');
				$req->execute(array('user' => $user, 'pass' => $pass_hache, 'email' => $email));

				session_start();
		        $_SESSION['id'] = $resultat['id'];
		        $_SESSION['user'] = $user;


				// Redirection du visiteur vers la page principale qui sera la page de connexion (ou d'inscription)
				header('Location: index.php');

		    }
		    else
		    {
		        echo 'L\'adresse ' . $_POST['email'] . ' n\'est pas valide, recommencez !';
		    }
		}
		
	}













	
	

	if ($_GET['action'] == 'postcomment')//
	{
		include ("model/Manager.php");//
		$db = dbConnect();//

		include ("model/commentManager.php");//
		$data = postComment($db);//
		header('location:index.php?post='.$_POST['post']);//
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

