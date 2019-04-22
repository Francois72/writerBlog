<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>


<?php


while ($data = $post->fetch())
{
	echo $data['user'].' '. $data['comment'].'</br>';		
}
/*2 boutons supprimer / ignorer*/

?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>