<?php

namespace controller;

class PostController
{
    public function actionWritePost()
    {
        $post = new \Post($_SESSION['userId'],$_POST['head'],$_POST['body']);
        $connect = new \Connect();
        $db = $connect->connectToBd();
        $postData = [
            'user_id'=> $post->userId,
            'head'=> $post->head,
            'body'=> $post->body
        ];
        $writePost = $db -> prepare ("INSERT INTO post (user_id, head, body) values (:user_id, :head, :body)");
        $writePost->execute($postData);
    }
}