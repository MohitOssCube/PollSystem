<?php
/*
 * Creation Log File Name - index.php 
 * Description - skillseeker index file
 * Version - 1.0 
 * Created by - Anirudh Pandita 
 * Created on - May 3, 2013 
 * *************************************************
 */

/* Starting session  */
ini_set("display_errors","1");
session_start();

/* Including all constants to be used */
require_once getcwd().'/libraries/constants.php';

/* Requiring all essential files */
function __autoload($controller) {
	include SITE_PATH .'/Controller/'.$controller . '.php';
}
/* Method calls from views handled here */

//header ,left,right 

if (isset ( $_REQUEST ['controller'] )) {
		
		if (isset ( $_REQUEST ["method"] )) {
		
			// Creating object of controller to initiate the process
			$object = new $_REQUEST ["controller"] ();
			//print $_REQUEST ["method"];die;
			if (method_exists ( $object, $_REQUEST ["method"] )) {
			
				$Question=$object->$_REQUEST ["method"] ();
				if($_REQUEST ["method"]=='pollLoad')
				{
					$object->loadView("dopoll",$Question);
				}
				if($_REQUEST ["method"]=='loadView')
				{
					$object->loadView("main");
				}
				
			}

	}
}else if (isset($_POST['loginStatus']))
{
	$objMainController = new mainController();
	$objMainController->loadView("poll");
}
else
{

		/* Showing the main Login view */
	    $objMainController = new mainController();    
	    $objMainController->loadView("main");
}
 

//footer..
?>

