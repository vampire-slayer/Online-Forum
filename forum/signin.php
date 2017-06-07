<?php

include 'connect.php';
include 'header.php';

echo '<h3>Sign in</h3>';

if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
	echo 'You are already signed in, you can <a href="signout.php">sign out</a> if you want.';
}
else
{
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		echo '<form method="post" action="">
		Username: <input type="text" name="user_name" />
		Password: <input type="password" name="user_pass">
		<input type="submit" value="Sign in" />
		</form>';
	}
	else
	{
			$errors = array();

			if(!isset($_POST['user_name']))
			{
				$errors[] = 'The username field must not be empty.';
			}

			if(!isset($_POST['user_pass']))
			{
				$errors[] = 'The password field must not be empty.';
			}

			if(!empty($errors)) 
			{
				echo 'Uh-oh.. a couple of fields are not filled in correctly..';
				echo '<ul>';
				foreach($errors as $key => $value)
				{
					echo '<li>' . $value . '</li>'; 
				}
				echo '</ul>';
			}
			else
			{
				$sql = "SELECT 
				user_id,
				user_name,
				user_level
				FROM
				users
				WHERE
				user_name = '" . mysql_real_escape_string($_POST['user_name']) . "'
				AND
				user_pass = '" . sha1($_POST['user_pass']) . "'";

				$result = mysqli_query($con,$sql) or trigger_error("Sorry there is an account assigned to that userid");

				if (mysqli_affected_rows($con) == 1) 
				{

					echo "Login successful! ";

					$row = mysqli_fetch_array ($result, MYSQLI_NUM);
					$body = "Thank you for logging in. <br />";
					echo "<br /><br /><h3>Thank you for logging in!</h3>";
					$_SESSION['signed_in'] = true;

					$_SESSION['user_id'] 	= $row[0];
					$_SESSION['user_name'] 	= $row[1];
					$_SESSION['user_level'] = $row[2];


					session_regenerate_id();
					session_regenerate_id();
					mysqli_close($con);

					exit();

				}
				else 
				{
					session_destroy();
					echo "Invalid username or password!";
				}
			}
		}
	}
?>