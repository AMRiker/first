<?php
require_once __DIR__ . '/../model/User.php';
echo $user->invalidPswlen;
echo $user->lowAge;
echo $user->unconfirmedPsw;
echo "<a href='startPage.html'> try again </a>";
?>