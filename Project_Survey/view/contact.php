<!-- 
	Author: Ashley Hanes
	Revision Date: 05/05/2016
	File Name: contact.php
	Description: Contact page for the brewery
-->	

<?php
include('view/header.php');
$title = "Contact Us";
?>
<div id="main">
<h1><?php echo $title; ?></h1>
</div>

<div class="container">
  <img class="contact-brewery, img-responsive" src="images/brewery-people.jpg" height="300px" width="500px" alt="People at Highland">
<address>
  <strong>Highland Brewery</strong><br>
  12 Old Charlotte Hwy<br>
  Asheville, NC 28803<br>
  <abbr title="Phone">P:</abbr> (828) 299-3370
</address>

<address>
  <strong>Highland QC Dept</strong><br>
  <a href="mailto:#">hqcdept@test.com</a>
</address>
</div>

<?php include("view/footer.php"); ?>


