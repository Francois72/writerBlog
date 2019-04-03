<?php
include ("model/Manager.php");

function loginPage()
{
	require('view/frontend/connexion.php');
}

function connexionpost()
{	
	$req = userConnect($_POST['user']);
	$resultat = $req->fetch();
	// Comparaison du pass envoyé via le formulaire avec la base
	$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);	
	if (!$resultat)
	{
	    echo 'Mauvvvvvvvvais identifiant ou mot de passe !';
	}
	else
	{
	    if ($isPasswordCorrect) 
	    {	
	    	session_start(); 		        
	        $_SESSION['id'] = $resultat['id'];
	        $_SESSION['user'] = $_POST['user'];
	        $_SESSION['rights'] = $resultat['rights'];
		    header('Location: index.php');
		}
		else
		{
		    echo 'Mauvais identifiant ou moooooooot de passe !!';
		}
	}	
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

function registrationPage()
{
	require('view/frontend/inscription.php');
}


function inscriptionpost()
{

	if ($_POST['pass'] == $_POST['pass2'])
	{
		$_POST['email'] = htmlspecialchars($_POST['email']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer
		if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
		{

		    echo 'L\'adresse ' . $_POST['email'] . ' est <strong>valide</strong> !';
			// Insertion
			
			$user = $_POST['user'];
			$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);			
			$email = $_POST['email'];

			insertUser($user,$pass_hache,$email);

			
			$req = userConnect($user);
			$resultat = $req->fetch();

			session_start();
			$_SESSION['id'] = $resultat['id'];		        
			$_SESSION['user'] = $user;
			$_SESSION['rights'] = $resultat['rights'];
			header('Location: index.php');			
	    }
	    else
	    {
	        echo 'L\'adresse ' . $_POST['email'] . ' n\'est pas valide, recommencez !';
	    }
    }
    else
    {
    	echo 'Les deux mots de passe ne correspondent pas.';
    }
}

function postUserComment()
{
	$data = postComment();
	header('location:index.php?action=viewPost&post='.$_POST['post']);
	//header('location:index.php?post='.$_POST['post']);
}


function getPostIndex()
{
	$post = getPosts();
	require('view/frontend/listPostsView.php');
}


function commentsf()
{
	$post = getPost(); 
	require('view/frontend/comments.php');
}






















///////////////


















//A dépalcer ou supprimer


















function admin_connexionpost()
{
	header('Location: view/frontend/adminListPostsView.php');
}









function editPostf()
{
	//include ("model/Manager.php");
	//$db = dbConnect();

	//include ("model/postManager.php");
	$data = editPost($db);
	header('location:index.php?post='.$_POST['post']);
}



//utilisation de require plutôt que de header????


function adminEditPostf()
{
	require('view/frontend/adminEditPost.php');
}


/*
function nomprovisoire()
{	
	nomprovisoiref();
	

}


function insert()
{
	
	insertM($db);
}
*/


