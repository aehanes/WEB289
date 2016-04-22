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

<?php if (!empty($_SESSION)) { ?>
    <h2>Take Survey</h2>
    <p>Thank you <?php echo ucfirst(($_SESSION['userName'])); ?> for participating! Please take the survey for <?php $today = date("F j, Y") ?> <?php echo $today; ?>.</p>
    <!-- survey -->
    <div class="row">
      <div class="col-sm-12">
      <!-- print out survey -->

      <!-- place form inside of foreach (each sample inside of its own form...id based on sample id) -->
      <!-- add increment and variable -->

      <form>
      <?php $samples = getSamples();
        // print '<pre>';
        // print_r($samples);
        // print '</pre>';

        $questions = getQuestions();
        // print '<pre>';
        // print_r($questions);
        // print '</pre>';
       ?> 

       <?php foreach($samples as $sample) { ?>
       <?php $brand_name = getBrand($sample['brandID']); ?>
       <?php $origin_type = getOrigin($sample['originID']); ?>

        <div class="form-group">
         

            <h3><?php print $brand_name['brandName'] . ' - ' . $origin_type['type']; ?> </h3>
                  <?php foreach($questions as $question) { ?>
                  <p><?php print $question['questionText']; ?></p>
                    <input type="radio" name="<?php print $question['questionID']; ?>" value="Yes">Yes<br>
                    <input type="radio" name="<?php print $question['questionID']; ?>" value="No">No<br>
                  <?php } //end question loop ?>

           
              <h4>Notes</h4>
                <input type="textarea" name="<?php print $sample['sampleID']; ?>">
        </div>
        


       <?php } //end sample loop ?> 
        <input name="action" type="hidden" value="submit-survey">
        <button type="submit" class="btn btn-default">Submit</button>

      </form>
    </div>
<?php } ?>

</div> <!-- end container div
