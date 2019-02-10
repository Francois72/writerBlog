<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
	<h1>Listes des billets</h1>
	
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>