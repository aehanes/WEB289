<?php
include('view/header.php');
$title = "Brands";
?>
<div id="main">
<h1><?php echo $title; ?></h1>
</div>

<div class="container">
<?php if (empty($_SESSION['userLevel'])) { ?>
  <p>You must be logged in to view this page. Please <a href="index.php?action=login">login</a> or <a href="index.php?action=register">register</a> to continue.</p>
<?php } ?>

  <div class="brands">

  <?php if ((!empty($_SESSION)) && ($_SESSION['userLevel'] == 'A')) { ?>

	<form class="form-horizontal" action="index.php" method="POST">
	  <div class="form-group">
	    <label for="brands" class="col-sm-2 control-label">Brands</label>
	    <div class="col-sm-6">
	      <input value="" type="text" class="form-control" name="brand" id="brand" required>
	  </div>

	  <div class="row">
      <div class="col-sm-2">
        <input name="action" type="hidden" value="addBrand">
        <button type="submit" formaction="." class="btn btn-default">Add Brand</button>
      </div>
    </div>
    </div>
	</form> <!-- end brand form -->

	<?php $brands = getBrands(); ?>
	
	<?php foreach ($brands as $brand) { ?>
		<li><?php echo $brand['brandName']; ?></li>
    <?php } ?>

	<form class="form-horizontal" action="index.php" method="POST">
	  <div class="form-group">
	    <label for="origins" class="col-sm-2 control-label">Origins</label>
	    <div class="col-sm-6">
      	  <input value="" type="text" class="form-control" name="origin" id="origin" required>
      </div>

      <div class="row">
      <div class="col-sm-2">
        <input name="action" type="hidden" value="addOrigin">
        <button type="submit" formaction="." class="btn btn-default">Add Origin</button>
      </div>
    </div>
</div>
   </form> <!-- end form -->

   <?php 
	$origins = getOrigins();
	?>
	
	<?php foreach ($origins as $origin) { ?>
		<li><?php echo $origin['type']; ?></li>
    <?php } ?>
  </div>
</div> <!-- end brands div -->


<?php } ?> 
</div> <!-- end container div -->




