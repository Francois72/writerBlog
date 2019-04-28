<?php
include ("model/commentManager.php");
include ("model/postManager.php");
include ("model/userManager.php");

function loginPage()
{
	require('view/frontend/connexion.php');
}

function connexionpost()
{
	$userManager = new UserManager();//création de l'objet
	$req = $userManager->userConnect($_POST['user']);

	
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


			$UserManager = new UserManager();
			$UserManager->insertUser($user,$pass_hache,$email);
			
			$userManager = new UserManager();//création de l'objet
			$req = $userManager->userConnect($user);			
			$resultat = $req->fetch();

			session_start();
			$_SESSION['id'] = $resultat['id'];		        
			$_SESSION['user'] = $user;
			$_SESSION['rights'] = $resultat['rights'];
			header('Location: index.php');			
	    }
	    else
	    {
	    	throw new Exception('L\'adresse ' . $_POST['email'] . ' n\'est pas valide, recommencez !');	       
	    }
    }
    else
    {
    	throw new Exception('Les deux mots de passe ne correspondent pas');
    }
}

function postUserComment()
{
	$commentsManager = new CommentsManager();
	$data = $commentsManager-> postComment();	
	header('location:index.php?action=viewPost&post='.$_POST['post']);	
}

function getPostIndex()
{
	$PostManager = new PostManager();
	$post = $PostManager-> getPosts();	
	require('view/frontend/listPostsView.php');
}

function commentsf()
{
	$PostManager = new PostManager();
	$post = $PostManager-> getPost();
	$CommentsManager = new CommentsManager();
	$comments = $CommentsManager -> getComments();
	require('view/frontend/comments.php');
}

function allersuradmin()
{
	$PostManager = new PostManager();
	$post = $PostManager-> getPosts2();
	require('view/frontend/adminListPostsView.php');
}


function allersuradminpost()
{
	$PostManager = new PostManager();
	$post = $PostManager-> getPost();

	//$data = $post->fetch();
	//echo 'content: '.$data['content'];

	require('view/frontend/adminEditPost.php');

}



function addpostview()
{
	require('view/frontend/adminAddPost.php');
}



function actionpourajouterunpost()
{
	$postManager = new PostManager();
	$post = $postManager-> addPost();	
	header('location:index.php?action=admin');	
}


function actionpoursupprimerunpost()
{
	$postManager = new PostManager();
	$post = $postManager-> deletePost();	
	header('location:index.php?action=admin');	
}

function actionpourediterlepost()
{	
	$title = $_POST['title'];
	$content = $_POST['content'];	
	
	$PostManager = new PostManager();
	$post = $PostManager-> editPost($title,$content);	
	header('location:index.php?action=admin');	

}


function actionpoursignalerlepost($idpost,$commentid)
{
	$CommentManager = new CommentsManager();
	$post = $CommentManager-> reportComment($commentid);
	//require('index.php?action=viewPost&post='.$_SESSION['post']);
	header('location:index.php?action=viewPost&post='.$idpost);
}

/// en travaux  ///
function ignorerunsignalement()
{
	$CommentManager = new CommentsManager();
	$post = $CommentManager-> ignoreComment();
	header('location:index.php?action=listesignalement');
}
///////


function actionpoursupprimeruncommentairesignale()
{
	$CommentManager = new CommentsManager();
	$post = $CommentManager-> deleteComment();
	header('location:index.php?action=listesignalement');
}


function actionpourvoirlessignalements()
{
	//echo 'ca va?';
	$CommentManager = new CommentsManager();
	$post = $CommentManager-> getReportlistComment();

	/*
	while ($donnees = $post->fetch())
	{
		echo $donnees['comment'] .'<br />';
	}
	*/
	//header('Location: view/frontend/adminreportListView.php');
	require('view/frontend/adminreportListView.php');

	//http://localhost/tests/writerBlog/index?action=listesignalement

	/*
	?>
	<?php $title = 'Mon blog'; ?>


	<?php ob_start(); ?>

	<?php
	while ($donnees = $post->fetch())
	{
		echo $donnees['comment'] .'<br />';
	}
	?>

	<?php $content = ob_get_clean(); ?>
	<?php require('view/frontend/template.php'); ?>


<?php
*/


}
