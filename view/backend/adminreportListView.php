<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>

<div class="listrpt">
	<?php
	echo 'Liste des commentaires signalés:</br>';
	while ($data = $post->fetch())
	{
		echo '<div class="listsgn">';
			echo $data['user'].': '.$data['comment'];	
			?>
			<div class="listsgn-int">
				<em><a href="index.php?action=ignore&post=<?php echo $data['id']?>">ignorer</a></em>
				<em><a href="index.php?action=supprimercommentaire&post=<?php echo $data['id']?>">supprimer</a></em>
				</br>
			</div>
		</div>
	<?php
	}
	?>
	<div class="retrnpglst">
		<em><a href="index.php?action=admin">Retour</a></em>
	</div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('./view/frontend/template.php'); ?>