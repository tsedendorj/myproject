<?php $user = get_user_info($_SESSION['user'], $_SESSION['pass']); ?>

<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #0019FF;">
  <a class="navbar-brand" href="#">Удирдлагын хэсэг</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php if($user[0]['role']==1): ?>
        <li class="nav-item">
        <a class="nav-link" href="main_footer.php"><i class="fas fa-address-card"></i> Дуудлага</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="indexchart.php"><i class="fas fa-chart-line"></i> График</a>
      </li>
         
        <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fas fa-table"></i> Параметр мэдээ</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="category.php"><i class="far fa-user-circle"></i> Ажилтан нэмэх</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="workerlist.php"><i class="fas fa-users"></i> Ажилчдын мэдээлэл</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="category.php"><i class="fas fa-folder"></i> Ангилал</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user.php"><i class="fas fa-user-cog"></i> Хэрэглэгч</a>
      </li>
        
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Сайн байна уу <i class="fas fa-grin-beam"></i>  <?php echo $user[0]['display_name']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
 
        
        
        
        
      <li class="nav-item">
        <a class="nav-link" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Системээс гарах</a>
      </li>
      <?php endif; ?>

        
      <?php if($user[0]['role']==0): ?>
      
      
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Системээс гарах</a>
      </li>
      <?php endif; ?>
        
        <?php if($user[0]['role']==4): ?>
         <li class="nav-item">
        <a class="nav-link" href="main_footer.php"><i class="fas fa-address-card"></i> Дуудлага</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="indexchart.php"><i class="fas fa-chart-line"></i> График</a>
      </li>
         
        <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fas fa-table"></i> Параметр мэдээ</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="logout.php">Системээс гарах</a>
      </li>
        
        <?php endif; ?>
        
      <?php if($user[0]['role']==3): ?>
        <li class="nav-item">
        <a class="nav-link" href="calllist.php">Богд Асар Инженеринг</a>
      </li>
        
      
      <?php endif; ?>

    </ul>
    
  </div>
</nav>