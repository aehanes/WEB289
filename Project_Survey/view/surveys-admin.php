<!-- 
	Author: Ashley Hanes
	Revision Date: 05/05/2016
	File Name: surveys-admin.php
	Description: Prints out the completed survey, only the admin can see this page.
-->	

<?php 

include_once('model/functions.php');

if ($_SESSION['userID']) {
	$completedSurvey = completedSurvey($_SESSION['userID']);
}

print '<pre>';
print_r($completedSurvey);
print '</pre>';

?>