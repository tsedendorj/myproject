</head>
  <body>
  
 <header>
    
     <section class="topbar">
       <div class="container">
         <div class="row">
           <div class="col-md-6">
             
             <ul class="menu">
               <li><a href="">GOGO</a></li>
               <li><a href="">МЭДЭЭ</a></li>
               <li><a href="">MONGOLIA</a></li>
               <li><a href="">ХӨГЖИМ</a></li>
               <li><a href="">SHARE</a></li>
               <li><a href="">YOLO</a></li>
               <li><a href="">MAAMUU</a></li>
             </ul>
             
           </div>
           <div class="col-md-6 text-right">
             
             <ul class="socials">
               <li><a href=""><img src="https://cdn2.iconfinder.com/data/icons/world-flag-icons/256/Flag_of_United_Kingdom.png" > ENGLISH</a></li>
               <li>
                 <a href="https://facebook.com/gmbacademy"><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/facebook_circle_color-512.png" alt=""></a>
                 <a href=""><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/twitter_circle_color-512.png" alt=""></a>
                 <a href=""><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/youtube_circle_color-512.png" alt=""></a>
                 <a href=""><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/instagram_circle_black-512.png" alt=""></a>
               </li>
             </ul>
             
           </div>
         </div>
       </div>
     </section>
     
     <section class="logo">
       <div class="container">
         <div class="row">
           <div class="col-md-2">
             <a href="/">
               <img src="http://gstat.mn/newsn/w/lot02/img/gogo-logo-news-agency.png" alt="" class="logo-img">
             </a>
           </div>
           <div class="col-md-6">
            
            <form action="">
              <div class="input-group">
                <input type="text" class="form-control">
                <div class="input-group-append">
                  <button class="btn btn-info" type="submit">GO!</button>
                </div>
              </div>
              
            </form>
             
           </div>
           <div class="col-md-4">
             
           </div>
         </div>
       </div>
       
     </section>
     
     <nav class="topmenu">
       <div class="container">
         <div class="row">
           <div class="col-md-12">
            
             <ul>
               <li><a href="/"><i class="fas fa-home"></i></a></li>
               <?php foreach(get_all_category() as $row): ?>
               <li><a href="list.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
               <?php endforeach; ?>
             </ul>
             
           </div>
         </div>
       </div>
       
     </nav>
     
   </header>