<?php
define("APPID","495182610616528");
define("SECRET","bdf48bb2f3782cf7e81a40aaa067fc62");

require 'facebook/facebook.php';

$facebook = new Facebook(array(
  'appId'  => APPID,
  'secret' => SECRET,
'sharedSession' => true
));


?>
