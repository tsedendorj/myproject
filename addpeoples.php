<?php 
session_start();
include '../includes/config.php'; 

if( !check_user($_SESSION['user'], $_SESSION['pass']) ){
  header('Location: login.php');
  die();
} 

if( isset($_POST['submit']) ){
  $c = $_POST['company'];
  $d = $_POST['dvvreg'];
  $b = $_POST['bair'];
  $t = $_POST['toot'];
  $h = $_POST['horoo'];
   $he = $_POST['hereglegch'];
   $e = $_POST['ezemshigch'];
   $a = $_POST['ambvl'];
   $du = $_POST['dugaar'];
    $ba = $_POST['baitsaagch'];
    $u = $_POST['uruu'];
    $k = $_POST['hemjee'];
    $n = $_POST['nemelt'];
  
  $error = array();
  
  
  
  
  if( empty($error) ){
    //hagalah uildel bn
    addapart($c, $d, $b, $t, $h, $he, $e, $a, $du, $ba, $u, $k, $n);
    $id = $conn->insert_id;
    header('Location:apartment.php?id='.$id);
    die();
  }
}


?>
<?php include '_header.php'; ?>
<?php include '_menu.php'; ?>


<style>
   
   .box
   {
    width:750px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:100px;
   }
  </style>


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
          <select name="company" class="form-control">
            <?php $salbar = get_all_salbar(); ?>
            <?php foreach($salbar as $row){ ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?>
          </select>
        </div>
        
        <div class="form-group">
          <label>Байр</label>
          <input type="text" name="bair" class="form-control" 
          value="<?php if( isset($b) ){ echo $b; } ?>">
        </div>
          
          
          <div class="form-group">
          <label>Тоот</label>
          <input type="text" name="toot" class="form-control" 
          value="<?php if( isset($t) ){ echo $t; } ?>">
        </div>
          
          
          <div class="form-group">
          <label>Хороо</label>
          <input type="text" name="horoo" class="form-control" 
          value="<?php if( isset($h) ){ echo $h; } ?>">
        </div>
          
          
         <div class="form-group">
          <label>Хэрэглэгч</label>
          <input type="text" name="hereglegch" class="form-control"
          value="<?php if( isset($he) ){ echo $he; } ?>">
        </div>
          
     <div class="form-group">
          <label>Эзэмшигч</label>
          <input type="text" name="hereglegch" class="form-control"
          value="<?php if( isset($he) ){ echo $he; } ?>">
        </div>
          
                   
        <div class="form-group">
          <label>Ам бүл</label>
          <input type="text" name="ambvl" class="form-control"
          value="<?php if( isset($a) ){ echo $a; } ?>">
        </div>
          
          
        <div class="form-group">
          <label>Дугаар</label>
          <input type="text" name="dugaar" class="form-control"
          value="<?php if( isset($du) ){ echo $du; } ?>">
        </div>
          
          
        <div class="form-group">
          <label>Хариуцсан байцаагч</label>
          <input type="text" name="baitsaagch" class="form-control"
          value="<?php if( isset($ba) ){ echo $ba; } ?>">
        </div>
          
          
        <div class="form-group">
          <label>Өрөөний тоо</label>
          <input type="text" name="uruu" class="form-control"
          value="<?php if( isset($u) ){ echo $u; } ?>">
        </div>
          
        <div class="form-group">
          <label>Хэмжээ</label>
          <input type="text" name="hemjee" class="form-control"
          value="<?php if( isset($k) ){ echo $k; } ?>">
        </div>
          
        
        <div class="form-group">
          <label>Нэмэлт мэдээлэл оруулах</label>
          <textarea id="summernote" name="nemelt" rows="6" class="form-control"><?php if(isset($n)){ echo $n; } ?></textarea>
        </div>
        
          
          
          
        <button type="submit" name="submit" class="btn btn-success">Шинээр нэмэх</button>
        
      </div>
      
      
    </div>
    <div class="col-md-4">
      
      <div class="jumbotron">
       
        <div class="form-group">
          <label>Нэмэлтээр зураг оруулах</label>
          <input type="file" name="zurag" class="form-control">
        </div>
        
      </div>
      
    </div>
  </div>
</div>
</form>

<?php include '_footer.php'; ?>