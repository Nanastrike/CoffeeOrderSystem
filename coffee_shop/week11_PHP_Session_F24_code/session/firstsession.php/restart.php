<?php
require  "mylibrary.php";
destroy_session_and_data();
echo "<h2>Session ID is </h2>" . session_id();
?>
<br>
<br>

<?php echo  "<h2> Goodbye </h2> "
?>
<br>
<br>
<a href="<?php echo "landingPage.php " ?> ">Start Again </a>