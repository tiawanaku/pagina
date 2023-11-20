<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['login_type']== 'user'){
}
else{
echo '<script>alert("Alto ingrese de nuevo");window.location.assign("index.php");</script>';
}

?>