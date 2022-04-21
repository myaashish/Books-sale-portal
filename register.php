<!---
Author: Aashish Parmar (parmaraashish3@gmail.com)

Tool to register new user on the portal.
--->

<?php
    session_start();
    $db = mysql_connect("localhost","$user","$pass");
    mysql_select_db("$db_name",$db);
    if($_REQUEST["name"] == "" || $_REQUEST["phone"] == "" || $_REQUEST["email"] == "" || $_REQUEST["univ"] == "" || $_REQUEST["depart"] == "" || $_REQUEST["addres"] == "" || $_REQUEST["pwd"] == "" || $_SESSION["pwd"] != $_SESSION["pwd2"]) {
        $_SESSION["state"] = "register";
        if($_SESSION["sem"] == "") {
            header('Location: index.php');
        }
        else {
            header('Location: order.php');
        }
    }
    else {
        $pwd = hash('sha256',$_REQUEST["pwd"]);
        $ref = hash('sha256',$_REQUEST["phone"]);
        $ref = $ref[1] . $ref[5] . $ref[13] . $ref[25] . $ref[41] . $ref[61]; 
        $query = mysql_query('insert into users values("' . mysql_real_escape_string($_REQUEST["name"]) . '", "' . mysql_real_escape_string($_REQUEST["phone"]) . '", "' . mysql_real_escape_string($_REQUEST["email"]) . '", "' . mysql_real_escape_string($_REQUEST["univ"]) . '", "' . mysql_real_escape_string($_REQUEST["depart"]) . '", "' . mysql_real_escape_string($_REQUEST["addres"]) . '", "' . $pwd . '", "' . $ref . '");', $db);
        $_SESSION["name"] = mysql_real_escape_string($_REQUEST["name"]);
        $_SESSION["email"] = mysql_real_escape_string($_REQUEST["email"]);
        $_SESSION["state"] = "";
        $_SESSION["phone"] = $entry["phone"];
        if($_SESSION["sem"] == "") {
            header('Location: institute.php');
        }
        else {
            header('Location: order.php');
        }
    }
?>
