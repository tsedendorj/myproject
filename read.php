<?php require 'functions/config.php'; 
 
if( isset($_GET['id']) ){
  $id = $_GET['id'];
  $one_news = get_one_post($id);
  $category = get_category_name($one_news[0]['category']);
  $title = $one_news[0]['title'];
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
            
           <div class="one-news">
              
             <h1><?php echo $one_news[0]['title']; ?></h1>
             <small><i class="fas fa-calendar"></i> <?php echo $one_news[0]['created_at']; ?> | <i class="fas fa-bookmark"></i> <?php echo $category[0]['name']; ?></small>
               <hr>
             <img src="uploads/<?php echo $one_news[0]['image']; ?>" alt="">
             <div class="one-news-body">
                <?php echo $one_news[0]['content']; ?>
             </div>
              
           </div>
  
            
         </div>
         <div class="col-md-3">
             <aside>
                 <a href="">
                 <img src="https://placehold.it/300x180" class="banner" alt="">
                 </a>
                 
                 
                 
                 
                 
                 
                 <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#mostreaded" role="tab" aria-controls="home" aria-selected="true">Их уншсан</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#latest" role="tab" aria-controls="profile" aria-selected="false">Сүүлд нэмэгдсэн</a>
  </li>
  
                     
</ul>
                 
                 
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="mostreaded" role="tabpanel" aria-labelledby="home-tab">
    
      <?php foreach(get_all_post() as $row):?>
      <div class="sidebar-news"> 
      <a href="read.php?id=<?php echo $row['id']; ?>" >
      <img src="/uploads/<?php echo $row['image']; ?>" alt="">
        
        <h5><?php echo $row['title']; ?></h5>
          <small><?php echo $row['created_at']; ?></small>
          </a>
      </div>
      <?php endforeach; ?>
    
    
    
    
    
    </div>
  <div class="tab-pane fade" id="latest" role="tabpanel" aria-labelledby="profile-tab">

    <div class="tab-pane fade show active" id="mostreaded" role="tabpanel" aria-labelledby="home-tab">
    
      <?php foreach(get_mostreached() as $row):?>
      <div class="sidebar-news"> 
      <a href="read.php?id=<?php echo $row['id']; ?>" >
      <img src="/uploads/<?php echo $row['image']; ?>" alt="">
        
        <h5><?php echo $row['title']; ?></h5>
          <small><?php echo $row['created_at']; ?></small>
          </a>
      </div>
      <?php endforeach; ?>
    
    </div>
    
    
    
    </div>
    
</div>
                 
                 
             
             </aside>
           
           </div>
       </div>
     </div>
      
   </section>
    
    
    
 
<?php include '_main_footer.php'; ?>