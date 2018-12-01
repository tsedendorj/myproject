<?Php
       
    $dbhost = 'localhost';
    $dbname = 'medeenii_site';  
    $dbuser = 'root';                  
    $dbpass = ''; 
    
    
    try{
        
        $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }catch(PDOException $ex){
        
        die($ex->getMessage());
    }
    $stmt=$dbcon->prepare("SELECT * FROM operation");
    $stmt->execute();
    $json= [];
    $json2= [];
    while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $json[]= $created_at;
        $json2[]= (int)$id;
        
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Тайлан</title>
</head>
<body>
    <h1>График</h1>
<div style="width: 400px; height: 200px;">
<canvas id="myChart"></canvas>
</div>
<div style="width: 400px; height: 200px;">
<canvas id="myChart1"></canvas>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: <?php echo json_encode($json); ?>,
        datasets: [{
            label: "Amounts Per Title",
            backgroundColor: 'lightblue',
            borderColor: 'red',
            data: <?php echo json_encode($json2); ?>,
        }]
    },

    // Configuration options go here
    options: {}
});
var ctx = document.getElementById('myChart1').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
    data: {
        labels: <?php echo json_encode($json); ?>,
        datasets: [{
            label: "Amounts Per Title",
            backgroundColor: 'blue',
            borderColor: 'red',
            data: <?php echo json_encode($json2); ?>,
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
</body>
</html>