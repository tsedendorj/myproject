<?php 
session_start();
require 'functions/config.php'; 

if( !check_user($_SESSION['u'], $_SESSION['p']) ){
  header('Location: login.php');
  die();
}


if( isset($_GET['delete']) ){
  $id = $_GET['delete'];
  delete_news($id);
  header('Location: post_list.php?success=delete');
  die();
}

$all_post = get_all_post();
  
?>
<?php include '_header.php'; ?>

<div class="container">
  <div class="row">
   
   <div class="col-md-12">
   
    <?php if( isset($_GET['success']) ): ?>
    <div class="alert alert-success">
      Амжилттай утгагдлаа
    </div>
    <?php endif; ?>
    
    <table class="table">
      <thead>
        <tr>
          <th>Дд</th>
          <th>Зураг</th>
          <th>Гарчиг</th>
          <th>Ангилал</th>
          <th>Огноо</th>
          <th>Үйлдэл</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($all_post as $row): ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><img src="/uploads/<?php echo $row['image']; ?>" style="width:150px;"></td>
          <td><?php echo $row['title']; ?></td>
          <td><?php echo $row['category']; ?></td>
          <td><?php echo $row['created_at']; ?></td>
          <td>
            <a href="edit_post.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm" style="color:#fff;">Засах</a>
            <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Энэ мэдээг устгахдаа итгэлтэй байна уу?')">Устгах</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    
   </div>
    
  </div>
</div>







<?php include '_footer.php'; ?>