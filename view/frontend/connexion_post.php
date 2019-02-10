<?php 
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=writerblog', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


$user = $_POST['user'];


//  Récupération de l'utilisateur et de son pass hashé
$req = $bdd->prepare('SELECT id, pass FROM users WHERE user = :user');
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
        echo 'Vous êtes connecté !';
        ;
        header('Location: http://localhost/tests/writerBlog/index.php?user='.$user);
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !!';
    }
}

