<!---
Author: Aashish Parmar (parmaraashish3@gmail.com)

This file creates a new session on a new user login.
--->

<?php
    session_start();
    $_SESSION[$_GET["sub"]] = $_GET["bname"];
?>
