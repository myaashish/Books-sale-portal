<!---
Author: Aashish Parmar (parmaraashish3@gmail.com)

Tool to logout the user and delete user session
--->

<?php
    session_start();
    session_unset();
    session_destroy();
    header('Location: index.php');
?>
