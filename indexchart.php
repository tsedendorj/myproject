<?php
session_start();
include '../includes/config.php'; 

if( !check_user($_SESSION['user'], $_SESSION['pass']) ){
  header('Location: login.php');
  die();
}
?>
<?php
//index.php

$connect = new PDO('mysql:host=localhost;dbname=medeenii_site', 'root', '');
$query = "SELECT * FROM medee ORDER BY id DESC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchall();



?>

<?php include '_header.php'; ?>
<?php include '_menu.php'; ?>


<!DOCTYPE html>
<html>
 <head>
  <title>Үзүүлэлтүүд</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="http://code.highcharttable.org/2.0.0/jquery.highchartTable.js"></script> 
  <script src="http://highcharttable.org/js/highcharts.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>



 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Үзүүлэлтүүд</h3>
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
       <td>'.$row["created_at"].'</td>
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
    <button type="button" name="view_chart" id="view_chart" class="btn btn-info btn-lg">График үзэх</button>
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