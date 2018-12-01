<?php

session_start();
include '../includes/config.php'; 

if( !check_user($_SESSION['user'], $_SESSION['pass']) ){
  header('Location: login.php');
  die();
}

//index.php

$connect = new PDO('mysql:host=localhost;dbname=medeenii_site', 'root', '');
$query = "SELECT * FROM medee ORDER BY id ASC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Display HTML Table Data on Chart in PHP using HighChartTable Plugin</title>
 <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>



 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Display HTML Table Data on Chart in PHP using HighChartTable Plugin</h3>
   <br />
   
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="for_chart">
     <thead>
      <tr>
       <th width="20%">Цаг</th>
       <th width="40%">Тэц-ийн өгөх</th>
       <th width="40%">Тэц-ийн буцах</th>
      </tr>
     </thead>
     <?php
     foreach($result as $row)
     {
      echo '
      <tr>
       <td>'.$row["1 цаг 2 цаг 3 цаг"].'</td>
       <td>'.$row["p1bat"].'</td>
       <td>'.$row["p2bat"].'</td>
      </tr>
      ';
     }
     ?>
    </table>
   </div>
   <br />
   <div id="chart_area" id="Student Admission & Passout Details">

   </div>
   <br />
   <div align="center">
    <button type="button" name="view_chart" id="view_chart" class="btn btn-info btn-lg">View Data in Chart</button>
   </div>
   <br />
   <br />
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
  
 $('#chart_area').dialog({
  autoOpen: false,
  width: 1000,
  height:500
 });

 $('#view_chart').click(function(){
  $('#for_chart').data('graph-container', '#chart_area');
  $('#for_chart').data('graph-type', 'column');
  $('#chart_area').dialog('open');
  $('#for_chart').highchartTable();
 });

});
</script>