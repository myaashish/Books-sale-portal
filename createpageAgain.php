<!---
Author: Aashish Parmar (parmaraashish3@gmail.com)

Tool to select books based on enetered information.
--->

<?php
    session_start();
    $db = mysql_connect("localhost","$user","$pass");
    mysql_select_db("$db_name",$db);
    if(mysql_real_escape_string($_GET["sem"]) != "") {
        $_SESSION["branch"] = $_REQUEST["branch"];
        $_SESSION["sem"] = mysql_real_escape_string($_GET["sem"]);
        $qry = 'select distinct subject from ' . mysql_real_escape_string($_GET["college"]) . ' where branch="' . mysql_real_escape_string($_REQUEST["branch"]) . '" and sem="' . mysql_real_escape_string($_GET["sem"]) . '";';
        $query = mysql_query($qry, $db);
        while($entry = mysql_fetch_array($query)) {
            echo '<input type="checkbox" id="the' . $entry["subject"] . '" name="' . $entry["subject"] . '" required style="visibility: hidden;">';
            echo '<form method="POST" action="order.php"><div id="' . $entry["subject"] . '">' . '<h3 id="collegename">' . $entry["subject"] . '</h3>';
            $qry = 'select * from ' . mysql_real_escape_string($_GET["college"]) . ' where branch="' . mysql_real_escape_string($_REQUEST["branch"]) . '" and subject="' . $entry["subject"] . '";';
            $bookQuery = mysql_query($qry, $db);
            while($bookDetails = mysql_fetch_array($bookQuery)) {
                echo '<img id="unactive" class="imaglink" src="' . $bookDetails["location"] . '" title="' . $bookDetails["name"] . '" onclick=selectBook(this.parentNode.id,this.title)>' . $bookDetails["name"];
            }
            echo '</div>';
        }
        echo '<br><br><input type="submit" id="submitbtn" value="Submit Order" class="btn btn-default btn-block"></form>';
    }
    else {
        echo '<h2 id="branchtitle">' . mysql_real_escape_string($_REQUEST["branch"]) . '</h2><div id="collegename">';
        $query = mysql_query('select distinct sem from ' . mysql_real_escape_string($_GET["college"]) . ' where branch="' . mysql_real_escape_string($_REQUEST["branch"]) . '";', $db);
        while($entry = mysql_fetch_array($query)) {
            echo '<a class="sem branchname btn btn-default" href="#" onclick = semRequest(this.innerHTML)>' . $entry["sem"]. '</a>';
        }
        echo '</div><div id="book-list"></div>';
    }
?>

