<?php

error_reporting(E_ALL ^ E_DEPRECATED);
$link = mysql_connect("localhost", "id12870091_root", "entornos");
mysql_set_charset('utf8', $link);
mysql_select_db("id12870091_hogarify", $link);
?>