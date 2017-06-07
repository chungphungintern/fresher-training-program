<?php
session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] != "Success") {
    session_destroy();
    header("location:login.php");
}
