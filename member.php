<?php 
session_start();
require 'functions/config.php'; 

if( !check_user($_SESSION['u'], $_SESSION['p']) ){
  header('Location: login.php');
  die();
}

if( isset($_POST['submit']) ){
  $dn = $_POST['diplay_name'];
  $un = $_POST['username'];
  $ps = $_POST['password'];
  $rl = $_POST['role'];

  if( empty($dn) or empty($un) or empty($ps) ){
    $error = 'Аль нэг утга хоосон байна оруулна уу!';
  }else{
    add_new_member($dn, $un, $ps, $rl);
  }
}

?>
<?php include '_header.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="adminbox">
      
        <h3>Хэрэглэгч удирдах хэсэг</h3>
      
       
        <?php if( isset($error) ){ ?>
        <div class="alert alert-danger">
        <?php echo $error; ?>
        </div>
        <?php } ?>
            
        <form action="" method="post">
         
          <div class="form-group">
           <label for="">Нэр</label>
           <input type="text" name="diplay_name" class="form-control">
          </div>
          
          <div class="form-group">
           <label for="">Мэйл хаяг</label>
           <input type="email" name="username" class="form-control">
          </div>
          
          <div class="form-group">
           <label for="">Нууц үг</label>
           <input type="password" name="password" class="form-control">
          </div>
          
          <div class="form-group">
           <label for="">Эрх үүрэг</label>
           <select name="role" class="form-control">
             <option value="1">Мэдээний админ</option>
             <option value="2">Супер админ</option>
           </select>
          </div>
          
          <button type="submit" name="submit" class="btn btn-success">Хадгалах</button>
          
        </form>
      </div>
    </div>
    <div class="col-md-6">
      
      <table class="table">
        <thead>
          <tr>
            <th>Дд</th>
            <th>Нэр</th>
            <th>Хэрэглэгч</th>
            <th>Эрх үүрэг</th>
            <th>Үйлдэл</th>
          </tr>
        </thead>
        <tbody>
          <?php $members = get_members(); ?>
          <?php foreach($members as $row): ?>
          <tr>
           <td><?php echo $row['id']; ?></td>
           <td><?php echo $row['display_name']; ?></td>
           <td><?php echo $row['username']; ?></td>
           <td><?php 
             
             switch($row['role']){
               case '1': echo 'Мэдээний админ'; 
                         break;
               case '2': echo 'Супер админ';
                         break;
             }
             
             ?></td>
           <td>
             <a href="" class="btn btn-danger btn-sm">Устгах</a>
           </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
       
      </table>
      
    </div>
  </div>
</div>




<?php include '_footer.php'; ?>