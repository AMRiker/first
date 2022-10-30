<?php

namespace model;

class Show
{
    public function show()
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