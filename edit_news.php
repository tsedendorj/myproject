<?php 
session_start();
include '../includes/config.php'; 

if( !check_user($_SESSION['user'], $_SESSION['pass']) ){
  header('Location: login.php');
  die();
} 

if( isset($_GET['id']) ){
  $id = $_GET['id'];
  $medee = get_one_news($id);
}else{
  header('Location: add_news.php');
  die();
}

if( isset($_GET['delete']) ){
  delete_img($id, $medee[0]['image']);
  header('Location: edit_news.php?id='.$id);
  die();
}

if( isset($_POST['submit']) ){
  $c = $_POST['angilal'];
  $t = $_POST['garchig'];
  $d = $_POST['tailbar'];
  $b = $_POST['aguulga'];
  
  $error = array();
  
  if( empty($t) ){
    $error[] = 'Гарчиг хоосон байна утгаа оруул';
  }
  if( empty($d) ){
    $error[] = 'Тайлбар хоосон байна утгаа оруул';
  }
  if( empty($b) ){
    $error[] = 'Агуулга хоосон байна утгаа оруул';
  }
  
  if( is_null($medee[0]['image']) ){
    if( upload_img($_FILES["zurag"]["tmp_name"], $_FILES["zurag"]["name"]) ){
      $i = basename($_FILES["zurag"]["name"]);
    }else{
      $error[] = 'Зураг хуулж чадсангүй дахин оролдоно уу';
    }
  }else{
    $i = $medee[0]['image'];
  }
  
  
  if( empty($error) ){
    //hagalah uildel bn
    update_news($id, $c, $t, $d, $b, $i);
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
          <label>Ангилал</label>
          <select name="angilal" class="form-control">
            <?php $categories = get_all_category(); ?>
            <?php foreach($categories as $row){ ?> 
            <?php 
              if($row['id']==$medee[0]['category']){
                $text = 'selected';
              } else{
                $text = '';
              }
            ?>
            <option value="<?php echo $row['id']; ?>" <?php echo $text; ?>><?php echo $row['name']; ?></option>
            <?php } ?>
          </select>
        </div>
        
        <div class="form-group">
          <label>Гарчиг</label>
          <input type="text" name="garchig" class="form-control" 
          value="<?php if( isset($t) ){ echo $t; }else{ echo $medee[0]['title']; } ?>">
        </div>
        
        <div class="form-group">
          <label>Богино тайлбар</label>
          <input type="text" name="tailbar" class="form-control"
          value="<?php if( isset($d) ){ echo $d; }else{ echo $medee[0]['description']; } ?>">
        </div>
        
        <div class="form-group">
          <label>Мэдээний агуулга</label>
          <textarea id="summernote" name="aguulga" rows="6" class="form-control"><?php if(isset($b)){ echo $b; }else{ echo $medee[0]['content']; } ?></textarea>
        </div>
        
        <button type="submit" name="submit" class="btn btn-success">Шинээр нэмэх</button>
        
      </div>
      
      
    </div>
    <div class="col-md-4">
      
      <div class="jumbotron">
       
        <div class="form-group">
          <label>Нүүрний зураг</label>
          <?php if( is_null($medee[0]['image']) ){ ?>
            <input type="file" name="zurag" class="form-control">
          <?php }else{ ?>
            <img src="uploads/<?php echo $medee[0]['image']; ?>" alt="" style="width:100%;">
            <a href="?id=<?php echo $id; ?>&delete=img">Ашиглаж байгаа зургийг солих уу?</a>
          <?php } ?>
        </div>
        
      </div>
      
    </div>
  </div>
</div>
</form>

<?php include '_footer.php'; ?>