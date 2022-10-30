<?php

namespace controller;
use model\Show;
class ShowController
{
    public function actionShow()
    {
        $show = new Show();
        return $show->show();
    }
}