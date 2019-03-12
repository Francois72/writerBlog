<?php

function inscriptionpost()
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
			$req = $db->prepare('INSERT INTO users(user,pass,email) VALUES(:user, :pass, :email)');
			$req->execute(array('user' => $user, 'pass' => $pass_hache, 'email' => $email));

			session_start();
	        $_SESSION['id'] = $resultat['id'];
	        $_SESSION['user'] = $user;
	        $_SESSION['rights'] = $resultat['rights'];
			
			echo $_SESSION['user'];
			echo $_SESSION['rights'];
			//header('Location: index.php');

	    }
	    else
	    {
	        echo 'L\'adresse ' . $_POST['email'] . ' n\'est pas valide, recommencez !';
	    }
	}
}


function connexionpost()
{
//début ancien connexion_post.php
	include ("model/Manager.php");
	$db = dbConnect();

	$user = $_POST['user'];	
	
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
	        //if ($resultat['rights'] == '0')
	        //{
	        $_SESSION['id'] = $resultat['id'];		        
	        $_SESSION['user'] = $user;
	        $_SESSION['rights'] = $resultat['rights'];

	        //echo 'Vous êtes connecté '.$_SESSION['user'].' !';	        
	        //echo 'Admin = 1, non admin = 0 : resultat ='.$resultat['rights'];		        
		    header('Location: index.php');
		    //}
		    //else
		    //{
		    //	header('Location: index.php?action=admin_connexion');

		    //}
		}
		else {
		    echo 'Mauvais identifiant ou mot de passe !!';
		}
		    
	}
	
	//fin ancien connexion_post.php
}


function admin_connexionpost()
{
	header('Location: view/frontend/adminListPostsView.php');
}


function deconnexion()
{
	// Suppression des variables de session et de la session
	$_SESSION = array();
	session_destroy();

	// Suppression des cookies de connexion automatique
	setcookie('login', '');
	setcookie('pass_hache', '');
	
	header('Location:index.php');
}


function postcommentf()
{
	include ("model/Manager.php");
	$db = dbConnect();

	include ("model/commentManager.php");
	$data = postComment($db);
	header('location:index.php?post='.$_POST['post']);
}



