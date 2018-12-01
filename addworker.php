<?php 
session_start();
include '../includes/config.php'; 

if( !check_user($_SESSION['user'], $_SESSION['pass']) ){
  header('Location: login.php');
  die();
} 

if( isset($_POST['submit']) ){
  $a1 = $_POST['owog'];
  $a2 = $_POST['ner'];
  $a3 = $_POST['dugaar'];
  $a4 = $_POST['albantushaal'];
  $a5 = $_POST['namtar'];
  
  $error = array();
  
  if( empty($a1) ){
    $error[] = 'Овог хоосон байна утгаа оруул';
  }
  if( empty($a2) ){
    $error[] = 'Нэр хоосон байна утгаа оруул';
  }
  if( empty($a3) ){
    $error[] = 'Дугаар хоосон байна утгаа оруул';
  }
  
  if( upload_image($_FILES["zurag"]["tmp_name"], $_FILES["zurag"]["name"]) ){
    $i = basename($_FILES["zurag"]["name"]);
  }else{
    $error[] = 'Зураг хуулж чадсангүй дахин оролдоно уу';
  }
  
  if( empty($error) ){
    //hagalah uildel bn
    add_worker($a1, $a2, $a3, $a4, $a5, $i);
    $id = $conn->insert_id;
    header('Location:edit_worker.php?id='.$id);
    die();
  }
}


?>
<?php include '_header.php'; ?>
<?php include '_menu.php'; ?>

<form action="" method="post" enctype="multipart/form-data">
<div class="container">
  <div class="row">
    <div class="col-md-8">
    
      <div class="jumbotron">
       
        <?php if( !empty($error) ){ ?>
        <div class="alert alert-danger">
          <h6 style="color: #ff0000;">АНХААР!</h6>
          <ul>
            <li>
            <?php echo implode('</li><li>', $error); ?>
            </li>
          </ul>
        </div>
        <?php } ?>
        
       <div class="form-group">
          <label>Овог</label>
          <input type="text" name="owog" class="form-control" 
          value="<?php if( isset($a1) ){ echo $a1; } ?>">
        </div>
        
        <div class="form-group">
          <label>Нэр</label>
          <input type="text" name="ner" class="form-control" 
          value="<?php if( isset($a2) ){ echo $a2; } ?>">
        </div>
          <div class="form-group">
          <label>Утасны дугаар</label>
          <input type="text" name="dugaar" class="form-control" 
          value="<?php if( isset($a3) ){ echo $a3; } ?>">
        </div>
        <div class="form-group">
          <label>Албан тушаал</label>
          <input type="text" name="albantushaal" class="form-control"
          value="<?php if( isset($a4) ){ echo $a4; } ?>">
        </div>
        
        <div class="form-group">
          <label>Оршин суугаа хаяг, ажилласан жил,Дуртай спорт,Гоц чадвар Г.М ...</label>
          <textarea id="summernote" name="namtar" rows="6" class="form-control"><?php if(isset($a5)){ echo $a5; } ?></textarea>
        </div>
        
        <button type="submit" name="submit" class="btn btn-success">Шинээр нэмэх</button>
        
      </div>
      
      
    </div>
    <div class="col-md-4">
      
      <div class="jumbotron">
       
        <div class="form-group">
          <label>Нүүрний зураг</label>
          <input type="file" name="zurag" class="form-control">
        </div>
        
      </div>
      
    </div>
  </div>
</div>
</form>

<?php include '_footer.php'; ?>