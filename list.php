<?php require 'functions/config.php'; 
 
if( isset($_GET['id']) ){
  $id = $_GET['id'];
  $category_news = get_news_with_category($id);
  $category = get_category_name($id);
  $title = $category[0]['name'];
}else{
  header('Location: 404.php');
  die();
}
 
?>
<?php include '_main_header.php'; ?>
<?php include '_site_top.php'; ?>
    
    
    
   <section class="main-content">
     <div class="container">
       <div class="row" style="background-color: #fff; padding-top: 15px; padding-bottom: 15px;">
         <div class="col-md-9">
           
           <h2><?php echo $title; ?></h2>
            
           <div class="row">
              <?php foreach($category_news as $row): ?>
              <div class="col-md-6">
                <div class="news-item">
                  <div class="news-img">
                    <a href="read.php?id=<?php echo $row['id']; ?>">
                      <img src="/uploads/<?php echo $row['image']; ?>" alt="">
                    </a>
                  </div>
                  <h3>
                    <a href="read.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
                  </h3>
                  <p><?php echo $row['description']; ?></p>
                  <small><i class="far fa-clock"></i> <?php echo $row['created_at']; ?></small>
                </div>              
              </div>
              <?php endforeach; ?>
              
           </div>
            
            
         </div>
         <div class="col-md-3"></div>
       </div>
     </div>
      
   </section>
    
    
    
 
<?php include '_main_footer.php'; ?>