<?php 
session_start();
include '../includes/config.php'; 

if( !check_user($_SESSION['user'], $_SESSION['pass']) ){
  header('Location: login.php');
  die();
} 

if( isset($_GET['id']) ){
  $id = $_GET['id'];
  $ajilchin = get_one_worker($id);
}else{
  header('Location: addworker.php');
  die();
}

if( isset($_GET['delete']) ){
  delete_img($id, $ajilchin[0]['image']);
  header('Location: edit_worker.php?id='.$id);
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
  
  if( is_null($ajilchin[0]['image']) ){
    if( upload_image($_FILES["zurag"]["tmp_name"], $_FILES["zurag"]["name"]) ){
      $i = basename($_FILES["zurag"]["name"]);
    }else{
      $error[] = 'Зураг хуулж чадсангүй дахин оролдоно уу';
    }
  }else{
    $i = $ajilchin[0]['image'];
  }
  
  
  if( empty($error) ){
    //hagalah uildel bn
    update_news($id, $a1, $a2, $a3, $a4, $a5, $i);
    header('Location:edit_news.php?id='.$id);
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
          value="<?php if( isset($a1) ){ echo $a1; }else{ echo $ajilchin[0]['owog']; } ?>">
        </div>
        
        <div class="form-group">
          <label>Нэр</label>
          <input type="text" name="ner" class="form-control" 
          value="<?php if( isset($a2) ){ echo $a2; }else{ echo $ajilchin[0]['ner']; } ?>">
        </div>
        
        <div class="form-group">
          <label>Утасны дугаар</label>
          <input type="text" name="dugaar" class="form-control"
          value="<?php if( isset($a3) ){ echo $a3; }else{ echo $ajilchin[0]['dugaar']; } ?>">
        </div>
          
          <div class="form-group">
          <label>Албан тушаал</label>
          <input type="text" name="albantushaal" class="form-control"
          value="<?php if( isset($a4) ){ echo $a4; }else{ echo $ajilchin[0]['albantushaal']; } ?>">
        </div>
        
        <div class="form-group">
          <label>Оршин суугаа хаяг, ажилласан жил,Дуртай спорт,Гоц чадвар Г.М ...</label>
          <textarea id="summernote" name="namtar" rows="6" class="form-control"><?php if(isset($a5)){ echo $a5; }else{ echo $ajilchin[0]['namtar']; } ?></textarea>
        </div>
        
        <button type="submit" name="submit" class="btn btn-success">Шинээр нэмэх</button>
        
      </div>
      
      
    </div>
    <div class="col-md-4">
      
      <div class="jumbotron">
       
        <div class="form-group">
          <label>Нүүрний зураг</label>
          <?php if( is_null($ajilchin[0]['image']) ){ ?>
            <input type="file" name="zurag" class="form-control">
          <?php }else{ ?>
            <img src="uploads/<?php echo $ajilchin[0]['image']; ?>" alt="" style="width:100%;">
            <a href="?id=<?php echo $id; ?>&delete=img">Ашиглаж байгаа зургийг солих уу?</a>
          <?php } ?>
        </div>
        
      </div>
      
    </div>
  </div>
</div>
</form>

<?php include '_footer.php'; ?>