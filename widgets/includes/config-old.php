<?php
/*
    config.php
    
    Stores configuration data for our application

*/



ob_start(); //Prevents header errors
define('DEBUG',TRUE); #we want to see all errors

include 'credentials.php'; //Database credentials

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));


// Here are the URLs and page names for our main navigation
$nav1['index.php'] = 'Home';
$nav1['daily.php'] = 'Daily';
$nav1['db-test.php'] = 'DB-Test';
$nav1['customer_list.php'] = 'Customers';
$nav1['satellite_list.php'] = 'A8: Satellites';
$nav1['contact.php'] = 'Contact';



$title = THIS_PAGE;
$sitename = 'Chris\' ITC240 Project';
$slogan = 'Doing all the things really well!';
$pageheader = 'Super unique page header!';
$subheader ='Default subheader.';


switch(THIS_PAGE){  
    case 'index.php':
        $title = 'Home';
    break;
    case 'template.php':
        $title = 'Template';
        $pageheader = 'Page ID here.';
        $subheader ='Basic page information here.';
    break;
    case 'daily.php':
        $title = 'Daily Page';
        $pageheader = 'Daily drink specials.';
        $subheader ='See what drink is on the menu today!';
    break;
    case 'contact.php':
        $title = 'Contact Us';
        $pageheader = 'Contact Us!';
        $subheader ='We value your feedback.';
    break;
    case 'db-test.php':
        $title = 'A database test page';
        $pageheader = 'Database Test Page!';
        $subheader ='Check this page to see if your db credentials are correct..';
    break;
    case 'about.php':
        $title = 'About Us';
    break;
    case 'customer_list.php':
        $title = 'A list of customers';
        $pageheader = 'Our customers';
        $subheader ='Subheader goes here - make it about celebrities... or something.';
    break;
    case 'satellite_list.php':
        $title = 'Satellite Launches Around The World';
        $pageheader = 'Satellite launches from around the world.';
        $subheader ='Find information about select satellite launches from around the world!';
    break;
    case 'sample.php': 
        $title = 'Sample Post';
    break;
    
};


function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
		echo "I'm sorry, we have encountered an error.  Would you like to buy some socks?";
		die();
    }
}


/*
makeLinks creates navigation items from an array -- echo makeLinks($nav1);
*/

function makeLinks($nav){
    
    $myReturn = '';
    foreach($nav as $key => $value){
        if(THIS_PAGE == $key){ //Current page! Add active class
            $myReturn .= '
            <li class="nav-item">
              <a class="nav-link active" href="' . $key . '">' . $value . '</a>
            </li>
            ';
            
        }else{ //Add NO formatting
            $myReturn .= '
            <li class="nav-item">
              <a class="nav-link" href="' . $key . '">' . $value . '</a>
            </li>
            ';   
        }
        
        

    }
    
    return $myReturn;
}










?>