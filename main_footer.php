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
<?php include 'submenu.php'; ?>



<footer>
       <section class="footer-top">
          <div class="container">
            <div class="row">
              <div class="col-md-2">
                <a href="">
                  <img src="uploads/login1.png" height="100" alt="">
                </a>
              </div>
              <div class="col-md-10">
                <div class="row">
                  <div class="col-md-6">
                    <div class="contact-item">
                      <i class="fas fa-map-marker-alt"></i>
                      <div class="item-details">
                        <p>Монгол улс, Улаанбаатар хот, Баянгол дүүрэг, Бага тойруу, Богд ар хороолол, “9-р Байр” 18 давхар</p>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-3">
                    <div class="contact-item">
                      <i class="fas fa-envelope"></i>
                      <div class="item-details">
                        <p>millioneron@gmail.com <br>bogd-ar@gmail.com</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="contact-item">
                      <i class="fas fa-phone"></i>
                      <div class="item-details big">
                        7004-4004
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

       </section>
       <section class="footer-main">
         <div class="container">
           <div class="row">
             <div class="col-md-2">
               <h4>Параметр мэдээ бүртгэх цагийн хувиар</h4>
               <ul>
                  <li><a href="">6 цаг</a></li>
                  <li><a href="">12 цаг</a></li>
                  <li><a href="">18 цаг</a></li>
                  <li><a href="">24 цаг</a></li>
                  
               </ul>
             </div>
             <div class="col-md-2">
               <h4>Мэдээ бүртгэхдээ анхаарах зүйл</h4>
               <ul>
                  <li><a href="">Үнэн зөв</a></li>
                  <li><a href="">Цаг хугацаандаа</a></li>
                  <li><a href="">Заавал инженер мэдээ авах</a></li>
                  <li><a href="">Дүгнэл хийж урьдчилсан таамгыг дуудлагын албанд мэдээллэх</a></li>
                 
               </ul>
             </div>
             <div class="col-md-2">
               <h4>Хориглох зүйлс</h4>
               <ul>
                  <li><a href="">Параметр мэдээ өөрчлөх гэж оролдох</a></li>
                  <li><a href="">Дуудлагын төвөөс очсон дуудлагыг өөрлөх гэж оролдох</a></li>
                  
               </ul>
             </div>
             <div class="col-md-2">
               <h4>Эргэх холбоо</h4>
               <ul>
                  <li><a href="">Засвар үйлчилгээ</a></li>
                  <li><a href="">Онцгой байдал</a></li>
                  <li><a href="">Бусад</a></li>
                  <li><a href="">Дээрх нөхцөлд урьдчилан мэдэгдэнэ</a></li>
                
               </ul>
             </div>
             <div class="col-md-2">
               <h4>ЭНТЭРТАЙНМЕНТ</h4>
               <ul>
                  <li><a href="">Мэдээ</a></li>
                 
               </ul>
             </div>
             <div class="col-md-2">
               <h4>ШАР МЭДЭЭ</h4>
               <ul>
                  <li><a href="">Шуурхай</a></li>
                  
               </ul>
             </div>
           </div>
         </div>
       </section>
       <section class="footer-bottom">
         <div class="container">
           <div class="row">
             <div class="col-md-12">
               <ul>
                 <li><a href="">Бидний тухай</a></li>
                 <li><a href="">Сурталчилгаа байршуулах</a></li>
                 <li><a href="">Холбоо барих</a></li>
                 <li><a href="">Вэб сайт хөгжүүлэгч</a></li>
                 <li><a href="">RSS</a></li>
                 <li><a href="">Лого татах</a></li>
               </ul>
             </div>   
             <div class="col-md-12">   
               <p>Зохиогчийн эрх хуулиар хамгаалагдсан. Мэдээлэл хуулбарлах хориотой.</p>
             </div>
           </div>
         </div>
       </section>
     </footer>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55c5a1106d338dee"></script>
  </body>
</html>