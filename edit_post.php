<?php 
session_start();
require 'functions/config.php'; 

if( !check_user($_SESSION['u'], $_SESSION['p']) ){
  header('Location: login.php');
  die();
}

if( isset($_GET['id']) ){
  $id = $_GET['id'];
  $single_post = get_one_post($id);
}else{
  header('Location: add_post.php');
  die();
}

if(isset($_GET['delete'])){
  delete_file($id, $single_post[0]['image']);
  header('Location: edit_post.php?id='.$id);
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
  
  if( is_null($single_post[0]['image']) ){
    
    if( upload_file($_FILES['zurag']['tmp_name'], $_FILES['zurag']['name']) ){
      $i = basename($_FILES['zurag']['name']);
    }else{
      $error[] = 'Зураг хуулж чадсангүй дахин оролдож үзнэ үү';
    }
    
  }else{
    $i = $single_post[0]['image'];
  }
  
  
  if( empty($error) ){
    // save 
    update_post($id, $c, $t, $d, $a, $i);
    header('Location: edit_post.php?id='.$id);
    die();
  }
}


?>
<?php include '_header.php'; ?>


<?php //var_dump($single_post); ?>


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
              <?php 
                if($row['id']==$single_post[0]['category'] ){ 
                  $txt='selected'; 
                }else{
                  $txt=''; 
                }
              ?>
              <option value="<?php echo $row['id']; ?>" <?php echo $txt; ?>><?php echo $row['name']; ?></option>
              <?php } ?>

            </select>
          </div>
          
          <div class="form-group">
            <label for="">Мэдээний гарчиг</label>
            <input type="text" name="garchig" class="form-control" value="<?php if(isset($t)){ echo $t; }else{ echo $single_post[0]['title']; } ?>">
          </div>
          
          <div class="form-group">
            <label for="">Богино тайлбар</label>
            <input type="text" name="tailbar" class="form-control" value="<?php if(isset($d)){ echo $d; }else{ echo $single_post[0]['description']; } ?>">
          </div>
          
          <div class="form-group">
            <label for="">Үндсэн мэдээний агуулга</label>
            <textarea id="summernote" name="aguulga" rows="10" class="form-control"><?php if(isset($a)){ echo $a; }else{ echo $single_post[0]['content']; } ?></textarea>
          </div>
          
          <button type="submit" name="submit" class="btn btn-success">Хадгалах</button>
        
      </div>
    </div>
    <div class="col-md-4">
     
      <div class="adminbox">
        <div class="form-group">
          <label for="">Мэдээний нүүр зураг</label>
          
          <?php if( is_null($single_post[0]['image']) ){ ?>
            <input type="file" name="zurag" class="form-control">
          <?php }else{ ?>
            <img src="/uploads/<?php echo $single_post[0]['image']; ?>" style="width: 100%;">
            <a href="?delete=img&id=<?php echo $id; ?>">Ашиглаж байгаа зургийг солих уу?</a>
          <?php } ?>
        </div>
      </div>
      
    </div>
  </div>
</div>
</form>

<?php include '_footer.php'; ?>