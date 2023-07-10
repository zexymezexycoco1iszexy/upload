<?php

require "./include/load.php";

if($_SERVER['REQUEST_METHOD'] !== "POST"){
  header("Location: ".SITE_URL);
  exit;
}

if(!isset($_POST['csrf']) || !check_csrf($_POST['csrf'])){
  header("Location: ".SITE_URL."?error=".urlencode("Invalid CSRF token"));
  exit;
}

if(!isset($_FILES['file'])){
  header("Location: ".SITE_URL."?error=".urlencode("Unable to upload file"));
  exit;
}

if($_FILES['file']['error'] !== UPLOAD_ERR_OK){
  switch($_FILES['file']['error']){
    case UPLOAD_ERR_INI_SIZE:
      $error = "Admin must increase upload_max_filesize in php.ini";
      break;
    case UPLOAD_ERR_FORM_SIZE:
      $error = "File is too large";
      break;
    case UPLOAD_ERR_PARTIAL:
      $error = "File was only partially uploaded";
      break;
    case UPLOAD_ERR_NO_FILE:
      $error = "No file was uploaded";
      break;
    case UPLOAD_ERR_CANT_WRITE:
      $error = "Failed to write file to disk";
      break;
    case UPLOAD_ERR_EXTENSION:
      $error = "File upload stopped by extension";
      break;
    default:
      $error = "Unknown upload error";
      break;
  }

  header("Location: ".SITE_URL."?error=".urlencode($error));
  exit;
}

if($_FILES['file']['size'] > UPLOAD_MAX_SIZE * 1024 * 1024){
  header("Location: ".SITE_URL."?error=".urlencode("Max file size is ".UPLOAD_MAX_SIZE."MB"));
  exit;
}

if(UPLOAD_CHECK_MIME && !in_array($_FILES['file']['type'], UPLOAD_ALLOW_MIME)){
  header("Location: ".SITE_URL."?error=".urlencode("File type is not allowed"));
  exit;
}

$ext = pathinfo($_FILES['file']['name'])['extension'];

if(UPLOAD_CHECK_EXT && !in_array(strtolower($ext), UPLOAD_ALLOW_EXT)){
  header("Location: ".SITE_URL."?error=".urlencode("File type is not allowed"));
  exit;
}

$dir = __DIR__.UPLOAD_DIR;

if(!is_dir($dir)){
  mkdir($dir, 0755, true);
}

$name = random(16).".".$ext;
$path = $dir."/".$name;

if(!move_uploaded_file($_FILES['file']['tmp_name'], $path)){
  header("Location: ".SITE_URL."?error=".urlencode("Unable to upload file"));
  exit;
}

$uri = SITE_URL.UPLOAD_DIR."/".$name;

header("Location: ".SITE_URL."?success=1&name=".urlencode($_FILES['file']['name'])."&uri=".urlencode($uri));
exit;