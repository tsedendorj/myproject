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




<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
 <script>
      $(document).ready( function () {
          $('#mynews').DataTable( {
            language: {
                search: "Хайх:"
            }
          } );  
      } );
    </script>


<div class="container">
    <div class="col-md-4">
        <a href="addcall.php" class="btn btn-success btn-sm">Хэрэглэгч нэмэх</a>
    
             </div>
   
  <div class="row">
      
    <div class="col-sm-12">
        
      
          <table id="mynews" class="table table-striped" width="100%">
               
        <thead>
          <tr>
            <th>Дд</th>
            <th>Компани</th>
            <th>Дүүрэг</th>
            <th>Байр</th>
            <th>Тоот</th>
            <th width="100%">Хороо</th>
            <th>Хэрэглэгч</th>
            <th>Эзэмшигч</th>
            <th>Төлөв</th>
            <th width="1000">Ам Бүл</th>
              <th width="1000">Дугаар</th>
              <th width="1000">Байцаагч</th>
              <th width="1000">Өрөө</th>
              <th width="1000">Хэмжээ</th>
              <th width="1000">Нэмэлт</th>
            <th>created_at</th>
              <th>Үйлдэл</th>
          </tr>
        </thead>
        <tbody>
    
          <?php $allapart = get_all_apart(); ?>
          <?php foreach($allapart as $row){ ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php 
                    switch($row['company']){
               case '16': echo 'БОГД АР САЛБАР'; 
                         break;
               case '17': echo 'СХД ОРЧЛОН ХОРООЛОЛ';
                         break;
             }
                ?></td>
            <td><?php echo $row['dvvreg']; ?></td>
            <td><?php echo $row['bair']; ?></td>
            <td width="70%"><?php echo $row['toot']; ?></td>
            <td ><?php echo $row['horoo']; ?></td>
            <td><?php echo $row['hereglegch']; ?></td>
            <td><?php echo $row['ezemshigch']; ?></td>
            <td><?php echo $row['ambvl']; ?></td>
            <td><?php echo $row['dugaar']; ?></td>
              <td><?php echo $row['baitsaagch']; ?></td>
              <td><?php echo $row['uruu']; ?></td>
              <td><?php echo $row['hemjee']; ?></td>
              <td><?php echo $row['nemelt']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td class="btn-group">
              <a href="editcall.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Засах</a>
              <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Энэ мэдээг устгахдаа итгэлтэй байна уу')">Устгах</a> 
                <a href="editcall.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Хаах</a>
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