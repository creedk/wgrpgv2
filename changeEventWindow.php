<?php

	include_once 'RPGCharacter.php';
	include_once 'UISettings.php';
	
	session_start();

	if(isset($_REQUEST['changeTo'])){
		$strChangeTo = $_REQUEST['changeTo'];
		if($strChangeTo == "StatGain"){
			$_SESSION['objRPGCharacter']->setStateID(9);
			header('Location: main.php?page=DisplayGameUI');
		}
		else if($strChangeTo == "SkillView"){
			$_SESSION['objRPGCharacter']->setStateID(10);
			header('Location: main.php?page=DisplayGameUI&intClassID=' . $_REQUEST['intClassID']);
		}
		else{
			header('Location: main.php?page=DisplayGameUI');
		}
	}
	
	exit;
	
?>