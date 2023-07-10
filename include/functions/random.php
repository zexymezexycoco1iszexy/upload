<?php

if(!defined('FUNC_ACCESS')){
  http_response_code(404);
  die();
}

function random(int $length): string{
  $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $chars_length = strlen($chars);
  $string = '';

  for($i = 0; $i < $length; $i++){
    $string .= $chars[random_int(0, $chars_length - 1)];
  }
  
  return $string;
}