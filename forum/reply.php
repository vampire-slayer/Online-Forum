<form method="post" action="reply.php?id=5">
	<textarea name="reply-content"></textarea>
	<input type="submit" value="Submit reply">
</form>
<?php

include 'connect.php';
include 'header.php';

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
	echo 'This file cannot be called directly.';
}
else
{
	if(!$_SESSION['signed_in'])
	{
		echo 'You must be signed in to post a reply.';
	}
	else
	{
		$sql = "INSERT INTO 
		posts(post_content,
		post_date,
		post_topic,
		post_by) 
		VALUES ('" . $_POST['reply-content'] . "',
		NOW(),
		" . mysql_real_escape_string($_GET['id']) . ",
		" . $_SESSION['user_id'] . ")";

		$result = mysqli_query($con, $sql);

		if(!$result)
		{
			echo 'Your reply has not been saved, please try again later.';
		}
		else
		{
			header ("refresh:0;url=topic.php?id=" . htmlentities($_GET['id'] ));
		}
	}
}

include 'footer.php';
?>