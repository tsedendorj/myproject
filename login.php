<?php 
session_start();
include '../includes/config.php'; 

if( isset($_POST['submit']) ){
  $u = $_POST['ner'];
  $p = $_POST['nuuts_ug'];
  
  if( empty($u) or empty($p) ){
    $error = 'Хоосон байна утгаа оруул!';
  }else{
    
    if( check_user($u, $p) ){
      $_SESSION['user'] = $u;
      $_SESSION['pass'] = $p;
      
      header('Location: main_footer.php');
      die();
    }else{
      $error = 'Хэрэглэгчийн нэр эсвэл нууц үг буруу байна';
    }

  }
}

?>
<?php include '_header.php'; ?>

<div class="container">
    <!DOCTYPE html>




<style>
        body{
            margin: 0;
            padding: 0;
        }
        body:before{
            content: '';
            position: fixed;
            width: 100vw;
            height: 100vh;
            background-image: url("uploads/ulaanbattor.jpg");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            -webkit-filter: blur(0px);
            -moz-filter: blur(0px);
            -o-filter: blur(0px);
            -ms-filter: blur(0px);
            filter: blur(0.5px);
        }
        .contact-form
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 400px;
            height: 500px;
            padding: 80px 40px;
            box-sizing: border-box;
            background: rgba(0,0,0,.5);
        }
        .avatar {
            position: absolute;
            width: 100px;
            height: 100px;
            border-radius: 65%;
            overflow: hidden;
            top: calc(-80px/2);
            left: calc(50% - 40px);
        }
        .contact-form h2 {
            margin: 0;
            padding: 0 0 20px;
            color: #fff;
            text-align: center;
            text-transform: uppercase;
        }
        .contact-form p
        {
            margin: 0;
            padding: 0;
            font-weight: bold;
            color: #fff;
        }
        .contact-form input
        {
            width: 100%;
            margin-bottom: 20px;
        }
        .contact-form input[type="text"],
        .contact-form input[type="password"]
        {
            border: none;
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
        }
        .contact-form input[type="submit"] {
            height: 30px;
            color: #fff;
            font-size: 15px;
            background: red;
            cursor: pointer;
            border-radius: 25px;
            border: none;
            outline: none;
            margin-top: 15%;
        }
        .contact-form a
        {
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
        }
        input[type="checkbox"] {
            width: 20%;
        }
    .content{
        color: blueviolet;
        cursor: pointer;
        border-radius: 20px;
    background-color: none;
        background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        margin-bottom: auto;
    }
    
    </style>

  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      
      <div class="contact-form" style="margin-top: 300px;">
       
        <?php if( isset($error) ): ?>
        <div class="alert alert-danger">
        <?php echo $error; ?>
        </div>
        <?php endif; ?>
          <img src="uploads/login1.png" class="avatar">
        <h2>АДМИН НЭВТРЭХ</h2>
        
        <form action="" method="post">
          
          <div class="form-group">
            <input type="text" name="ner" class="form-control" placeholder="Хэрэглэгчийн нэр...">
          </div>
          <div class="form-group">
            <input type="password" name="nuuts_ug" class="form-control" placeholder="Нууц үг...">
          </div>
          
          <button type="submit" name="submit" class="btn btn-primary btn-block">Нэвтрэх</button>
            </form>
          
      </div>
      <div id="company">
        <div class="content">
            Зохиогчийн эрх © Богд асар инженеринг ххк</div>
    </div>
    </div>
    <div class="col-md-4"></div>
  </div>
    
</div>


<?php include '_footer.php'; ?>