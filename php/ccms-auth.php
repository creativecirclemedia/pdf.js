<?php

// // ini_set('error_reporting', E_ERROR);
// require __DIR__ . '/../../../vendor/autoload.php';

// $dotenv = \Dotenv\Dotenv::createImmutable(realpath('../../../'));
// $dotenv->load();
// $dotenv->required(['AUTH_BYPASS', 'PAUTH_SECRET']);

// /* This part transposed from old version */

// // 1/2/23 - temporary auth bypass
// if(
//   !empty($_REQUEST['authbypass'])
//   && $_REQUEST['authbypass'] == $_ENV['AUTH_BYPASS']
// ){

//   // (Bypass auth)

// }else{

//   // Detect permanent or temporary auth
//   if( !empty($_REQUEST['pauth']) ){

//     // Permanent auth attempt
//     $entropy = $_ENV['PAUTH_SECRET'];
//     $check_against = $_REQUEST['pauth'];

//   }else{

//     // Temporary auth attempt
//     $entropy = date('j');
//     $check_against = $_REQUEST['auth'];

//   }

//   // Run the check
//   $auth_should_be = substr(md5(basename($_REQUEST['view']).$entropy),0,10);

//   if(
//     empty($_REQUEST['view'])
//     || empty($check_against)
//     || $check_against != $auth_should_be
//   ){
//     header('HTTP/1.0 401 Unauthorized');
//     echo 'HTTP/1.0 401 Unauthorized';
//     if( $_REQUEST['showauth'] ){
//       echo "<HR>View is ".$_REQUEST['view']."<BR>\n";
//       echo "Date is ".date('j')."<BR>\n";
//       echo "Auth should be ".$auth_should_be."<BR>\n";;
//       echo "Attempted auth is ".$check_against."<BR>\n";;
//     }
//     exit;
//   }

// }
