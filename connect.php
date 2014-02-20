<?php
$link = mysql_connect('localhost:3306', 'root', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('test', $link);

?>