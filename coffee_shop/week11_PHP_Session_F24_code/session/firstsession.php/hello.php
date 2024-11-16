<?php
require  "mylibrary.php";
echo   "Hello " . name() . " This  is  your  page  request number ";
echo count_requests() . " from  this  site";
?>
<br>
<br>
<?php echo "session ID is " . session_id(); ?>
<br>
<br>
<a href="<?php echo "landingPage.php " ?> ">Back to Main </a>