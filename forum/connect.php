<?php

$con=mysqli_connect ("localhost","root","","forum");

if (mysqli_connect_errno()) 
{
	echo "failed to connect mysql: ". mysqli_connect_error();
}

?>
