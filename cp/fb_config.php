<?php 

@session_start();
require_once('Facebook/autoload.php');

$FB = new \Facebook\Facebook([

		'app_id' => '1737106829922687',
		'app_secret' => 'ef2b2d60de7c491422435b965adc3ce4',
		'default_graph_version' => 'v2.10' 
	]);

$helper = $FB->getRedirectLoginHelper();