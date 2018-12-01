<?php 
session_start();
include '../includes/config.php'; 

if( !check_user($_SESSION['user'], $_SESSION['pass']) ){
  header('Location: login.php');
  die();
}  

if( isset($_GET['id'])){
  $id = $_GET['id'];
  $s_post = get_one_news($id);
}else{
  header('Location: inde.php');
  die();
}

?>
<?php include 'main_header.php'; ?>
   <?php include 'topmenu.php'; ?>
   
   <div class="container">
     <div class="row">
      
       <div class="col-md-9">
         <div class="single-post">
          
           <h1><?php echo $s_post[0]['title']; ?></h1>
           <small><i class="far fa-clock"></i> <?php echo $s_post[0]['created_at']; ?></small>
           
           <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox_yrhz"></div>
           
           <img src="/admin/uploads/<?php echo $s_post[0]['image']; ?>" alt="">
           <div class="post-body">
             <?php echo $s_post[0]['content']; ?>
           </div>
           
         </div>
         
         <div class="fb-comments" data-href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/post.php?id=<?php echo $id; ?>" data-width="100%" data-numposts="10"></div>
         
         
       </div>
      
       <div class="col-md-3">
         
       </div>
       
     </div>
   </div>
    
<?php include 'main_footer.php'; ?>