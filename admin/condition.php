<?php
    // auth.php
    session_start();

    if ((!isset($_SESSION['user']) ||($_SESSION['user']['Role']!=1))) {
        header('Location: index.php?act=home');
    }
?>