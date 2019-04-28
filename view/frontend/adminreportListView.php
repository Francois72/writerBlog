<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>

<?php
echo 'Liste des commentaires signalés:</br>';
while ($data = $post->fetch())
{
	echo $data['user'].': '.$data['comment'];	
	?>
	<em><a href="index.php?action=ignore&post=<?php echo $data['id']?>">ignorer</a></em>
	<em><a href="index.php?action=supprimercommentaire&post=<?php echo $data['id']?>">supprimer</a></em>
	</br>
<?php
}
?>
<em><a href="index.php?action=admin">Retour</a></em>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>