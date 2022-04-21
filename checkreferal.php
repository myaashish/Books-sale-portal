<!---
Author: Aashish Parmar (parmaraashish3@gmail.com)

Checks for referal code.
--->

<?php
    session_start();
    $db = mysql_connect("localhost","$user","$pass");
    mysql_select_db("$db_name",$db);
    $query = mysql_query('select * from users where referal="' . mysql_real_escape_string($_GET["ref"]) . '";',$db);
    if($entry=mysql_fetch_array($query)) {
        if($_SESSION["name"]!=$entry["name"] && $_SESSION["ref"] == "") {
            $_SESSION["cost"] = $_SESSION["cost"] - 50;
            $_SESSION["ref"] = mysql_real_escape_string($_GET["ref"]);
            echo '<strong>' . $_SESSION["cost"] . 'Referal has been successfully applied<span class="glyphicon glyphicon-ok" id="status" title="Referal successfully applied"></span></strong>';
        }
        else {
            echo $_SESSION["cost"] . 'Invalid Referal code<span class="glyphicon glyphicon-remove" id="status" title="Invalid Referal code"></span>';
        }
    }
    else {
        echo $_SESSION["cost"] . 'Invalid Referal code<span class="glyphicon glyphicon-remove" id="status" title="Invalid Referal code"></span>';
    }
?>
