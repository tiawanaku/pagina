<?php
session_start();
session_destroy();
echo '<script>alert("logout Success");window.location.assign("ingre.php")</script>';

?>
