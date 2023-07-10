<?php

//Prevent direct access to the config file
if(!defined("CONFIG_ACCESS")){
  http_response_code(404);
  exit();
}

//Site name (Used in the title of the page)
define("SITE_NAME", "OLAM Upload");

//Site URL (include protocol and root path if applicable)
define("SITE_URL", "http://localhost:5000/");

//Site logo
define("SITE_LOGO", "https://assets.lol/media/ripper-upload-logo.png");

//Site Discord (set as null to disable)
define("SITE_DISCORD", "https://ripper.lol/discord.html");

//Should links to php files include the .php extension?
define('PHP_EXTENSION', true);

//Where should uploaded files be stored?
//This path is relative to the root of the project
define("UPLOAD_DIR", "/uploads");

//What should the maximum file size be?
//This is in megabytes
define("UPLOAD_MAX_SIZE", 10);

//Should the file mime type by checked?
define("UPLOAD_CHECK_MIME", true);

//Should the file extension be checked?
define("UPLOAD_CHECK_EXT", true);

//If UPLOAD_CHECK_MIME is true, only allow these mime types
define("UPLOAD_ALLOW_MIME", ["image/gif", "image/png", "image/jpeg"]);

//If UPLOAD_CHECK_EXT is true, only allow these file extensions
define("UPLOAD_ALLOW_EXT", ["gif", "png", "jpg", "jpeg"]);

//Should ads be enabled?
define("AD_ENABLED", true);