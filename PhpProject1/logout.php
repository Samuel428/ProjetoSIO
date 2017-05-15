<?php
session_start();
session_destroy();
echo 'Terminou a sessão.';
sleep(2);
header('location:index.php');