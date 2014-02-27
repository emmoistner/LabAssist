
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
    
     
   </style> 
 </head>
 
 <?php
 
 
 require ('nav.php');
 require ('includeJS.php');
 require ('files.php');
 require ('connect.php');

 ?>
 <body> 
   <div id="wrap">
     <h1>Classes</h1>
       </br> 
       </br> 
       <form action="CreateClassList.php"method="post">
         <h3 class="modal-title" id="myModalLabel">Create a New Class List</h3>
       </br>
          <h4 class="modal-title" id="myModalLabel">Create A New Class</h4>  
       <div class="modal-header"> 
         <input type ="text" class="input-small" placeholder = "Class Name" name ="classname" id="classname"required="true"/> 
         <input type ="text" class="input-small" placeholder = "Instructor" name ="instructor" id="instructor"required/> 
         <input type ="text" class="input-small" placeholder = "Section" name="section" id="section" required/> 
         <input type ="text" class="input-small" placeholder = "Room Number" name ="roomnum" id="roomnum" required/>  
         </br>
       </div>
        <h4 class="modal-title" id="myModalLabel2">Create the Student List</h4> 
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
        <p align = "right">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Clear</button> 
        <button type = "submit" name="submit" class = "btn btn-primary" data-dismiss="modal">Create</button> 
      </p>
       
     </form>

 </br>
</br>

     <h3 class="modal-title" id="myModalLabel">Import a Class List</h3> 
       <div class="modal-header"> 
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button> 
         </div>
          <h4 class="modal-title" id="myModalLabel">Create the Class</h4> 
        </br>
          <form action ="ImportCSV.php" method="post"> 
         <input type ="text" class="input-small" placeholder = "Class Name" name ="classname2" required="required"/> 
         <input type ="text" class="input-small" placeholder = "Instructor" name ="instructor2" required="required"/> 
         <input type ="text" class="input-small" placeholder = "Section" name ="section2" required="required"/> 
         <input type ="text" class="input-small" placeholder = "Room Number" name ="roomnum2" required="required"/> 
       <div class ="modal-bodynew">
        </br>
        <h4 class="modal-title" id="myModalLabel1">Import Student List</h4> 
       <input type="file" id="the_file" required="required" accept=".csv" class="filestyle" data-classButton="btn btn-primary" data-buttonText="Choose a File to Import" name="the_file" /> 
       <p align = "right">
         <button type="reset" class="btn btn-default" data-dismiss="modal">Clear</button> 
         <button type="submit" class="btn btn-primary" data-dismiss="modal">Create</button> 
       </p>
       </div> 
       </form>


       </br>
       </br> 
       <div id ="error" class="alert alert-warning alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Warning!</strong> File extension must be .CSV!
</div>
     <div id="file_info"></div> 
     <div id="list"></div> 


     


     
     
   

   



   
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
