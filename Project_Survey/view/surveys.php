<?php
include('view/header.php');
$title = "Surveys";
?>
<div id="main">
<h1><?php echo $title; ?></h1>
</div>

<div class="container">
<?php if (empty($_SESSION['userLevel'])) { ?>
  <p>You must be logged in to view this page. Please <a href="index.php?action=login">login</a> or <a href="index.php?action=register">register</a> to continue.</p>
  <?php } ?>
<?php if ((!empty($_SESSION)) && ($_SESSION['userLevel'] == 'M')) { ?>
    <h2>Take Survey</h2>
    <p>Thank you <?php echo ucfirst(($_SESSION['userName'])); ?> for participating! Please take the survey for <?php $today = date("F j, Y") ?> <?php echo $today; ?>.</p>
    <!-- survey -->
    <div class="row">
      <div clsas="col-sm-12">

    <!-- print out the survey that is stored in the database with a "submit"survey button -->
    <div class="survey">
  <?php } ?>
  <?php if ((!empty($_SESSION)) && ($_SESSION['userLevel'] == 'A')) { ?>
    <h2>Create Survey</h2>
     <p>Please choose the Sample for <?php $today = date("F j, Y") ?> <?php echo $today; ?>.</p>


       <div class="row">
         <div class="col-sm-12">


          <form class="form-inline" action="." method="POST">
            <div class="form-group">
              <select name="brand" class="form-control">
                <!-- dropdown list of brand -->
                <?php $brands = getBrands(); ?>
                <option selected>Please choose a Brand</option>

                <?php foreach($brands as $brand) { ?>
                <option value="<?php echo $brand['brandID']; ?>"><?php echo $brand['brandName']; ?></option>
                <?php } ?>

              </select>
            </div><!-- end form group -->

            <div class="form-group">
              <select name="origin" class="form-control">
                <!-- dropdown list of origins -->
                <?php $origins = getOrigins(); ?>
                  <option selected>Please choose an Origin</option>

                <?php foreach($origins as $origin) { ?>
                  <option value="<?php echo $origin['originID']; ?>"><?php echo $origin['type']; ?></option>
                <?php } ?>
              </select>
            </div><!-- end form group -->

            <div class="form-group">
              <label for="batch">Batch #:</label>
                <input value="" type="text" class="form-control" name="batch" id="batch" placeholder="Batch #" required>
            </div>

            <div class="row">
              <div class="col-sm-2">
                <input name="action" type="hidden" value="create-survey">
                <button type="submit" formaction="." class="btn btn-default">Create Survey</button>
              </div>
            </div>

          </form> <!-- end inline form -->




      </div> <!-- end col-12 -->
    </div> <!-- end row div -->


  <?php } ?>


</div> <!-- end container div
