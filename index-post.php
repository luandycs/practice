<?php
/**
 * Created by PhpStorm.
 * User: alu95
 * Date: 4/24/2019
 * Time: 5:27 PM
 */
session_start();

if(isset($_SESSION['name'])) {
    unset($_SESSION['name']);
    $_SESSION['name'] = $_POST['name'];
}
else{
    $_SESSION['name'] = $_POST['name'];
}
header("location: hitori.php");
exit;
