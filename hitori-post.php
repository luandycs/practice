<?php
/**
 * Created by PhpStorm.
 * User: alu95
 * Date: 4/24/2019
 * Time: 10:14 PM
 */
session_start();

if(isset($_SESSION['game'])) {
    unset($_SESSION['game']);
    $_SESSION['game'] = $_POST['game'];
}
else{
    $_SESSION['game'] = $_POST['game'];
}
header("location: hitori.php");
exit;