<?php

$con = mysql_connect('localhost', 'root', 'root');
  if (!$con)
  {
    die('Not connected : ' . mysql_error());
  }

  $db = mysql_select_db('LabTrack', $con);
if (!$db)
  {
    die ('Cannot find database : ' . mysql_error());
  }


  $id = $_REQUEST['id'] ;
  $value = $_REQUEST['value'] ;
  $column = $_REQUEST['columnName'] ;
  $columnPosition = $_REQUEST['columnPosition'] ;
  $columnId = $_REQUEST['columnId'] ;
  $rowId = $_REQUEST['rowId'] ;


  echo $value;

  mysql_query("UPDATE temp SET $column = '$value' WHERE StudentID = '$id'");

  
?>