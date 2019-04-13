<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>


<?php

/*
include ("model/Manager.php");// a retirer
include ("model/postManager.php");//
$db = dbConnect(); //
$post = getPost($db);//
*/



$data = $post->fetch();

?>
<div class= authorLastPost>
<?php
echo '<h2><strong>'.$data['title']. '</strong></h2>';
echo $data['content'];


?>
</div>

<?php

echo '<h1>Commentaires</h1>';

if (isset($_SESSION['user']))
{	
	?>

	<form action="index.php?action=postcomment" method="post">
	
	<input name="user_id" type="hidden" value="<?php echo $_SESSION['id'] ?>"/></p>


	<input name="post" type="hidden" value="<?php echo $_GET['post'] ?>">
	<textarea class="tinymce" name="comment"></textarea>
	<input type="submit" id="send_button" value="Envoyer" />
	</form>

	<?php
}


//include ("model/commentManager.php");
/*
$CommentsManager = new CommentsManager();
$post = $CommentsManager -> getComments();
*/
//$post = getComments();




while ($data = $comments->fetch())
{	
	//echo $data['comment'].'</br>';

	echo '<p><strong>'.$data['user'].'</strong> ('.$data['creation_date2'].') <strong>'.$data['comment'].'</strong><button>Signaler</button></p>';	
}

$post->closeCursor();
?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>