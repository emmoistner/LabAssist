
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
 if(!isset($_SESSION['Fname']) || $_SESSION['Instructor']==0) {
  header("location:index.php");
}

 ?>
 <body> 
   <div id="wrap">
     <h1>Classes</h1>
       </br> 
       </br> 
       <form action="createClass.php"method="post" name="createClass">
         
          <h3 class="modal-title" id="myModalLabel">Create A New Class</h3>  
       <div class="modal-header"> 
         TCMP <input type ="text" class="input-small" placeholder = "Course Number" name ="classname" id="classname" required="true"/> 
         <input type ="text" class="input-small" placeholder = "Section" name="section" id="section" required="true"/> 
         <input type ="text" class="input-small" placeholder = "Room Number" name ="roomnum" id="roomnum" required="true"/>  
         <input type ="text" class="input-small" placeholder = "Semester" name ="sem" id="sem" required="true"/>
         </br>
       </div>
         <p align = "right">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Clear</button> 
        <button type = "submit" name="submit" class = "btn btn-primary" data-dismiss="modal" onSubmit="validateInteger()">Create</button> 
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
          <form action ="ImportCSV.php" method="post" name="importClass"> 
         TCMP <input type ="text" class="input-small" placeholder = "Course Number" name ="classname2" required="true"/> 
         <input type ="text" class="input-small" placeholder = "Section" name ="section2" required="true"/> 
         <input type ="text" class="input-small" placeholder = "Room Number" name ="roomnum2" required="true"/> 
         <input type ="text" class="input-small" placeholder = "Semester" name="sem2" required="true"/>
       <div class ="modal-bodynew">
        </br>
        <h4 class="modal-title" id="myModalLabel1">Import Student List</h4> 
       <input type="file" id="the_file" required="required" accept=".csv" class="filestyle" data-classButton="btn btn-primary" data-buttonText="Choose a File to Import" name="the_file" /> 
       <p align = "right">
         <button type="reset" class="btn btn-default" data-dismiss="modal">Clear</button> 
         <button type="submit" class="btn btn-primary" data-dismiss="modal" onSubmit="validateInteger2()">Create</button> 
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




 




   
  function removeRow(){
  var lastGroup = $('.modal-body').last();
  lastGroup.remove();
  return false;


  }


function validateInteger(){
  var strValue = document.createClass.classname.value;
  var strValue2 = document.createClass.section.value;
  

  var fValue = parseFloat(strValue);
  var fValue2 = parseFloat(strValue2);
  

  if (isNaN(fValue) || isNaN(fValue2)){
    alert("Please enter an integer for the fields Course Number and Section");

  }


}

function validateInteger2(){
  var strValue = document.importClass.classname2.value;
  var strValue2 = document.importClass.section2.value;
  

  var fValue = parseFloat(strValue);
  var fValue2 = parseFloat(strValue2);
  

  if (isNaN(fValue) || isNaN(fValue2)){
    alert("Please enter an integer for the fields Course Number and Section");

  }


}

  
  
 
 </script>
  
 </body> 
 </html>
