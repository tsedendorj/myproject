<?php
session_start();
include '../includes/config.php'; 

if( !check_user($_SESSION['user'], $_SESSION['pass']) ){
  header('Location: login.php');
  die();
}

if( isset($_GET['delete']) ){
  $id = $_GET['delete'];
  delete_category($id);
  header('Location: category.php');
  die();
}


if( isset($_GET['submit']) ){
  
  $category = $_GET['ner'];
  
  if( empty($category) ){
    $msg = 'Уучлаарай! утгаа оруулна уу!';
  } else {
    //end hadgalah uildel bichigdene
    
    add_new_category($category);
  }
  
  
}
?>
<?php include '_header.php'; ?>
<?php include '_menu.php'; ?>
   
<div class="container">
  <div class="row">
    <div class="col-md-6">
      
      <div class="jumbotron">
        
        <?php if( isset($msg) ){ ?>
          <div class="alert alert-danger">
            <?php echo $msg; ?>
          </div>
        <?php } ?>
       
        <form action="" method="get">
          <div class="form-group">
            <label>Ангилал</label>
            <input type="text" name="ner" class="form-control">
          </div>
          <button type="submit" name="submit" class="btn btn-success">Нэмэх</button>
        </form>  
        
      </div>
      
    </div>
    <div class="col-md-6">
      
      <?php 
      
       $categories = get_all_category();

      ?>
      
      <table class="table table-bordered">
        <tr>
          <td>Дд</td>
          <td>Нэр</td>
          <td>Үйлдэл</td>
        </tr>
        <?php foreach($categories as $row){ ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td>
            <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Устгах</a>
          </td>
        </tr>
        <?php } ?>
      </table>
      
      
    </div>
  </div>
</div>    

<?php include '_footer.php'; ?>