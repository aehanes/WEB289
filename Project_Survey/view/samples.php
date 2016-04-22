<?php
include('view/header.php');
$title = "Samples";
?>
<div id="main">
<h1><?php echo $title; ?></h1>
</div>

<div class="container">
<?php if (empty($_SESSION['userLevel'])) { ?>
  <p>You must be logged in to view this page. Please <a href="index.php?action=login">login</a> or <a href="index.php?action=register">register</a> to continue.</p>
<?php } ?>
    <!-- survey -->
    <div class="row">
      <div class="col-sm-12">
      <!-- print out survey -->

      
  <div class="survey">

  <?php if ((!empty($_SESSION)) && ($_SESSION['userLevel'] == 'A')) { ?>
    <h2>Create Samples</h2>
     <p>Please choose the Samples for <?php $today = date("F j, Y") ?> <?php echo $today; ?>.</p>


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
                <input name="action" type="hidden" value="createSample">
                <button type="submit" formaction="." class="btn btn-default">Save sample</button>
              </div>
            </div>

          </form> <!-- end inline form -->


          <div class="createdSamples">
            <ul>
             <?php $samples = getSamples();
               foreach($samples as $sample) {
               $brand_name = getBrand($sample['brandID']);
               $origin_type = getOrigin($sample['originID']); ?>

                  <li><?php print $brand_name['brandName'] . ' | ' . $origin_type['type']; ?></li>
               <?php } ?>
          </ul>
          </div>
            
          <p>To view the completed survey, click <a href="index.php?action=surveys">here.</a></p>  



      </div> <!-- end col-12 -->
    </div> <!-- end row div -->


  <?php } ?>


</div> <!-- end container div
