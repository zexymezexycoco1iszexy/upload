<?php

define('CONFIG_ACCESS', true);

require "config.php";

session_name(str_replace(" ", "_", strtolower(SITE_NAME)));
session_start();

define('FUNC_ACCESS', true);

require "functions/link.php";
require "functions/random.php";
require "functions/csrf.php";