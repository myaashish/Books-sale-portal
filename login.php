<!---
Author: Aashish Parmar (parmaraashish3@gmail.com)

Tool to login to portal and create a user specific session.
--->

<?php
    session_start();
    $db = mysql_connect("localhost","$user","$pass");
    mysql_select_db("$db_name",$db);
    $qry = 'select * from users where email="' . mysql_real_escape_string($_POST["email"]) . '" and password="' . hash('sha256',$_POST["pwd"]) . '";';
    $flag = 0;
    $query = mysql_query($qry,$db);
    while($entry = mysql_fetch_array($query)) {
        $_SESSION["name"] = $entry["name"];
        $_SESSION["email"] = $_REQUEST["email"];
        $_SESSION["state"] = "";
        $_SESSION["phone"] = $entry["phone"];
        $flag = 1;
    }
    if($flag == 0) {
        $_SESSION["state"] = "login";
        header('Location: index.php'); 
    }
    else {
        if($_SESSION["sem"] == "") {
            header('Location: institute.php');
        }
        else {
            header('Location: order.php');
        }
    }
?>
