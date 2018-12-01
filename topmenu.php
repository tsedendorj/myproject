<header>
     <section class="main-header">
       <div class="container">
         <div class="row">
          
           <div class="col-md-2">
             <div class="logo">
               <a href="">
                 <img src="uploads/login1.png" height="100" alt="">
               </a>
             </div>
           </div>
           
           <div class="col-md-2">
             <div class="top-socials">
               <a href="">
                 <i class="fab fa-facebook"></i>
               </a>
               <a href="">
                 <i class="fab fa-twitter"></i>
               </a>
               <a href="">
                 <i class="fab fa-facebook-messenger"></i>
               </a>
               <a href="">
                 <i class="fas fa-rss-square"></i>
               </a>
             </div>
           </div>
           <div class="col-md-4">
             <div class="top-search">
               
               <div class="input-group mb-0">
                  <input type="text" class="form-control" placeholder="Хайх..." >
                  <div class="input-group-append">
                    <button class="btn btn-default" type="button" ><i class="fas fa-search"></i></button>
                  </div>
               </div>
               
             </div>
           </div>
           <div class="col-md-4"></div>
         </div>         
       </div>
     </section>
     
     <nav>
       <div class="container">
         <div class="row">
           <div class="col-md-8">
            
             <ul class="top-menu">
               <li><a href="/"><i class="fas fa-home"></i></a></li>
               <?php $categories = get_all_category(); ?>
               
               <?php foreach($categories as $row){ ?>
               <li><a href="angilal.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
               <?php } ?>

             </ul>
             
           </div>
           <div class="col-md-4"></div>
         </div>
       </div>
       
     </nav>
   </header>