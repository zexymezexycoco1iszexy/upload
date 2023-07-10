<?php

if(!defined("FUNC_ACCESS")){
  http_response_code(404);
  exit();
}

function get_link(string $path, bool $isPHP = false): string{
  if(PHP_EXTENSION && $isPHP){
    return SITE_URL.$path.".php";
  }

  return SITE_URL.$path;
}