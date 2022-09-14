<?php
if ($_SERVER ['REQUEST_URI'] == '/'){
    require_once __DIR__ . '/view/startPage.html';
}
echo '<pre>';
var_dump($_SERVER['REQUEST_URI']);
echo '<pre>';
if ($_SERVER ['REQUEST_URI'] == '/index.php/registration'){
        require_once __DIR__ . '/reg_new_to_sql.php';
}