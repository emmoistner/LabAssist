
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
 
 require ('connect.php');
 require ('nav.php');
 require ('includeJS.php');
 ?>
 <body> 
  
   <div id="wrap"> 
     <h1>Classes</h1> 
    <form action="javascript:void(0);" id="the_form"> 
        
       </br> 
       </br> 
       <button id ="popover" type ="button" class = "btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal2" >Import Class List</button> 
       <button type ="button" class ="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Create a Class List</button> 
       <input type="file" id="the_file" required="required" accept=".csv" class="filestyle" data-classButton="btn btn-primary" data-buttonText="Choose a File to Import" /> 
        
       </form> 
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
   <div class="modal-dialog"> 
     <div class="modal-content"> 
       <div class="modal-header"> 
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button> 
         <h4 class="modal-title" id="myModalLabel">Create A New Class List</h4> 
         <input type ="text" class="input-small" placeholder = "Class Name" required="required"/> 
         <input type ="text" class="input-small" placeholder = "Instructor" required="required"/> 
         <input type ="text" class="input-small" placeholder = "Section" required="required"/> 
         </br>
         </br>
         <input type ="text" class="input-small" placeholder = "Course ID" required="required"/> 
         <input type ="text" class="input-small" placeholder = "Room Number" required="required"/> 
       </div> 
       <div class="modal-body"> 
         <input type ="text" class="input-small" placeholder ="First Name" required="required"/> 
         <input type ="text" class="input-small" placeholder ="Last Name" required="required"/> 
         <input type ="text" class="input-small" placeholder ="User Name" required ="required"/> 
         </br>
         </br>
         <button type ="button" class = "btn btn-sm btn-primary" onclick="addRow()">Add</button> 
         <button type ="button" class = "btn btn-sm btn-primary deleteRow">Delete</button>  
          
       </div> 
       <div class="modal-footer"> 
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
         <button type="button" class="btn btn-primary">Create</button> 
       </div> 
     </div><!-- /.modal-content --> 
   </div><!-- /.modal-dialog --> 
 </div><!-- /.modal --> 
 
 <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
   <div class="modal-dialog"> 
     <div class="modal-content"> 
       <div class="modal-header"> 
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button> 
         <h4 class="modal-title" id="myModalLabel">Create the Class</h4> 
         <input type ="text" class="input-small" placeholder = "Class Name" required="required"/> 
         <input type ="text" class="input-small" placeholder = "Instructor" required="required"/> 
         <input type ="text" class="input-small" placeholder = "Section" required="required"/> 
         </br>
         </br>
         <input type ="text" class="input-small" placeholder = "Course ID" required="required"/> 
         <input type ="text" class="input-small" placeholder = "Room Number" required="required"/> 
       </div> 
       
       <div class="modal-footer"> 
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
         <button type="button" class="btn btn-primary" onclick="handleFileSelect()" data-dismiss="modal">Create</button> 
       </div> 
     </div><!-- /.modal-content --> 
   </div><!-- /.modal-dialog --> 
 </div><!-- /.modal --> 
  
  
  
     <div id="file_info"></div> 
     <div id="list"></div> 
     <div id ="error" class="alert alert-warning alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Warning!</strong> File extension must be .CSV!
</div>
     


     
     
   </div> 
   
   <?php
   
   $con = mysqli_connect(/*domain of database, username, password,  name of database*/);
   if (mysqli_connect_errno()){
   echo "Failure to connect to database";
   
   }
   $result = mysqli_query($con, "SELECT * FROM ");
   
   while($row = mysqli_fetch_array($result)){
	echo $row['Class Name'].$row['Instructor'];   
   
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

                for (var j = 0; j < arr.length; j++){
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
  lastGroup.clone().insertAfter(lastGroup); 
  return false; 
  } 
   
  $(document).on('click','.deleteRow',function(){ 
  $(this).parent('div').remove(); 
  return false;}); 
  
  
 
 </script>
  
 </body> 
 </html>