<?php 
session_start();
include '../includes/config.php'; 

if( !check_user($_SESSION['user'], $_SESSION['pass']) ){
  header('Location: login.php');
  die();
} 

if( isset($_POST['submit']) ){
  $s = $_POST['salbar'];
  $t = $_POST['garchig'];
  $w = $_POST['tur'];
  $d = $_POST['dugaar'];
  $b = $_POST['erelt'];
   $e = $_POST['engineer'];
   $a = $_POST['ajiltan'];
   $q = $_POST['tuluv'];
   $r = $_POST['tailbar'];
  
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
  
  if( upload_img($_FILES["zurag"]["tmp_name"], $_FILES["zurag"]["name"]) ){
    $i = basename($_FILES["zurag"]["name"]);
  }else{
    $error[] = 'Зураг хуулж чадсангүй дахин оролдоно уу';
  }
  
  if( empty($error) ){
    //hagalah uildel bn
    addcall1($s, $t, $w, $d, $b, $e, $a, $q, $r, $i);
    $id = $conn->insert_id;
    header('Location:calllist1.php?id='.$id);
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
          <label>Салбар</label>
          <select name="salbar" class="form-control">
            <?php $categories = get_all_category(); ?>
            <?php foreach($categories as $row){ ?> 
            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?>
          </select>
        </div>
        
        <div class="form-group">
          <label>Байр</label>
          <input type="text" name="garchig" class="form-control" 
          value="<?php if( isset($t) ){ echo $t; } ?>">
        </div>
          
          <div class="form-group">
          <label>Төрөл</label>
          <select name="tur" class="form-control">
            <?php $moods = get_all_mood(); ?>
            <?php foreach($moods as $row){ ?> 
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?>
          </select>
        </div>
          
        
        <div class="form-group">
          <label>Дугаар</label>
          <input type="text" name="dugaar" class="form-control"
          value="<?php if( isset($d) ){ echo $d; } ?>">
        </div>
        
        <div class="form-group">
          <label>Эрэлт хүсэлт</label>
          <textarea id="summernote" name="erelt" rows="6" class="form-control"><?php if(isset($b)){ echo $b; } ?></textarea>
        </div>
        
          
          
          <div class="form-group">
          <label>Ээлжийн инженер</label>
          <select name="engineer" class="form-control">
            <?php $categories = get_all_category(); ?>
            <?php foreach($categories as $row){ ?> 
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?>
          </select>
        </div>
          
          
          
          <div class="form-group">
          <label>Гүйцэтгэсэн ажилтан</label>
          <select name="ajiltan" class="form-control">
            <?php $categories = get_all_category(); ?>
            <?php foreach($categories as $row){ ?> 
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?>
          </select>
        </div>
          
          <div class="form-group">
          <label>Төлөв</label>
          <select name="ajiltan" class="form-control">
            <?php $categories = get_all_category(); ?>
            <?php foreach($categories as $row){ ?> 
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?>
          </select>
        </div>
          
          
        <div class="form-group">
          <label>Гүйцэтгэсэн тайлбар</label>
          <textarea id="summernote" name="tailbar" rows="6" class="form-control"><?php if(isset($r)){ echo $r; } ?></textarea>
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