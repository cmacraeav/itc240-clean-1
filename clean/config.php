<?php
/*
    config.php
    
    Stores configuration data for our application

slogan
subheader
sitename
pageheader
*/

// echo basename($_SERVER['PHP_SELF']);

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//echo 'the constant is storing: ' . THIS_PAGE;

//die;

//Default page values

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
    case 'about.php':
        $title = 'About Us';
    break;
    case 'sample.php': $title = 'Sample Post';
    break;
    
};

?>