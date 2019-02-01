<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<p>Derniers billets du blog :</p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>