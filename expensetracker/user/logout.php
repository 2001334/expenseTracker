<?php
    require_once "../lib/config.php";
    session_start();
    unset($_SESSION["id"]);
    unset($_SESSION["fname"]);
    unset($_SESSION["lname"]);
    unset($_SESSION["email"]);
    session_destroy();
    redirect_to("../index", "Logout=success");
?>