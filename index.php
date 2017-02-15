<?php


$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

// function links($url = ''){
//     if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
//      $protocol = 'http://';
//      } else {
//          $protocol = 'https://';
//      }
//      $base_url = $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
//      return $public = $base_url.'/public/'.$url;
// }

require_once __DIR__.'/public/index.php';
