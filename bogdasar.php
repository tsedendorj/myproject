<?php 
session_start();
include '../includes/config.php'; 

if( !check_user($_SESSION['user'], $_SESSION['pass']) ){
  header('Location: login.php');
  die();
}

if( isset($_GET['delete']) ){
  $id = $_GET['delete'];
  delete_new($id);
}






?>
<?php include '_header.php'; ?>
<?php include '_menu.php'; ?>
<?php include 'submenu.php'; ?>
<br>

<div class="container">
    <div class="col-md-4">
        <a href="addcall.php" class="btn btn-success btn-sm">Дуудлага нэмэх</a>
    
             </div>
    <br>
  <div class="row">
      
    <div class="col-md-10">
        
      
          <table id="mynewslist" class="table table-bordered table-striped" width="100%">
               
        <thead>
          <tr>
            <th>Дд</th>
            <th>Салбар</th>
            <th>Байр</th>
            <th>Төрөл</th>
            <th>Дугаар</th>
            <th width="100%">__________________Эрэлт________________</th>
            <th>Ээлжийн инженер</th>
            <th>Гүйцэтгэсэн ажилтан</th>
            <th>Төлөв</th>
            <th width="1000">Тайлбар</th>
            <th>created_at</th>
              <th>Үйлдэл</th>
          </tr>
        </thead>
        <tbody>
    
          <?php $allcall = get_all_callb(); ?>
          <?php foreach($allcall as $row){ ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php 
                    switch($row['category']){
               case '16': echo 'БОГД АР САЛБАР'; 
                         break;
               case '17': echo 'СХД ОРЧЛОН ХОРООЛОЛ';
                         break;
             }
                ?></td>
            <td><?php echo $row['turul']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td width="70%"><?php echo $row['description']; ?></td>
            <td ><?php echo $row['content']; ?></td>
            <td><?php echo $row['engineer']; ?></td>
            <td><?php echo $row['worker']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td><?php echo $row['exam']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td class="btn-group">
              <a href="editcall.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Засах</a>
              <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Энэ мэдээг устгахдаа итгэлтэй байна уу')">Устгах</a> 
                <a href="closed.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Хаах</a>
            </td>
             
          </tr>
          <?php } ?>
              
        </tbody>
             
      </table>
        <br>
        <form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
        </form>
    </div>
    
  </div>
</div>



<?php include '_footer.php'; ?>