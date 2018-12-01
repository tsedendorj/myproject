<?php 
session_start();
include '../includes/config.php'; 

if( !check_user($_SESSION['user'], $_SESSION['pass']) ){
  header('Location: login.php');
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
   $r1 = $_POST['2p2batl'];
   $r2 = $_POST['2hbatlagdsan'];
    $r3 = $_POST['2p1bodit'];
    $r4 = $_POST['2p2bodit'];
    $r5 = $_POST['2hbodit'];
     $r6 = $_POST['t1bat'];
     $r7 = $_POST['t2bat'];
     $r8 = $_POST['t1bodit'];
     $r9 = $_POST['t2bodit'];
     $r10 = $_POST['2t3bat'];
     $r11 = $_POST['2t1bodit'];
     $r12 = $_POST['2t2bodit'];
     $r13 = $_POST['2thhu'];
    $r14 = $_POST['ghal'];
    $r15 = $_POST['ghhu'];
    $r16 = $_POST['batniil'];
    $r17 = $_POST['bodniil'];
    $r18 = $_POST['2ghal'];
    $r19 = $_POST['dultool'];
    $r20 = $_POST['hhutool'];
    $r21 = $_POST['2p1'];
    $r22 = $_POST['2p2'];
    $r23 = $_POST['zorvv'];
    
    
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
    addcalls($s, $w, $t, $d, $b, $e, $a, $q, $r, $r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9, $r10, $r11, $r12, $r13, $r14, $r15, $r16, $r17, $r18, $r19, $r20, $r21, $r22, $r23);
    $id = $conn->insert_id;
    header('Location:index.php?id='.$id);
    die();
  }
}


?>
<?php include '_header.php'; ?>
<?php include '_menu.php'; ?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="container">
    
    <div class="row">
        <div class="col-md-6">
        
        <div class="col-md-6">
        <div class="form-group">
           
          <label >Харъяа дүүрэг</label>
          <input type="text" name="salbar" class="form-control"
               
          value="<?php if( isset($s) ){ echo $s; } ?>">
            
        </div>
            </div>
        </div>
         <div class="col-md-6">
        
        <div class="col-md-6">
        <div class="form-group">
           
          <label >УДДТ №</label>
          <input type="text" name="tur" class="form-control"
               
          value="<?php if( isset($w) ){ echo $w; } ?>">
            
        </div>
            </div>
        </div>
    </div>
    
  <div class="row">
     
      
    <div class="col-md-6">
        <div class="jumbotron">
        
   <label>1-р хэлхээ</label>
            <div class="row">    
        <div class="col-md-2">
        <div class="form-group">
           
          <label >P1-Батлагдсан</label>
          <input type="text" name="garchig" class="form-control"
               
          value="<?php if( isset($t) ){ echo $t; } ?>">
            
        </div>
            </div>
        
        <div class="col-md-2">
        <div class="form-group">
          <label>P2-Батлагдсан</label>
          <input type="text" name="dugaar" class="form-control"
          value="<?php if( isset($d) ){ echo $d; } ?>">
            </div>
        </div>
        <div class="col-md-2">
        <div class="form-group">
          <label><br>H</label>
          <input type="text" name="erelt" class="form-control"
          value="<?php if( isset($b) ){ echo $b; } ?>">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
          <label>P2-Бодит</label>
          <input type="text" name="engineer" class="form-control"
          value="<?php if( isset($e) ){ echo $e; } ?>">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
          <label>P1-Бодит</label>
          <input type="text" name="ajiltan" class="form-control"
          value="<?php if( isset($a) ){ echo $a; } ?>">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
          <label><br>H</label>
          <input type="text" name="tuluv" class="form-control"
          value="<?php if( isset($q) ){ echo $q; } ?>">
            </div>
       
        
    
    
  </div>
</div> 
            <label>2-р Хэлхээ</label>
    <div class="row">
               
        <div class="col-md-2">
        <div class="form-group">
          <label >P1-Батлагдсан</label>
          <input type="text" name="tailbar" class="form-control"
          value="<?php if( isset($r) ){ echo $r; } ?>">
            </div>
        </div>
        <div class="col-md-2">
        <div class="form-group">
          <label >P2-Батлагдсан</label>
          <input type="text" name="2p2batl" class="form-control"
          value="<?php if( isset($r1) ){ echo $r1; } ?>">
            </div>
        </div>
        
        <div class="col-md-2">
        <div class="form-group">
          <label >H-Батлагдсан</label>
          <input type="text" name="2hbatlagdsan" class="form-control"
          value="<?php if( isset($r2) ){ echo $r2; } ?>">
            </div>
        </div>
        <div class="col-md-2">
        <div class="form-group">
          <label >P1-Бодит</label>
          <input type="text" name="2p1bodit" class="form-control"
          value="<?php if( isset($r3) ){ echo $r3; } ?>">
            </div>
        </div>
        <div class="col-md-2">
        <div class="form-group">
          <label >P2-Бодит</label>
          <input type="text" name="2p2bodit" class="form-control"
          value="<?php if( isset($r4) ){ echo $r4; } ?>">
            </div>
        </div>
        <div class="col-md-2">
        <div class="form-group">
          <label >H-Бодит</label>
          <input type="text" name="2hbodit" class="form-control"
          value="<?php if( isset($r5) ){ echo $r5; } ?>">
            </div>
        </div>
   
</div>
            
      </div>
        
        
        
        
        
        
     </div>
      
      
      <div class="col-md-6">
        <div class="jumbotron">
        
   <label>1-р хэлхээ</label>
            <div class="row">    
        <div class="col-md-2">
        <div class="form-group">
           
          <label >T1-Батлагдсан</label>
          <input type="text" name="t1bat" class="form-control"
               
          value="<?php if( isset($r6) ){ echo $r6; } ?>">
            
        </div>
            </div>
        
        <div class="col-md-2">
        <div class="form-group">
          <label>T2-Батлагдсан</label>
          <input type="text" name="t2bat" class="form-control"
          value="<?php if( isset($r7) ){ echo $r7; } ?>">
            </div>
        </div>
       
        <div class="col-md-2">
            <div class="form-group">
          <label>T1-Бодит</label>
          <input type="text" name="t1bodit" class="form-control"
          value="<?php if( isset($r8) ){ echo $r8; } ?>">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
          <label>P2-Бодит</label>
          <input type="text" name="t2bodit" class="form-control"
          value="<?php if( isset($r9) ){ echo $r9; } ?>">
           
       
        
    
    
  </div>
</div> 
                
                
     <div class="">
           <label>2-р Хэлхээ</label>
           
    <div class="row">
  
               
        <div class="col-md-2">
        <div class="form-group">
          <label >T3-Батлагдсан</label>
          <input type="text" name="2t3bat" class="form-control"
          value="<?php if( isset($r10) ){ echo $r10; } ?>">
            </div>
        </div>
        
        
        
        <div class="col-md-2">
        <div class="form-group">
          <label >T1-Бодит</label>
          <input type="text" name="2t1bodit" class="form-control"
          value="<?php if( isset($r11) ){ echo $r11; } ?>">
            </div>
        </div>
        <div class="col-md-2">
        <div class="form-group">
          <label >T2-Бодит</label>
          <input type="text" name="2t2bodit" class="form-control"
          value="<?php if( isset($r12) ){ echo $r12; } ?>">
            </div>
        </div>
        <div class="col-md-2">
        <div class="form-group">
          <label >Tхху-Бодит</label>
          <input type="text" name="2thhu" class="form-control"
          value="<?php if( isset($r13) ){ echo $r13; } ?>">
            </div>
        </div>
         </div>
   
</div>
            
      </div>
        
        
        
     </div>
      
      
      
      
      
      
      
      
      
      
       </div>
        
        
         <div class="col-md-6">
        <div class="jumbotron">
        
   <label>1-р хэлхээ</label>
            <div class="row">    
        <div class="col-md-2">
        <div class="form-group">
           
          <label >Gхалаалт-Батлагдсан</label>
          <input type="text" name="ghal" class="form-control"
               
          value="<?php if( isset($r14) ){ echo $r14; } ?>">
            
        </div>
            </div>
        
        <div class="col-md-2">
        <div class="form-group">
          <label>Gхху-Батлагдсан</label>
          <input type="text" name="ghhu" class="form-control"
          value="<?php if( isset($r15) ){ echo $r15; } ?>">
            </div>
        </div>
       
        <div class="col-md-2">
            <div class="form-group">
          <label>Батлагдсан нийлбэр</label>
          <input type="text" name="batniil" class="form-control"
          value="<?php if( isset($r16) ){ echo $r16; } ?>">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
          <label>Бодит нийлбэр</label>
          <input type="text" name="bodniil" class="form-control"
          value="<?php if( isset($r17) ){ echo $r17; } ?>">
           
       
        
    
    
  </div>
</div> 
                
                
     <div class="">
           <label>2-р Хэлхээ</label>
           
    <div class="row">
  
               
        <div class="col-md-2">
        <div class="form-group">
          <label ><br>Gхалаалт-Батлагдсан</label>
          <input type="text" name="2ghal" class="form-control"
          value="<?php if( isset($r18) ){ echo $r18; } ?>">
            </div>
        </div>
        
        
        
        <div class="col-md-2">
        <div class="form-group">
          <label ><br>Дулааны тоолуур</label>
          <input type="text" name="dultool" class="form-control"
          value="<?php if( isset($r19) ){ echo $r19; } ?>">
            </div>
        </div>
        <div class="col-md-2">
        <div class="form-group">
          <label >ХХУ Дулааны тоолуур</label>
          <input type="text" name="hhutool" class="form-control"
          value="<?php if( isset($r20) ){ echo $r20; } ?>">
            </div>
        </div>
        <div class="col-md-2">
        <div class="form-group">
          <label >Насосны өмнөх P1</label>
          <input type="text" name="2p1" class="form-control"
          value="<?php if( isset($r21) ){ echo $r21; } ?>">
            </div>
        </div>
         <div class="col-md-2">
        <div class="form-group">
          <label >Насосны дараах P2</label>
          <input type="text" name="2p2" class="form-control"
          value="<?php if( isset($r22) ){ echo $r22; } ?>">
            </div>
        </div>
         <div class="col-md-2">
        <div class="form-group">
          <label >Дулааны заалтын зөрүү</label>
          <input type="text" name="zorvv" class="form-control"
          value="<?php if( isset($r23) ){ echo $r23; } ?>">
            </div>
        </div>
         </div>
   
</div>
            
      </div>
        
        
        
     </div>
      
      
      
      
      
      
      
      
      
      
       </div>
        
        
        
        
         </div>
    
    
    
    
    
    <button type="submit" name="submit" class="btn btn-success">Шинээр нэмэх</button>
        
</form>

        
        
        
        
        
        <?php include '_footer.php'; ?>