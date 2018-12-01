<?php
ob_start();
error_reporting(0);
// connection
$db_conx = mysqli_connect("localhost", "root", "", "medeenii_site");
// Evaluate the connection
if (mysqli_connect_errno()) {
    echo mysqli_connect_error("Our database server is down at the moment. :(");
    exit();
} 

$months = array();
$expenses = array();
$revenues = array();
//Get list from db
$count = 0;
$sql = mysqli_query($db_conx, "SELECT * FROM medee order by id DESC");
while($row = mysqli_fetch_array($sql)){
	$expense[]	= round($row['p1bodit'],1);
	$revenue[]	=  round($row['p2bodit'],1);
	$months[]	  =  date('H:i', strtotime($row['created_at']));
	$count = $count +1;
}
if($_POST['type']==""){$_POST['type']='Bar';}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ТЭЦ-ийн өгөхийн Батлагдсан Даралт .... <br> ТЭЦ-ийн буцахын Батлагдсан Даралт .... </title>
</head>

<body>
<h1>ТЭЦ-ийн өгөхийн Батлагдсан Даралт .... ата <br> ТЭЦ-ийн буцахын Батлагдсан Даралт ....ата </h1>

<form name="Form" id="Form" method="post" action="#">
    <select name="type" id="type" onchange="submit()">
    	<option value="Bar" <?php if($_POST['type']=='Bar'){echo 'selected';}?>>Bar</option>
        <option value="Line" <?php if($_POST['type']=='Line'){echo 'selected';}?>>Line</option>
        <option value="Area" <?php if($_POST['type']=='Area'){echo 'selected';}?>>Area</option>
        <option value="Donut"  <?php if($_POST['type']=='Donut'){echo 'selected';}?>>Donut</option>
    </select>
</form>
<div id="Chart" style="width:60%"></div>
    <!-- jQuery cdn -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>    
<script>

//new Morris.Bar({
new Morris.<?php echo $_POST['type']; ?>({
  // ID of the element in which to draw the chart.
  element: 'Chart',
  // The name of the data record attribute that contains x-values.
  xkey: 'month',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['r','e'],
  // Labels for the ykeys -- will be displayed when you hover over the chart.
  labels: ['Revenue','Expense'],
  
  hideHover: 'auto',
  lineColors: ['#26B99A', '#34495E'],
  // Chart data records -- each entry in this array corresponds to a point on the chart.
  data: [
  <?php for($j=0;$j<$count-1;$j++) {  ?>
    { month: '<?php echo $months[$j]; ?>', r: <?php echo $revenue[$j]; ?> , e: <?php echo $expense[$j]; ?>},
	  <?php }  ?>
    { month: '<?php echo $months[$count-1]; ?>', r: <?php echo $revenue[$count-1]; ?> ,e: <?php echo $expense[$count-1]; ?>}
	],
            
  resize: true
});
</script>
</body>
</html>