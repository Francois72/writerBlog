<!--<?php $title = 'Mon blog'; ?>-->

<?php ob_start(); ?>

<?php
if (isset($_SESSION['user']))
{
?>
	<form action="index.php?action=addpost" method="post">
		<label>Titre:</label></br>
		<input type="text" name="title" value="" id="titleEdit"></br>
		
		<label>Contenu:</label></br>
		<textarea class="tinymce" name="content"></textarea></br>
		<input type="submit" id="send_button" value="Envoyer" />
	</form>
<?php
}
?>
<div class="returnpg">
	<em><a href="index.php?action=admin">Retour</a></em>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('./view/frontend/template.php'); ?>