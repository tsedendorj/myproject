<?php 
session_start();
require 'functions/config.php'; 

if( !check_user($_SESSION['u'], $_SESSION['p']) ){
  header('Location: login.php');
  die();
}

if( isset($_POST['submit']) ){
  
  $c = $_POST['angilal'];
  $t = $_POST['garchig'];
  $d = $_POST['tailbar'];
  $a = $_POST['aguulga'];
  
  
  $error = array();
  
  if( empty($t) ){
    $error[] = 'Гарчиг хоосон байна оруулна уу';
  }
  if( empty($d) ){
    $error[] = 'Тайлбар хоосон байна оруулна уу';
  }
  if( empty($a) ){
    $error[] = 'Агуулга хоосон байна оруулна уу';
  }
  
  if( upload_file($_FILES['zurag']['tmp_name'], $_FILES['zurag']['name']) ){
    $i = basename($_FILES['zurag']['name']);
  }else{
    $error[] = 'Зураг хуулж чадсангүй дахин оролдож үзнэ үү';
  }
  
  if( empty($error) ){
    // save 
    add_new_post($c, $t, $d, $a, $i);
    $id = $conn->insert_id;
    header('Location: edit_post.php?id='.$id);
    die();
  }
}


?>
<?php include '_header.php'; ?>

<form action="" method="post" enctype="multipart/form-data">
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="adminbox">
      
        <h3>Шинээр мэдээ нэмэх хэсэг</h3>
        
        <?php if( !empty($error) ){ ?>
        <div class="alert alert-danger">
          <ul>
            <li>
              <?php echo implode('</li><li>',$error); ?>
            </li>
          </ul>
        </div>
        <?php } ?>
        
          <div class="form-group">
            <label for="">Ангилал</label>
            <select name="angilal" class="form-control">
              <?php $categories = get_all_category(); ?>
              <?php foreach($categories as $row){ ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
              <?php } ?>

            </select>
          </div>
          
          <div class="form-group">
            <label for="">Мэдээний гарчиг</label>
            <input type="text" name="garchig" class="form-control" value="<?php if(isset($t)){ echo $t; } ?>">
          </div>
          
          <div class="form-group">
            <label for="">Богино тайлбар</label>
            <input type="text" name="tailbar" class="form-control" value="<?php if(isset($d)){ echo $d; } ?>">
          </div>
          
          <div class="form-group">
            <label for="">Үндсэн мэдээний агуулга</label>
            <textarea id="summernote" name="aguulga" rows="10" class="form-control"><?php if(isset($a)){ echo $a; } ?></textarea>
          </div>
          
          <button type="submit" name="submit" class="btn btn-success">Шинээр нэмэх</button>
        
      </div>
    </div>
    <div class="col-md-4">
     
      <div class="adminbox">
        <div class="form-group">
          <label for="">Мэдээний нүүр зураг</label>
          <input type="file" name="zurag" class="form-control">
        </div>
      </div>
      
    </div>
  </div>
</div>
</form>

<?php include '_footer.php'; ?>