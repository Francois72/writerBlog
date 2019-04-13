<?php
require_once("Manager.php");
class CommentsManager extends Manager
{
	/*
	public function getComments()
	{
		$db = $this -> dbConnect();		
		$post=$db->prepare('SELECT comments.comment, users.user, DATE_FORMAT(comments.creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date2 FROM users INNER JOIN comments ON comments.user_id = users.id where comments.post_id = ?  ORDER BY comments.creation_date DESC');
		$post->execute(array($_GET['post']));
		return $post;
	}
	*/

	public function getComments()
	{
		$db = $this -> dbConnect();		
		$post=$db->prepare('SELECT comments.comment, users.user, comments.id, DATE_FORMAT(comments.creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date2 FROM users INNER JOIN comments ON comments.user_id = users.id where comments.post_id = ?  ORDER BY comments.creation_date DESC');
		$post->execute(array($_GET['post']));
		return $post;
	}





	public function postComment()
	{
		$db = $this -> dbConnect();		
		$data = $db->prepare('INSERT INTO comments (post_id, user_id, comment) VALUES(?,?,?)');
		$data->execute(array($_POST['post'], $_POST['user_id'], $_POST['comment']));
		return $data;
	}
}