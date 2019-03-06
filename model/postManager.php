<?php
function getPosts($db)
{
	$posts =$db->query('SELECT id, title, content, creation_date FROM postswriter ORDER BY creation_date DESC ');
	return $posts;
}

function getPost($db)
{
	$post=$db->prepare('SELECT id, title, content, creation_date FROM postswriter WHERE id=?');
	$post->execute(array($_GET['post']));
	return $post;
}

/*
class PostManager extends Manager
{
	function getPosts($db)
	{
		$posts =$db->query('SELECT id, title, content, creation_date FROM postswriter ORDER BY creation_date DESC ');
		return $posts;
	}

function getPost($db)
	{
		$post=$db->prepare('SELECT id, title, content, creation_date FROM postswriter WHERE id=?');
		$post->execute(array($_GET['post']));
		return $post;
	}
}
*/