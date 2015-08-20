<?php

//load the required classes
require("protected/classes/maincontroller.php");  // Parent controller for all controllers
require("protected/classes/basemodel.php"); // Parent model for all models
require("protected/classes/view.php"); 
require("protected/classes/apploader.php"); // Application loader

$loader = new Loader(); //Initiate loading controller
$controller = $loader->createController(); //Create Controller object with requested params
$controller->callAction(); //relevant action on the controller is called

?>