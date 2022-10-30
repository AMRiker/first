<?php
require_once __DIR__ . '/../controller/ShowController.php';
var_dump(__DIR__);

$show = new controller\ShowController();
$output = $show->actionShow();
foreach ($output as $value)
{
    printf($value);
}
