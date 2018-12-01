<?php 
session_start();
include '../includes/config.php'; 

if( !check_user($_SESSION['user'], $_SESSION['pass']) ){
  header('Location: login.php');
  die();
} 



if( isset($_GET['id']) ){
  $id = $_GET['id'];
  $medee = get_one_call($id);
}else{
  header('Location: addcall.php');
  die();
}

if( isset($_GET['delete']) ){
  delete_img($id, $medee[0]['image']);
  header('Location: editcall.php?id='.$id);
  die();
}



if( isset($_POST['submit']) ){
  $s = $_POST['salbar'];
    $w = $_POST['tur'];
  $t = $_POST['garchig'];
     
  $d = $_POST['dugaar'];
  $b = $_POST['erelt'];
   $e = $_POST['engineer'];
   $a = $_POST['ajiltan'];
   $q = $_POST['tuluv'];
   $r = $_POST['tailbar'];
    $rl = $_POST['t_able'];
  
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
  
    
    
  
    
    
    
  
  if( empty($error) ){
    //hagalah uildel bn
    updatecall($id, $s, $w, $t, $d, $b, $e, $a, $q, $r);
    
    header('Location:calllist1.php?id='.$id);
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
          <select name="salbar" class="form-control">
            <?php $salbaruud = get_all_salbar(); ?>
            <?php foreach($salbaruud as $row){ ?>
              <?php 
              if($row['id']==$medee[0]['category']){
                $text = 'selected';
              } else{
                $text = '';
              }
            ?>
              
              
            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?>
          </select>
        </div>
          
          <div class="form-group">
          <label>Төрөл</label>
          <select name="tur" class="form-control">
            <?php $moods = get_all_mood(); ?>
            <?php foreach($moods as $row){ ?> 
              
              <?php 
              if($row['id']==$medee[0]['turul']){
                $text = 'selected';
              } else{
                $text = '';
              }
            ?>
              
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?>
          </select>
        </div>
        
        <div class="form-group">
          <label>Байр</label>
          <input type="text" name="garchig" class="form-control" 
          value="<?php if( isset($t) ){ echo $t; }else{ echo $medee[0]['title']; } ?>">
        </div>
          
          
          
        
        <div class="form-group">
          <label>Дугаар</label>
          <input type="text" name="dugaar" class="form-control"
          value="<?php if( isset($d) ){ echo $d; }else{ echo $medee[0]['description']; } ?>">
        </div>
        
        <div class="form-group">
          <label>Эрэлт хүсэлт</label>
          <textarea id="summernote" name="erelt" rows="10" class="form-control"><?php if(isset($b)){ echo $b; }else{ echo $medee[0]['content']; } ?></textarea>
        </div>
        
          
          
          <div class="form-group">
          <label>Ээлжийн инженер</label>
          <select name="engineer" class="form-control">
            <?php $categories = get_all_category(); ?>
            <?php foreach($categories as $row){ ?> 
              
              
              <?php 
              if($row['id']==$medee[0]['engineer']){
                $text = 'selected';
              } else{
                $text = '';
              }
            ?>
              
            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?>
          </select>
        </div>
          
          
          
          <div class="form-group">
          <label>Гүйцэтгэсэн ажилтан</label>
          <select name="ajiltan" class="form-control">
            <?php $categories = get_all_category(); ?>
            <?php foreach($categories as $row){ ?> 
              
              <?php 
              if($row['id']==$medee[0]['worker']){
                $text = 'selected';
              } else{
                $text = '';
              }
            ?>
              
            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?>
          </select>
        </div>
          
          <div class="form-group">
          <label>Төлөв</label>
          <select name="tuluv" class="form-control">
            <?php $tuluv = get_all_tuluv(); ?>
            <?php foreach($tuluv as $row){ ?>
              
              <?php 
              if($row['id']==$medee[0]['type']){
                $text = 'selected';
              } else{
                $text = '';
              }
            ?>
            
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?>
          </select>
        </div>
          
          
          
          
        <div class="form-group">
          <label>Гүйцэтгэсэн тайлбар</label>
          <textarea id="summernote" name="tailbar" rows="6" class="form-control"><?php if(isset($r)){ echo $r; }else{ echo $medee[0]['exam']; } ?></textarea>
        </div>
          
          
          <div class="form-group">
          <label>Байр</label>
          <input type="text" name="garchig" class="form-control" 
          value="<?php if( isset($t) ){ echo $t; }else{ echo $medee[0]['title']; } ?>">
        </div>
          
          
          
          <div class="form-group">
           <label for="">Илгээх</label>
           <select name="t_able" class="form-control">
             <option value="t100">Хаах</option>
               
            
           </select>
          </div>
          
          
          
          
        <button type="submit" name="submit" class="btn btn-success">Засах</button>
        
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