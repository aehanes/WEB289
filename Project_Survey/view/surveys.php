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
    <div class="survey">
  <?php } ?>
<?php if ((!empty($_SESSION)) && ($_SESSION['userLevel'] == 'A')) { ?>
    <h2>Create Survey</h2>
     <p>Please create the survey for <?php $today = date("F j, Y") ?> <?php echo $today; ?>.</p>
    <!-- <form>
    <div class="form-group">
      <select class="form-control">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
      </select>
      <label class="radio-inline">Is Appearance TTT?
        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> no
      </label>
      <label class="radio-inline">Is Aroma TTT?
        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> no
      </label>
      <label class="radio-inline">Is Flavor True to Type?
        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> no
      </label>
      <label class="radio-inline">Is Mouthfeel True to Type?
        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> no
      </label>
      <label class="radio-inline">Is this Beer TTT Overall?
        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> yes
      </label>
      <label class="radio-inline">
        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> no
      </label>
      <label>Notes:
      <textarea class="form-control" rows="3"></textarea>
    </label> -->
    </div> <!-- end survey form -->
    </form>
  <?php } ?>


</div> <!-- end container div
