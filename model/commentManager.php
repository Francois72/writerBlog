<?php
require_once("Manager.php");
class CommentsManager extends Manager
{	

	public function getComments()
	{
		$db = $this -> dbConnect();		
		$post=$db->prepare('SELECT comments.comment, users.user, comments.id, DATE_FORMAT(comments.creation_date, \'%d/%m/%Y à %Hh%imin\') AS creation_date2 FROM users INNER JOIN comments ON comments.user_id = users.id where comments.post_id = ?  ORDER BY comments.creation_date DESC');
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

	public function reportComment($commentid)
	{			
		$db = $this -> dbConnect();		
		$post=$db->prepare('UPDATE comments SET report = 1 WHERE id=?');
		$post->execute(array($commentid));		
	}


	public function deleteComment()
	{
		$db = $this -> dbConnect();		
		$post=$db->prepare('DELETE FROM comments WHERE id=?');
		$post->execute(array( $_GET['post']));	
	}


	public function ignoreComment()
	{
		$db = $this -> dbConnect();		
		$post=$db->prepare('UPDATE comments SET report = 0 WHERE id=?');
		$post->execute(array( $_GET['post']));		
	}

	public function getReportlistComment()
	{
		$db = $this -> dbConnect();		
		$post=$db->query('SELECT comments.comment, comments.id, comments.user_id, users.user FROM comments INNER JOIN users ON comments.user_id = users.id where report=\'1\'');		
		return $post;		
	}

}