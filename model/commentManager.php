<?php

/*
function getComments($db)
{
	$post=$db->prepare('SELECT comments.comment, users.user, DATE_FORMAT(comments.creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date2 FROM users INNER JOIN commments ON users.user = comments.user_id WHERE comments.post_id = ? ORDER BY creation_date2 DESC');
	$post->execute(array($_GET['post']));
	return $post;
}
*/

/*
FROM proprietaires p
INNER JOIN jeux_video j
ON j.ID_proprietaire = p.ID
*/

function getComments($db)
{
	$post=$db->prepare('SELECT comments.comment, users.user, DATE_FORMAT(comments.creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date2 FROM users INNER JOIN comments ON comments.user_id = users.id where comments.post_id = ?  ORDER BY creation_date2 DESC');
	$post->execute(array($_GET['post']));
	return $post;
}



function postComment($db)
{
	$data = $db->prepare('INSERT INTO comments (post_id, author, comment) VALUES(?,?,?)');
	$data->execute(array($_POST['post'], $_POST['author'], $_POST['comment']));
	return $data;
}


/* en objet

class CommentManager //extends Manager
{
	function getComments($db)
	{
		//$db = $this->dbConnect();
		$post=$db->prepare('SELECT author, comment, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date2 FROM comments where post_id = ? ORDER BY creation_date DESC');
		$post->execute(array($_GET['post']));
		return $post;
	}

function postComment($db) //extends Manager
	{
		//$db = $this->dbConnect();
		$data = $db->prepare('INSERT INTO comments (post_id, author, comment) VALUES(?,?,?)');
		$data->execute(array($_POST['post'], $_POST['author'], $_POST['comment']));
		return $data;
	}	
}
*/



/*
$commentManager = new CommentManager()

*/

