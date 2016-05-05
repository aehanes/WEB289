<!-- 
  Author: Ashley Hanes
  Revision Date: 05/05/2016
  File Name: brands.php
  Description: Allows admin to update brands with most recent varieties and origins. Display a list of all brands and origins.
--> 

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
	    <label for="brands" class="col-sm-1 control-label">Brands</label>
	    <div class="col-sm-6">
	      <input value="" type="text" class="form-control" name="brand" id="brand" required>
	  </div>

      <div class="col-sm-2">
        <input name="action" type="hidden" value="addBrand">
        <button type="submit" formaction="." class="brand btn btn-default">Add Brand</button>
      </div>
    </div>
	</form> <!-- end brand form -->

  <div class="row">

    <div class="Brands">
        <ul class="list-group col-sm-4">
        	<?php $brands = getBrands(); ?>
        	
        	<?php foreach ($brands as $brand) { ?>
        		<li class="list-group-item"><?php echo $brand['brandName']; ?></li>
            <?php } ?>
            <ul>
    </div>
  </div>

    <div class="row">

	<form class="form-horizontal" action="index.php" method="POST">
	  <div class="form-group">
	    <label for="origins" class="col-sm-1 control-label">Origins</label>
	    <div class="col-sm-6">
      	  <input value="" type="text" class="form-control" name="origin" id="origin" required>
      </div>

      <div class="col-sm-2">
        <input name="action" type="hidden" value="addOrigin">
        <button type="submit" formaction="." class="brand btn btn-default">Add Origin</button>
      </div>
</div>
   </form> <!-- end form -->

 </div>

 <div class="row">

  <div class="Origins">
      <ul class="list-group col-sm-4">
          <?php $origins = getOrigins(); ?>
	
        	<?php foreach ($origins as $origin) { ?>
        		<li class="list-group-item"><?php echo $origin['type']; ?></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
</div> <!-- end brands div -->


<?php } ?> 
</div> <!-- end container div -->

<?php include("view/footer.php"); ?>




