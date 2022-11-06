<?php
namespace model;
class Post
{
    public $userId;
    public $head;
    public $body;
    public function __construct($userId, $head, $body)
    {
        $this->userId = $userId;
        $this->head = $head;
        $this->body = $body;
    }
   public static function getPosts()
   {
       $connect = new Connect();
       $db = $connect->connectToBd();
       $show = $db->prepare('SELECT user.name, post.head, post.body FROM `user`
                                    JOIN `post` ON user.id = post.user_id;');
       $show->execute();
       $result = $show->fetchAll();
       return $result;
   }
}