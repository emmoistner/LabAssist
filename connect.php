<?php

$link = mysql_connect('localhost', 'root', 'root');
  if (!$link)
  {
    die('Not connected : ' . mysql_error());
  }

  $db = mysql_select_db('LabTrack', $link);
if (!$db)
  {
    die ('Cannot find database : ' . mysql_error());
  }

 
  ?>