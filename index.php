<?php
require "./include/load.php";

if(isset($_GET['error'])){
  $error = $_GET['error'];
}

if(isset($_GET['success']) && $_GET['success'] === "1"){
  if(!isset($_GET['name']) || !isset($_GET['uri'])){
    header("Location: ".SITE_URL);
    exit;
  }

  $success = true;
  $name = $_GET['name'];
  $uri = $_GET['uri'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_NAME ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://assets.lol/libs/fontawesome-6.2.0/css/all.min.css">
    <link rel="stylesheet" href="<?= get_link("/public/main.min.css") ?>">
  </head>
  <body>
    <div class="content">
      <div class="container">
        <a href="<?= SITE_URL ?>">
          <img class="logo" src="<?= SITE_LOGO ?>" alt="<?= SITE_NAME ?> logo">
        </a>

        <h2>Anonymous File Upload</h2>

        <?php if(isset($error)): ?>
          <div class="error">
            <i class="fa-solid fa-exclamation-triangle"></i>
            <p><?= $error ?></p>
          </div>
        <?php endif; ?>

        <button class="button" id="button">
          <i class="fa-solid fa-cloud-arrow-up"></i>
          <span>Upload</span>
        </button>
        
        <?php if(isset($success) && $success): ?>
          <div class="section">
            <p class="file-name"><?=$name ?><i class="fa-solid fa-check"></i></p>
            
            <div class="file-control">
              <input type="text" value="<?= $uri ?>" readonly>  
              
              <i class="copy fa-solid fa-clipboard"></i>
            </div>
          </div>
        <?php endif; ?>

        <div class="footer">
          <?php if(SITE_DISCORD): ?>
            <a href="<?= SITE_DISCORD ?>" target="_blank">Discord</a>
          <?php endif; ?>

          <a href="https://ripper.lol" target="_blank">🖌️ by Ripper</a>
        </div>
      </div>
    
      <?php if(AD_ENABLED): ?>
        <div class="r-ads">
          <!-- Place your ads here and remove the placeholder image below -->
          
          <img src="https://via.placeholder.com/720x90">
        </div>
      <?php endif; ?>
    </div>

    <form id="form" method="POST" enctype="multipart/form-data" action="<?= get_link("/upload", true) ?>">
      <input type="hidden" name="csrf" value="<?= get_csrf() ?>">
      <input type="file" name="file" id="file" class="file">
    </form>

    <script src="<?= get_link("/public/main.js") ?>"></script>
  </body>
</html>