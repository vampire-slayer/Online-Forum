<?php

include 'connect.php';
include 'header.php';

$cat =  mysql_real_escape_string($_GET['id']);
$sql = "SELECT
cat_id,
cat_name,
cat_description
FROM
categories
WHERE
cat_id = '".$cat."'";

$result = mysqli_query($con, $sql) or die(mysqli_error($con));
if(!$result)
{
    echo 'The category could not be displayed, please try again later.';
}
else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'This category does not exist.';
    }
    else
    {
        while($row = mysqli_fetch_array($result))
        {
            echo "<h2>Topics in "  . $row['cat_name'] . " " . "category</h2>";
        }

        $sql = "SELECT  
        topic_id,
        topic_subject,
        topic_date,
        topic_cat
        FROM
        topics
        WHERE
        topic_cat = '" . mysql_real_escape_string($_GET['id']) . "'";
        
        $result = mysqli_query($con, $sql);
        
        if(!$result)
        {
            echo 'The topics could not be displayed, please try again later.';
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo 'There are no topics in this category yet.';
            }
            else
            {
                echo '<table border="1">
                <tr>
                    <th>Topic</th>
                    <th>Created at</th>
                </tr>'; 
                
                while($row = mysqli_fetch_array($result))
                {               
                    echo '<tr>';
                    echo '<td class="leftpart">';
                    echo '<h3><a href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><h3>';
                    echo '</td>';
                    echo '<td class="rightpart">';
                    echo date('d-m-Y', strtotime($row['topic_date']));
                    echo '</td>';
                    echo '</tr>';
                }
            }
        }
    }
}

include 'footer.php';
?>