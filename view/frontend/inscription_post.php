<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
$pseudo = $_POST['pseudo'];
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
		$req = $bdd->prepare('INSERT INTO membres(pseudo,pass,email) VALUES(:pseudo, :pass, :email)');
		$req->execute(array('pseudo' => $pseudo, 'pass' => $pass_hache, 'email' => $email));


		// Redirection du visiteur vers la page principale qui sera la page de connexion (ou d'inscription)
		header('Location: connexion.php');




    }
    else
    {
        echo 'L\'adresse ' . $_POST['email'] . ' n\'est pas valide, recommencez !';
    }
}




?>