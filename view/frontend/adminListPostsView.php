<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<h1>Page admin</h1>


	<em><a href="index.php?action=addpostview">Ajouter un billet</a></em>
	</br>	

	<?php

	while ($data = $post->fetch())
	{
	?>	
		
		<strong><?= htmlspecialchars($data['title'])?></strong>
		
		<em><a href="index.php?action=editpostview&post=<?php echo $data['id']?>">Editer</a></em>
		<em><a href="#">Supprimer</a></em>		
		</br>		

	<?php
	}

	
	$post->closeCursor();
	?>

	<a href="index.php?action=listesignalement">liste des signalements</a>





<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>