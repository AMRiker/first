<?php

namespace controller;
use model\Connect;
use model\Post;


class PostController
{
    public function actionWritePost()
    {
        $post = new Post($_SESSION['userId'],$_POST['head'],$_POST['body']);
        $connect = new Connect();
        $db = $connect->connectToBd();
        $postData = [
            'user_id'=> $post->userId,
            'head'=> $post->head,
            'body'=> $post->body
        ];
        $writePost = $db -> prepare ("INSERT INTO post (user_id, head, body) values (:user_id, :head, :body)");
        $writePost->execute($postData);
    }
    public function actionShow()
    {
        $posts = Post::getPosts();
        include __DIR__ . '/../view/ShowForm.php';
    }
    public static function getAllPosts()
    {
        $posts = Post::getPosts();
        echo json_encode($posts, JSON_UNESCAPED_UNICODE);
    }
}