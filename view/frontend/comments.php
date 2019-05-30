<?php ob_start(); ?>

<?php
$data = $post->fetch();
?>

<div class= authorPostCmt>
<?php
	echo '<h2><strong>'.$data['title']. '</strong></h2>';
	echo $data['content'];
?>
</div>

<a class=retour href=index.php>Retour à la page d'accueil</a>

<?php
echo '<h1>Commentaires</h1>';
if (isset($_SESSION['user']))
{	
	?>
	<form action="index.php?action=postcomment" method="post">	
		<input name="user_id" type="hidden" value="<?php echo $_SESSION['id'] ?>"/></p>
		<input name="post" type="hidden" value="<?php echo $_GET['post'] ?>">
		<textarea class="tinymce" name="comment"></textarea>
		<input type="submit" id="send_button" value="Envoyer"/>
	</form>
	<?php
}

while ($data = $comments->fetch())
{	
	echo '<div class=blocComments>';
	echo '<p><span class=userc><strong>'.$data['user'].'</span></strong> <span class=datec>le '.$data['creation_date2'].'</span></br>'; 
	echo '<strong>'.$data['comment'].'</strong>';
	if (isset($_SESSION['user']))
	{		
		echo '<button class=reportbutton><a href=index.php?action=report&commentid='.$data['id'].'&postid='.$_GET['post'].'>Signaler</a></button></p>';
	}
	echo '</div>';
}

echo '</br>';
echo '<a class=retour href=index.php>Retour à la page d\'accueil</a>';


$post->closeCursor();
?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>