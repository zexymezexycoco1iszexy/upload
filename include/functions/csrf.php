<?php

if(!defined("FUNC_ACCESS")){
  http_response_code(404);
  exit();
}

function get_csrf(): string{
  $token = random(32);
  
  $_SESSION['csrf'] = $token;
  
  return $token;
}

function check_csrf(string $token): bool{
  if(!isset($_SESSION['csrf'])){
    return false;
  }
  
  if($_SESSION['csrf'] !== $token){
    return false;
  }
  
  return true;
}