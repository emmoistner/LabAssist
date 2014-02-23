
<!DOCTYPE html>
<html lang="en">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Import Class Lists</title>
   <link href="dist/css/bootstrap.css" rel="stylesheet">
   <style type="text/css">
   
   #wrap{
      margin: 80px auto;
      width: 960px;
      padding: 10px;
      overflow: hidden;
      background: #FAFAFA;
      border-radius: 4px;
      -webkit-box-shadow: 0 0 4px rgba(0, 0, 0, 0.4);
      box-shadow: 0 0 4px rgba(0, 0, 0, 0.4);
    }
    
    table {
      max-width: 100%;
      background-color: #fff;
      border-collapse: collapse;
      border-spacing: 0;
      width: 100%;
      margin-bottom: 20px;
    }
    table th{
      background: #eae4ff;
    }
    table th,
    table td {
      padding: 8px;
      line-height: 20px;
      text-align: left;
      vertical-align: top;
      border-top: 1px solid #dddddd;
    }
    table {
      border: 1px solid #dddddd;
      border-collapse: separate;
      *border-collapse: collapse;
      border-left: 0;
      -webkit-border-radius: 4px;
         -moz-border-radius: 4px;
              border-radius: 4px;
    }
    table th,
    table td {
      border-left: 1px solid #dddddd;
    }

    table tr:nth-child(odd){
      background-color: #f9f9f9;
    }

    table tr:hover td
    {
      background-color: #f5f5f5;
    }

    table tr:first-child{
      font-weight: bold;
    }
    
     
   </style> 
 </head>
 
 <?php
 
 
 require ('nav.php');
 require ('includeJS.php');
 ?>
 <body> 
  
   <div id="wrap">
     <h1>Classes</h1> 
 
        
       </br> 
       </br> 
       <button id ="popover" type ="button" class = "btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal2" >Import Class List</button> 
   
        

 
       <form action="importClassList.php"method="post">
       <div class="modal-header"> 
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button> 
         <h4 class="modal-title" id="myModalLabel">Create A New Class List</h4> 
         <input type ="text" class="input-small" placeholder = "Class Name" name ="classname" id="classname"required="true"/> 
         <input type ="text" class="input-small" placeholder = "Instructor" name ="instructor" id="instructor"required/> 
         <input type ="text" class="input-small" placeholder = "Section" name="section" id="section" required/> 
         <input type ="text" class="input-small" placeholder = "Room Number" name ="roomnum" id="roomnum" required/>  
         </br>
       </div>
         <div class="modal-body" id="d1">
         <input type ="text" class="input-small" placeholder = "First Name" name = "Fname" id="fname" required="required"/> 
         <input type ="text" class="input-small" placeholder = "Last Name" name = "Lname" id="lname" required="required"/> 
         <input type ="text" class="input-small" placeholder = "User Name" name = "BSUemail" id="email"required ="required"/> 
         <input type ="text" class="input-small" placeholder = "Student ID" name= "UserID" id="userid"required/>
         </br>
         </br>
       </div>
         <button type ="button" class = "btn btn-sm btn-primary" id="add" onclick="addRow()">Add</button> 
         <button type ="button" class = "btn btn-sm btn-primary" onclick="removeRow()">Delete</button> 
       </br>
        </br>
        <div class ="modal-footer">
         <input type = "submit" name="submit" class = "btn btn-primary" data-dismiss="modal"></input> 
       </div>
     </form>

 


       <div class="modal-header"> 
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button> 
         <h4 class="modal-title" id="myModalLabel">Create the Class</h4> 
         </div>
          <form action ="TrueImport.php" method="post"> 
         <input type ="text" class="input-small" placeholder = "Class Name" name ="classname2" required="required"/> 
         <input type ="text" class="input-small" placeholder = "Instructor" name ="instructor2" required="required"/> 
         <input type ="text" class="input-small" placeholder = "Section" name ="section2" required="required"/> 
         </br>
         </br> 
         <input type ="text" class="input-small" placeholder = "Room Number" name ="roomnum2" required="required"/> 
         
       
       
       <div class ="modal-bodynew">
 
        </br>
       <input type="file" id="the_file" required="required" accept=".csv" class="filestyle" data-classButton="btn btn-primary" data-buttonText="Choose a File to Import" name="the_file" /> 
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
         <button type="submit" class="btn btn-primary" data-dismiss="modal">Create</button> 
         
       </div> 
       </form> 
 
 
  
  
     <div id="file_info"></div> 
     <div id="list"></div> 
     <div id ="error" class="alert alert-warning alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Warning!</strong> File extension must be .CSV!

     


     
     
   

   

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

  ?>

   
   <script src = "dist/js/jquery-2.0.3.js"></script> 
   <script src = "dist/js/bootstrap.min.js"></script> 
   <script src = "dist/js/bootstrap-filestyle.min.js"></script> 
   <script>$('#error').hide();</script>
    
   <script type ="text/javascript">
   function fileInfo(e){
    var file = e.target.files[0];
    if (file.name.split(".")[1].toUpperCase() != "CSV"){
      $('#error').show();
      e.target.parentNode.reset();
      return;
    }else{
    
      document.getElementById('file_info').innerHTML = "<p>File Name: "+file.name + " | "+file.size+" Bytes.</p>";
    }
  }
 function handleFileSelect(){
  var file = document.getElementById("the_file").files[0];
  var fileReader = new FileReader();
  var link = /(http:\/\/|https:\/\/)/i;
  fileReader.onload = function(file) {
              var content = file.target.result;
              var rows = file.target.result.split(/[\r\n|\n]+/);
              var table = document.createElement('table');
              
              for (var i = 0; i < rows.length; i++){
                var tr = document.createElement('tr');
                var arr = rows[i].split(',');

                for (var j = 0; j < arr.length-2; j++){
                  if (i==0)
                    var td = document.createElement('th');
                  else
                    var td = document.createElement('td');

                  if( link.test(arr[j]) ){
                    var a = document.createElement('a');
                    a.href = arr[j];
                    a.target = "_blank";
                    a.innerHTML = arr[j];
                    td.appendChild(a);
                  }else{
                    td.innerHTML = arr[j];
                  }
                  
                  tr.appendChild(td);
                }
				
                table.appendChild(tr);
                
              }

              document.getElementById('list').appendChild(table);
          };
  fileReader.readAsText(file);
 }
 document.getElementById('the_form').addEventListener('submit', handleFileSelect, false);
 document.getElementById('the_file').addEventListener('change', fileInfo, false);

  
   




function addRow(){



  
   var lastGroup = $('.modal-body').last();
   var clone = lastGroup.clone();
   $('.modal-body').after(clone);
return false;

 }




 
$(document).ready(function (){
    validate();
    $('#fname, #lname, #email, #userid, #classname, #section, #instructor, #roomnum').change(validate);
});

function validate(){
    if ($('#fname').val().length   >   0   &&
        $('#lname').val().length  >   0   &&
        $('#email').val().length    >   0 &&
        $('#userid').val().length > 0 &&
        $('#classname').val().length > 0 &&
        $('#section').val().length    >   0 &&
        $('#instructor').val().length    >   0 &&
        $('#roomnum').val().length    >   0) {
        $("input[type=submit]").prop("disabled", false);
    }
    else {
        $("input[type=submit]").prop("disabled", true);
    }
}

   
  function removeRow(){
  var lastGroup = $('.modal-body').last();
  lastGroup.remove();
  return false;


  }


  
  
 
 </script>
  
 </body> 
 </html>
