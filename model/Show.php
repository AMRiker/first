<?php

namespace model;

class Show
{
    public function show()
    {
        $connect = new Connect();
        $db = $connect->connectToBd();
        $show = $db->prepare('SELECT * FROM user');
        $show->execute();
        $result = $show->fetchAll();
        return $result;
    }

}