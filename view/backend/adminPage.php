<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<h1 class="title-page-admin">Page admin</h1>
	
	<div id=adminpage>
		<hr>
		
		<a href="index.php?action=listesignalement"><i class="fas fa-flag"></i> liste des signalements</a>
		</br>
		<hr>

		<em><a href="index.php?action=addpostview"><i class="fas fa-address-card"></i> Ajouter un billet</a></em>
		</br>
		<hr>

		<div class="listchaps">
			<h3 class="h3-admin">Liste des chapitres:</h3>
			<?php

			while ($data = $post->fetch())
			{
			?>
				<div class=editdel>
					<strong><?= htmlspecialchars($data['title'])?></strong>
					<br>
					<em><a href="index.php?action=editpostview&post=<?php echo $data['id']?>"><i class="fas fa-edit"></i>Editer</a></em>
					<em><a href="index.php?action=deletepost&post=<?php echo $data['id']?>"><i class="fas fa-trash"></i>Supprimer</a></em>
				</div>	
			<?php
			}
			
			$post->closeCursor();
			?>
		</div>
		<hr>
	</div>

<?php $content = ob_get_clean(); ?>
<?php require('./view/frontend/template.php'); ?>