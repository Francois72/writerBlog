<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<p>Derniers billets du blog :</p>







<?php
try
{
	$db = new PDO('mysql:host=localhost;dbname=writerblog;charset=utf8','root','');

}

catch(Exception $e)
{
	die('Erreur:'.$e->getMessage());
}


//on récupere les derniers billets du blog
$post =$db->query('SELECT id, title, content, creation_date
FROM postswriter ORDER BY creation_date DESC ');


while ($data = $post->fetch())
{
?>
	<div class= authorLastPost>
	<?php
	echo '<h2><strong>'.$data['title']. '</strong></h2>';
	echo $data['content'];
	echo '<p><a href="view/frontend/comments?post='.$data['id'].'">Commentaires :</a></p>';
	?>
	</div>

<?php	
}

$post->closeCursor();

?>

<a href="view/frontend/page2.php">Page 2</a>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>