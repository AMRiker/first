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
}