<?php
include 'connect.php';
session_start();
unset ($_SESSION['signed_in']);
session_destroy();
echo "You have been successfully logged out! Redirecting to Forum Home. Please wait...";
header ("refresh:3;url=index.php" );
mysqli_close($con);
exit ();
?>