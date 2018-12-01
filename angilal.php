<?php 
session_start();
include '../includes/config.php'; 

if( !check_user($_SESSION['user'], $_SESSION['pass']) ){
  header('Location: login.php');
  die();
} 
 

if( isset($_GET['id'])){
  $id = $_GET['id'];
}else{
  header('Location: inde.php');
  die();
}

?>
<?php include 'main_header.php'; ?>
   <?php include 'topmenu.php'; ?>
   
   <div class="container">
     <div class="row">
       <div class="col-md-2">
         
       </div>
       
       <div class="col-md-6">
         <div class="news-list">
           <?php $news = get_category_news($id); ?>
           <?php foreach($news as $row){ ?>
           <div class="news-item">
             <a href="post.php?id=<?php echo $row['id']; ?>">
               <img src="/admin/uploads/<?php echo $row['image']; ?>" alt="">
             </a>
             <div class="news-details">
               <h4><a href="post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>
               <small><?php echo $row['created_at']; ?></small>
               <p><?php echo $row['description']; ?></p>
             </div>
           </div>
           <?php } ?>
         </div>
       </div>
       
       <div class="col-md-4">
         
       </div>
     </div>
   </div>
    
<?php include 'main_footer.php'; ?>