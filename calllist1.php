<?php 
session_start();
include '../includes/config.php'; 

if( !check_user($_SESSION['user'], $_SESSION['pass']) ){
  header('Location: login.php');
  die();
}

if( isset($_GET['delete']) ){
  $id = $_GET['delete'];
  delete_news($id);
}




?>


<title>Хүснэгт</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<title>Хүснэгт</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">




<?php include '_header.php'; ?>
<?php include '_menu.php'; ?>
<?php include 'submenu.php'; ?>
<br>

<?php  
 $connect = mysqli_connect("localhost", "root", "", "medeenii_site");  
 $query ="SELECT * FROM operation ORDER BY id desc";  
 $result = mysqli_query($connect, $query);  
 ?>  

<div class="container">
    <div class="col-md-4">
    
             </div>
  <div class="row">
      
    <div class="col-md-10">
      <form>
      
          <table id="mynewslist" class="table table-bordered table-striped">
               
        <thead>
          <tr>
            <th>Дд</th>
            <th>Салбар</th>
            <th>Байр</th>
            <th>Төрөл</th>
            <th>Дугаар</th>
            <th width="5%">Эрэлт</th>
            <th>Ээлжийн инженер</th>
            <th>Гүйцэтгэсэн ажилтан</th>
            <th>Төлөв</th>
            <th width="50%">Тайлбар</th>
            <th>created_at</th>
              <th>Үйлдэл</th>
          </tr>
        </thead>
        <tbody>
    
          <?php $allcall1 = get_all_call1(); ?>
          <?php foreach($allcall1 as $row){ ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['category'] ?></td>
            <td><?php echo $row['turul']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['content']; ?></td>
            <td><?php echo $row['engineer']; ?></td>
            <td><?php echo $row['worker']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td><?php echo $row['exam']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
           
          </tr>
          <?php } ?>
              
        </tbody>
              
      </table>
        </form>
    </div>
  </div>
</div>


        
    <form method="post" class="form" action="export.php">
		<input type="date" name="fecha1">
		<input type="date" name="fecha2">
		<input type="submit" name="generar_reporte" value="Export">
		</form>
<form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>



<?php include '_footer.php'; ?>