<?php ob_start(); ?>

<img src="public/images/imgalaska.jpg">	

<div class ="titlesM">
	<h1>Billet simple pour l'Alaska <span class="title-grey">de Jean Forteroche</span></h1>
	<h3>Derniers billets du blog:</h3>
</div>

<?php
while ($data = $post->fetch())
{
?>	
	<div class=blocPost>
		<div class= authorPost>
			<h2><strong><?= htmlspecialchars($data['title'])?></strong></h2>
			<p><?= nl2br($data['content'])?></p>
		</div>
		<div class=textend>
			[...]
		</div>
		<div class=textend>
			<em><a href="index.php?action=viewPost&post=<?=$data['id']?>">Lire la suite</a></em>
		</div>
	</div>

<?php
}
$post->closeCursor();
?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>