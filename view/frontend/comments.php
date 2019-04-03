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

	echo '<form action="index.php?action=postcomment" method="post">';
	
	echo '<input name="user_id" type="hidden" value="'.$_SESSION['id'].'"/></p>';
	// en gros je dois recup l'id de user

	echo '<input name="post" type="hidden" value="  '.$_GET['post'].'  ">';
	echo '<textarea class="tinymce" name="comment"></textarea>';
	echo '<input type="submit" id="send_button" value="Envoyer" />';
	echo '</form>';
}


//include ("model/commentManager.php");

$post = getComments();




while ($data = $post->fetch())
{	
	//echo $data['comment'].'</br>';

	echo '<p><strong>'.$data['user'].'</strong> ('.$data['creation_date2'].') <strong>'.$data['comment'].'</strong></p>';
}

$post->closeCursor();
?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>