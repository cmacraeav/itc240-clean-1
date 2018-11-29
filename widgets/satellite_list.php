<?php include 'includes/config.php'?>
<?php get_header()?>

<p>Clever content goes here!</p>  

<?php
$sql = "select * from SatellitesLaunched";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        echo '<p style="border: 1px solid black;">';
        echo '<b>Name: </b>' . $row['Name'] . '</br> ';
        echo '<b>Country: </b>' . $row['Country'] . '</br> ';
        echo '<b>Date Launched: </b>' . $row['YearLaunched'] . '</br> ';
        echo '<b>Description: </b>' . $row['Description'] . '</br> ';
        
        echo '<a style="color:orange;" href="sat_view.php?id=' . $row['SatID'] . '">' . $row['Name'] . '</a>';
        
        echo '</p>';
    }    

}else{//inform there are no records
    echo '<p>There are currently no satellites to display.</p>';
}

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>

<?php get_footer()?>