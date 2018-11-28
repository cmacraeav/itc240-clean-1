<?php include 'config.php'?>
<?php
// sat_view.php
    
    
//process querystring here
if(isset($_GET['id']))
{//process data
    //cast the data to an integer, for security purposes
    $id = (int)$_GET['id'];
}else{//redirect to safe page
    header('Location:customer_list.php');
}


$sql = "select * from SatellitesLaunched where SatID = $id";

$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        $Name = stripslashes($row['Name']);
        $Country = stripslashes($row['Country']);
        $DateLaunched = stripslashes($row['YearLaunched']);
        $title = "Title Page for " . $Name;
        $pageheader = $Name;
        $subheader ='Read on for additional information about the ' . $Name . ' launch!';
        $Feedback = '';
    }    

}else{//inform there are no records
    $Feedback = '<p>This space device does not exist</p>';
}

?>
<?php include 'header.php';?>
<?php
    
    
if($Feedback == '')
{//data exists, show it

    echo '<p style="border: 1px solid black; padding: 7px;">';
    echo '<b>Name: </b>' . $Name . '</br> ';
    echo '<b>Country: </b>' . $Country . '</br> ';
    echo '<b>Date Launched: </b>' . $DateLaunched . '</br> ';
    
    echo '<img style="display:block; max-height:200px; padding: 7px;" src="as8images/sat' . $id . '.jpg" />';
    
    echo '</p>'; 
}else{//warn user no data
    echo $Feedback;
}    

echo '<p style="padding:7px;"><a style="color:orange;" href="satellite_list.php">Go back to view the full list.</a></p>';

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?> 

<?php include 'footer.php'?>