<?php
require_once __DIR__ . '/User.php';
echo $user->invalid_psw_len;
echo $user->low_age;
echo $user->unconfirmed_psw;
echo "<a href='index.html'> try again </a>";
?>