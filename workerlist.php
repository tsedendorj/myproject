<?php 
session_start();
include '../includes/config.php'; 
 
if( !check_user($_SESSION['user'], $_SESSION['pass']) ){
  header('Location: login.php');
  die();
}
 
if( isset($_GET['delete']) ){
  $id = $_GET['delete'];
  delete_worker($id);
}
 
 
?>
<?php include '_header.php'; ?>
<?php include '_menu.php'; ?>
 
<div class="container">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
       
      <table id="mynewslist" class="table">
        <thead>
          <tr>
            <th>Дд</th>
            <th>Зураг</th>
            <th>Овог</th>
            <th>Нэр</th>
            <th>Утасны дугаар</th>
              <th>Албан тушаал</th>
               <th>Огноо</th>
            <th>Үйлдэл</th>
          </tr>
        </thead>
        <tbody>
          <?php $allworkers = get_all_worker(); ?>
          <?php foreach($allworkers as $row){ ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><img src="uploads/<?php echo $row['image']; ?>" style="width:150px;"></td>
            <td><?php echo $row['owog']; ?></td>
            <td><?php echo $row['ner']; ?></td>
              <td><?php echo $row['dugaar']; ?></td>
              <td><?php echo $row['albantushaal']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td class="btn-group">
              <a href="edit_worker.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Засах</a>
              <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Энэ мэдээг устгахдаа итгэлтэй байна уу')">Устгах</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
       
    </div>
    <div class="col-md-1"></div>
  </div>
</div>
 
 
 
<?php include '_footer.php'; ?>