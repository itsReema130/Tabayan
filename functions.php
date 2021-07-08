<?php
	function generateNewString($len = 10) {
		$token = "poiuztrewqasdfghjklmnbvcxy1234567890";
		$token = str_shuffle($token);
		$token = substr($token, 0, $len);

		return $token;
	}

	function redirectToLoginPage() {
		header('Location: login.php');
		exit();
	}
	function redirectToIndexPage() {
		header('Location: index.php');
		exit();
	}
	function redirectToContactUsPage() {
		header('Location: contact-us.php');
		exit();
	}
	function userType($str) {
		$pos = strpos($str, ',', 0); 
		$type=substr($str,$pos+1);
		return $type;
	}
	function userEmail($str) {
		$pos = strpos($str, ',', 0); 
		$type=substr($str,0,$pos);
		return $type;
	}

?>
