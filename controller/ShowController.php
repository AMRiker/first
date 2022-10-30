<?php

namespace controller;
use model\Show;
class ShowController
{
    public function actionShow()
    {
        $show = new Show();
        $posts = $show->show();
        include __DIR__ . '/../view/ShowForm.php';
    }
}