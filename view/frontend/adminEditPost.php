<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>




<?php 

$data = $post->fetch();


if (isset($_SESSION['user']))
{	




?>

	<form action="index.php?action=editpost&post=<?php echo $_GET['post']?>" method="post">
	<input type="hidden" name="id"  value="<?php $_SESSION['id']?>"/>
	<input type="hidden" name="post"  value="<?php $_GET['post']?>">

	<label>Titre:</label></br>
	<input type="text" name="title" value="<?php echo $data['title'] ?>" id="titleEdit"></br>
	
	<label>Contenu:</label>
	<!--<input type="text" name="content" value="<?php echo $data['content'] ?>"></br> -->
	<textarea class="tinymce" name="content"><?php echo htmlspecialchars_decode($data['content'])?></textarea>
	

	<input type="submit" id="send_button" value="Envoyer" />
	</form>



<?php


}


$post->closeCursor();

?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>