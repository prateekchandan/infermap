<?php
ob_start();
include ("connection.php");
include("facebook_constants.php");

$users = $facebook->getUser();
print_r($users);

/*if ($users!="") {	
	echo 'here';
  try {

    $user_profile = $facebook->api('/me');
	$logoutUrl = $facebook->getLogoutUrl();
	$fuserid=$user_profile["id"];
	$fusername=$user_profile["username"];
	$newtoken=base64_encode($fuserid."::".$fusername);

	$msql = mysql_query("SELECT * FROM registration WHERE passcode='".$fuserid."'" );

	if(mysql_num_rows($msql)>0){
		$sqlrow=mysql_fetch_object($msql);
		header('Location:my_connected_minds.php');
	}
	else{		
		header('Location:register_fb.php?token='.$newtoken);
		exit;
	}

  } catch (FacebookApiException $e) {
    $users = null;
  }
}*/
?>

