<!---
Author: Aashish Parmar (parmaraashish3@gmail.com)

Tool to check for details entered by user.
--->

<?php
    $db = mysql_connect("localhost","$user","$pass");
    mysql_select_db("$db_name",$db);
    $qry='select ' . $_GET["type"] .' from users where ' . $_GET["type"] . '="' . $_GET["val"] . '";';
    $query = mysql_query($qry,$db);
    if($entry=mysql_fetch_array($query)) {
        echo '<span class="glyphicon glyphicon-remove" id="status" title="Details already exist">
                Details already exist
                </span>';
    }
    else {
        echo '<span class="glyphicon glyphicon-ok" id="status" title="Correct Details"></span>';
    }
?>
