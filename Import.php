
<!DOCTYPE html>
<html lang="en">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Import Class Lists</title>
   <link href="dist/css/bootstrap.css" rel="stylesheet">
   <style type="text/css">
    
     
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
       <button type ="button" class = "btn btn-sm btn-primary" onclick="handleFileSelect()">Import Class List</button> 
       <button type ="button" class ="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Create a Class List</button> 
       <input type="file" id="the_file" required="required" accept=".csv" class="filestyle" data-classButton="btn btn-primary" data-buttonText="Choose a File to Import"/> 
        
       </form> 
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
   <div class="modal-dialog"> 
     <div class="modal-content"> 
       <div class="modal-header"> 
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button> 
         <h4 class="modal-title" id="myModalLabel">Create A New Class List</h4> 
         <input type ="text" class="input-large" placeholder = "Class Name/Section" required="required"/> 
         <input type ="text" class="input-small" placeholder = "Instructor" required="required"/> 
       </div> 
       <div class="modal-body"> 
         <input type ="text" class="input-small" placeholder ="First Name" required="required"/> 
         <input type ="text" class="input-small" placeholder ="Last Name" required="required"/> 
         <input type ="text" class="input-small" placeholder ="User Name" required ="required"/> 
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
  
  
  
     <div id="file_info"></div> 
     <div id="list"></div> 
   </div> 
   <script src = "dist/js/jquery-2.0.3.js"></script> 
   <script src = "dist/js/bootstrap.min.js"></script> 
   <script src = "dist/js/bootstrap-filestyle.min.js"></script> 
    
   <script type ="text/javascript">
  
   function fileInfo(e){ 
     var file = e.target.files[0]; 
    if (file.name.split(".")[1].toUpperCase() != "CSV"){ 
       alert('Invalid file format'); 
       e.target.parentNode.reset(); 
       return; 
     }else{ 
      
       document.getElementById('file_info').innerHTML = "<p>File Name: "+file.name + " | "+file.size+" Bytes.</p>"; 
     } 
   } 
  function handleFileSelect(){ 
   var file = document.getElementById("the_file").files[0]; 
   var fileReader = new FileReader(); 
   var link = (http://);
   fileReader.onload = function(file) { 
               var content = file.target.result; 
               var rows = file.target.result.split(/[rn|n]+/); 
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
