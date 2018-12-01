<?php 
session_start();
include '../includes/config.php'; 

if( !check_user($_SESSION['user'], $_SESSION['pass']) ){
  header('Location: login.php');
  die();
} 
?>
<?php include '_header.php'; ?>
<?php include '_menu.php'; ?>
<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700&subset=cyrillic-ext');

body{
  font-family: 'Roboto Condensed', sans-serif;
}
header{
  background: #f22e3c;
}
.main-header{
  padding: 30px 0; 
}
.top-socials a{
  color: #000;
  text-decoration: none;
  padding: 0 10px;
  line-height: 46px;
}

.top-search .form-control{
  border-color: #000;
  border-radius: 23px;
  height: 46px;
}

.top-search .btn-default{
  background: #000;
  border-radius: 23px;
  height: 46px;
}

header nav{
  border-top: 1px solid #f3404e;
}

.top-menu{
  list-style: none;
  padding: 0;
  margin: 0;
}
.top-menu li{
  display: inline-block;
  padding: 0 12px;
}

.top-menu li a{
  display: block;
  color: #000;
  font-weight: 300;
  text-decoration: none;
  height: 38px;
  line-height: 38px;
  font-size: 12px;
  border-bottom: 2px solid #f22e3c;
  text-transform: uppercase;
}
.top-menu li a:hover{
  border-bottom: 2px solid #fff;
}

.top-menu li:first-child{
  padding-left: 0;
}

.news-item img{
  width: 200px;
  float: left;
  margin-right: 15px;
}

.news-details h4{
  font-size: 15px;
  font-weight: 400;
  text-transform: uppercase;
  margin-bottom: 5px;
  height: 38px;
  overflow: hidden;
}
.news-details p{
  font-size: 13px;
  font-weight: 300;
  height: 60px;
  overflow: hidden;
}


footer{
  background: #222;
  color: #fff;
}
.footer-top{
  padding: 30px 0;
}

.footer-top .contact-item i{
  width: 46px;
  height: 46px;
  line-height: 46px;
  border-radius: 50%;
  background: #f22e3c;
  text-align: center;
  margin-right: 15px;
  float: left;
}

.contact-item .item-details p{
  font-size: 12px;
  padding-top: 5px;
  margin-bottom: 0;
}
.contact-item .item-details.big{
  font-size: 32px;
}

.footer-main{
  padding: 40px 0;
  border-top: 1px solid #333;
  border-bottom: 1px solid #333;
}

.footer-main ul{
  margin: 0;
  padding: 0;
  list-style: none;
}

.footer-main ul li a{
  color: #bbb;
  font-size: 13px;
  text-decoration: none;
}
.footer-main ul li a:hover{
  color: #fff;
}

.footer-main h4{
  font-size: 14px;
  text-transform: uppercase;
}
.footer-main h4:after{
  content: '';
  display: block;
  width: 14px;
  height: 1px;
  background-color: #ed3237;
  margin-top: 16px;
  margin-bottom: 14px;
}

.footer-bottom{
  padding: 20px 0;
}
.footer-bottom ul{
  padding: 0;
  margin: 0;
  list-style: none;
}

.footer-bottom ul li{
  float: left;
  padding-right: 10px;
}

.footer-bottom ul li:after{
  content: '/';
  padding-left: 10px;
  color: #444;
  font-weight: 300;
}

.footer-bottom ul li:last-child:after{
  display: none;
}

.footer-bottom ul li a, .footer-bottom p{
  font-size: 12px;
  color: #bbb;
}

.footer-bottom ul li a:hover{
  font-size: 12px;
  color: #fff;
  text-decoration: none;
}

.single-post img{
  max-width: 100%;
}

header{
  margin-bottom: 20px;
}

footer{
  margin-top: 20px;
}

.single-post h1{
  font-size: 28px;
  font-weight: 700;
}

</style>
<nav>
       <div class="container">
         <div class="row">
           <div class="col-md-8">
            
             <ul class="top-menu">
               <li><a href="/"><i class="fas fa-home"></i></a></li>
               <?php $categories = get_all_salbar(); ?>
               
               <?php foreach($categories as $row){ ?>
               <li><a href="bogdar.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
               <?php } ?>

             </ul>
             
           </div>
           <div class="col-md-4"></div>
         </div>
       </div>
       
     </nav>
   
    
<?php include '_footer.php'; ?>