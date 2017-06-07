<?php

include 'connect.php';
include 'header.php';

echo "<h2>Create a category</h2>";

if((!isset($_SESSION['signed_in'])) ||  $_SESSION['signed_in']== false)
{
	echo "Sorry, you have to be signed in to post to that topic.";
}
else
{
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        echo '<form method="post" action="">
            Category name: <input type="text" name="cat_name"><br>
            Category description:<br> <textarea name="cat_description"></textarea><br>
            <input type="submit" value="Add category" />
        </form>';
    }
    else
    {
        $sql = "INSERT INTO categories(cat_name, cat_description)
        VALUES( '".mysql_real_escape_string($_POST['cat_name'])."',
        '".mysql_real_escape_string($_POST['cat_description'])."' )";
        $result = mysqli_query($con, $sql);
        if(!$result)
        {
            echo 'Error!' ;
        }
        else
        {
            echo 'New category successfully added.';
        }
    }
}

include 'footer.php';
?>
