<?php 

try
{
	$db = new PDO('mysql:host=localhost;dbname=writerblog;charset=utf8','root','');

}

catch(Exception $e)
{
	die('Erreur:'.$e->getMessage());
}

/**/

$post=$db->prepare('SELECT id, title, content, creation_date FROM postswriter WHERE id=?');

$post->execute(array($_GET['post']));
$data = $post->fetch();


	echo '<h2><strong>'.$data['title']. '</strong></h2>';
	echo $data['content'];





/**/

$post->closeCursor();


$post=$db->prepare('SELECT author, comment, creation_date FROM comments where post_id = ? ORDER BY creation_date DESC');

$post->execute(array($_GET['post']));

while ($data = $post->fetch())
{
	echo '<p><strong>'.$data['author'].'</strong> ('.$data['creation_date'].') <strong>'.$data['comment'].'</strong></p>';
}