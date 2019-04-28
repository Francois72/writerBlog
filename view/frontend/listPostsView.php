<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
	<img src="public/images/imgalaska.jpg">	
	<h1>Billet simple pour l'Alaska</h1>
	<p>Derniers billets du blog :</p>

	<?php

	
	while ($data = $post->fetch())
	{
	?>		
		<div class= authorLastPost>
		<h2>
			<strong>
				<?= htmlspecialchars($data['title'])?>
			</strong>
		</h2>
		<p>
			<?= nl2br($data['content'])?>
		</p>
		<em><a href="index.php?action=viewPost&post=<?=$data['id']?>">Commentaires</a></em>		
		</div>
	
	

	<?php
	}
	$post->closeCursor();
	?>




<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>