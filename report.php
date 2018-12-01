<?php
session_start();
include '../includes/config.php';

if (!check_user($_SESSION['user'], $_SESSION['pass'])) {
    header('Location: login.php');
    die();
}
?>

<?php include '_header.php'; ?>
<?php include '_menu.php'; ?>

<?php
if ($_GET['date1'] && $_GET['date2']) {
    $from_date = $_GET['date1'];
    $to_date = $_GET['date2'];
} else {
    echo $from_date = date('Y-m-d');
    echo $to_date = date("Y-m-d", strtotime("$from_date +7 day"));
}

$inputType = '';

$query = 'SELECT turul, count(*) as number FROM operation ';
$query .= 'WHERE created_at BETWEEN "' . $from_date . '" and "' . $to_date . '" ';

if ($_GET['inputType']) {
    $inputType = $_GET['inputType'];
    $query .= 'AND turul = "' . $inputType . '" ';
}
$query .= 'GROUP BY turul';

$result = $conn->query($query);
$result_table = $conn->query($query);
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart()
    {
        var data = google.visualization.arrayToDataTable([
            ['Төрөл', 'Number'],
        <?php
        while ($row = mysqli_fetch_array($result)) {
            echo "['" . $row["turul"] . "', " . $row["number"] . "],";
        }
        ?>
        ]);
        var options = {
            title: '',
            //is3D:true,  
            pieHole: 0.4
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>

<div class="container">
    <div class="row" style="margin-top: 30px;">
        <div class="col-md-5">
            <div class="jumbotron">
                <form action="" method="get">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">StartDate</label>
                            <input type="text" class="form-control" id="date1" name="date1" value="<?php echo $from_date ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">EndDate</label>
                            <input type="text" class="form-control" id="date2" name="date2" value="<?php echo $to_date; ?>">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputState">Type</label>
                            <select name="inputType" id="inputType" class="form-control">
                                <option value="">-Бүгд-</option>
                                <?php $moods = get_all_mood(); ?>
                                <?php foreach ($moods as $row) { ?> 
                                    <option <?php
                                    if ($row['name'] == $inputType) {
                                        echo 'selected';
                                    }
                                    ?> value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                    <?php } ?>
                            </select>
                        </div>
                        
                        
                        
                        
                        <div class="form-group col-md-12">
                            <label for="inputState">Type</label>
                            <select name="inputType" id="inputType" class="form-control">
                                <option value="">-Бүгд-</option>
                                <?php $moods = get_all_salbar(); ?>
                                <?php foreach ($moods as $row) { ?> 
                                    <option <?php
                                    if ($row['name'] == $inputType) {
                                        echo 'selected';
                                    }
                                    ?> value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                    <?php } ?>
                            </select>
                        </div>
                        
                        
                        
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

        <div class="col-md-7">
            <h3>Төрлөөр</h3>
            <div id="piechart" style="width: 900px; height: 500px;"></div>         
        </div>

        <div class="col-md-12">
            <table class="table table-bordered">
                <tr>
                    <td>Д/Д</td>
                    <td>Төрөл</td>
                    <td>Нийт</td>
                    <td>Үүсгэсэн</td>                        
                </tr>
                <?php $counter = 1; ?>
                <?php while ($row_another = mysqli_fetch_array($result_table)) { ?>
                    <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $row_another['turul']; ?></td>
                        <td><?php echo $row_another['number']; ?></td>
                        <td>...</td>                        
                    </tr>
                    <?php
                    $counter++;
                }
                ?>
            </table>

            <?php 
            function get_count($date, $name){                
                global $conn;
                $result = $conn->query('SELECT turul, count(*) as number FROM operation WHERE DATE_FORMAT(created_at, "%Y-%m-%d") = "' . $date . '" AND turul = "'.$name.'"');
                while ($row = mysqli_fetch_array($result)) {
                    return $row["number"];
                }
            }
            
            $temp_array = array();            
            foreach (get_all_mood() as $row) {
                $temp_array[] = $row['name'];                
            }
            $result_chart_title = "'" . implode ( "', '", $temp_array ) . "'";
            ?>
            
            <h3>Өдрөөр　/7 хоног/</h3>

            <script type="text/javascript">
                google.charts.load('current', {'packages': ['bar']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    
                    var data = google.visualization.arrayToDataTable([
                     
                    ['Огноо', <?php echo $result_chart_title; ?>],
                     
                     
                     <?php for ( $i =  strtotime($from_date); $i <= strtotime($to_date); $i = $i + 86400 ): $thisDate = date( 'Y-m-d', $i ); ?>
                        ['<?php echo $thisDate; ?>', <?php $numItems = count(get_all_mood()); $ii = 0; foreach (get_all_mood() as $row) { echo get_count($thisDate, $row['name']); if(++$ii === $numItems) { }else{ echo ','; } } ?>],
                     <?php endfor; ?>
                     ]);

                    var options = {
                        chart: {
                            title: '',
                            subtitle: '',
                        }
                    };

                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }
            </script>

            <div id="columnchart_material" style="width: 100%; height: 500px; margin-bottom: 300px;"></div>

        </div>
    </div>
</div>

<?php include '_footer.php'; ?>