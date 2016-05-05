<!-- 
  Author: Ashley Hanes
  Revision Date: 05/05/2016
  File Name: surveys.php
  Description: Where the member takes the survey.
--> 

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

    <?php

    if (!empty($_SESSION)) {
      if ($_SESSION['userLevel'] == 'A') {
        include('view/surveys-admin.php');
      }
      else { ?>

      <h2>Take Survey</h2>
        <!-- Take survey -->
        <div class="row">
          <div class="col-sm-12">
            <p>Thank you <?php echo ucfirst(($_SESSION['userName'])); ?> for participating! Please take the survey for <?php $today = date("F j, Y") ?> <?php echo $today; ?>.</p>

        <?php

         try {

          // Find out how many items are in the table
          $total = getSamplesCount();

          // Limit the samples to 1.
          $limit = 1;

          // How many pages will there be
          $pages = ceil($total / $limit);

          // What page are we currently on?
          $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
              'options' => array(
                  'default'   => 1,
                  'min_range' => 1,
              ),
          )));

          // Calculate the offset for the query
          $offset = ($page - 1)  * $limit;

          // Some information to display to the user
          $start = $offset + 1;
          $end = min(($offset + $limit), $total);

          // The "back" link
          $prevlink = ($page > 1) ? '<a href="?action=surveys&page=1" title="First page">&laquo;</a> <a href="?action=surveys&page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

          // The "forward" link
          $nextlink = ($page < $pages) ? '<a href="?action=surveys&page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?action=surveys&page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

          // Return an iteration from the samples table.
          $samples = getSamplesNew($limit, $offset);

            // Do we have any results?
            if($samples) {
              foreach ($samples as $row) { ?>

                <form class="form-inline" action="?action=confirmation" method="POST">

              <?php
                $questions = getQuestions();
                $brand_name = getBrand($row['brandID']);
                $origin_type = getOrigin($row['originID']);
              ?>

                  <div class="form-group col-sm-12">
                    <h3><?php print $page . ". " . $brand_name['brandName'] . ' - ' . $origin_type['type']; ?> </h3>
                      <?php foreach($questions as $question) { ?>
                        <p><?php print $question['questionText']; ?></p>
                          <input type="radio" name="<?php print 'question' . $question['questionID']; ?>" value="Yes">Yes<br>
                          <input type="radio" name="<?php print 'question' . $question['questionID']; ?>" value="No">No<br>
                      <?php } //end question loop ?>
                    <h4>Notes</h4>
                      <input type="textarea" name="notes" size="40">
                      <input type="hidden" name="batch" value="<?php print $row['batch']; ?>">
                      <input type="hidden" name="sampleID" value="<?php print $row['sampleID']; ?>">
                  </div>

                 <?php } //end sample loop ?> 
                  <input name="action" type="hidden" value="submitSurvey">
                    <?php $gotonextlink = ($page < $pages) ? '<button type="submit" formaction="?action=surveys&page=' . ($page + 1) . '" title="Submit" class="btn btn-default">Submit</button>' : '<a class="btn btn-default" href="?action=confirmation">Submit Survey</a>';?>

                    <?php print $gotonextlink; ?>

                </form>

            <?php

            // Display the paging information
            echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';

            } else {
              echo "No results to display.";
            }    
          } catch (Exception $e) {
              echo '<p>', $e->getMessage(), '</p>';
          }
        }
      }
    ?>


    </div>

</div> <!-- end container div -->

<?php include("view/footer.php"); ?>
