<?php

require('connect.php');


  $id = $_REQUEST['id'] ;
  $value = $_REQUEST['value'] ;
  $column = $_REQUEST['columnName'] ;
  $columnPosition = $_REQUEST['columnPosition'] ;
  $columnId = $_REQUEST['columnId'] ;
  $rowId = $_REQUEST['rowId'] ;


  echo $value;

  mysql_query("UPDATE temp SET $column = '$value' WHERE StudentID = '$id'");

  
?>