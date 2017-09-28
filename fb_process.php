<?php 

 include('config.php');
 require_once('fb_config.php');

 try {
 	$accessToken = $helper->getAccessToken();
 }catch(\Facebook\Exceptions\FacebookResponsException $e) {
 	echo 'Rsponse Exception '. $e->getMessage();
 	exit();

 }catch(\Facebook\Exceptions\FacebookSDKException $e) {
 	echo 'SDK Exception '. $e->getMessage();
 	exit();
 }

 if(!$accessToken) {
 	header('Location: register.php');
 }

 $oAuth2Client = $FB->getOAuth2Client();

 if(!$accessToken->isLongLived()) {

 	$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);

 }

 $respons = $FB->get("/me?fields=id, first_name, last_name, picture.type(large)", $accessToken);

 $userData = $respons->getGraphNode()->asArray();

 $_SESSION['userinfo'] = $userData;
 $_SESSION['access_token'] = $accessToken;

 $_SESSION['username'] = strtolower($_SESSION['userinfo']['first_name'].$_SESSION['userinfo']['last_name']);
 
?>