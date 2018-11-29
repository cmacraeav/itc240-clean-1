<?php
/*
config.php

stores configuration information for our web application

*/

//removes header already sent errors
ob_start();

define('SECURE',false); #force secure, https, for all site pages

define('PREFIX', 'widgets_fl18_'); #Adds uniqueness to your DB table names.  Limits hackability, naming collisions

header("Cache-Control: no-cache");header("Expires: -1");#Helps stop browser & proxy caching

define('DEBUG',true); #we want to see all errors

include 'credentials.php';//stores database info
include 'common.php';//stores favorite functions

//prevents date errors
date_default_timezone_set('America/Los_Angeles');

//create config object
$config = new stdClass;

/*/ Adopted php
$config->nav1['index.php'] = "HOME";
$config->nav1['customers.php'] = "CUSTOMERS";
$config->nav1['contact.php'] = "CONTACT";
$config->nav1['daily.php'] = "DAILY";

*/

// Here are the URLs and page names for our main navigation - copied from Clean
$config->nav1['index.php'] = 'Home';
$config->nav1['daily.php'] = 'Daily';
$config->nav1['db-test.php'] = 'DB-Test';
$config->nav1['customer_list.php'] = 'Customers';
$config->nav1['satellite_list.php'] = 'A8: Satellites';
$config->nav1['contact.php'] = 'Contact';

//create default page identifier
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//START NEW THEME STUFF - be sure to add trailing slash!
$sub_folder = 'widgets/';//change to 'widgets' or 'sprockets' etc.
$config->theme = 'Brick';//sub folder to themes

//will add sub-folder if not loaded to root:
$config->physical_path = $_SERVER["DOCUMENT_ROOT"] . '/' . $sub_folder;
//force secure website
if (SECURE && $_SERVER['SERVER_PORT'] != 443) {#force HTTPS
	header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
}else{
    //adjust protocol
    $protocol = (SECURE==true ? 'https://' : 'http://'); // returns true
    
}
$config->virtual_path = $protocol . $_SERVER["HTTP_HOST"] . '/' . $sub_folder;

define('ADMIN_PATH', $config->virtual_path . 'admin/'); # Could change to sub folder
define('INCLUDE_PATH', $config->physical_path . 'includes/');


//CHANGE ITEMS BELOW TO MATCH YOUR SHORT TAGS
$config->title = THIS_PAGE;
$config->banner = 'Widgets';
$config->loadhead = '';//place items in <head> element

//Default page values
$config->sitename = 'Chris\' ITC240 Project';
$config->slogan = 'Doing all the things really well!';
$config->pageheader = 'Super unique page header!';
$config->subheader ='Default subheader.';

/*
Old switch statement, keep for reference.
switch(THIS_PAGE){
        
    case 'contact.php':    
        $config->title = 'Contact Page';    
    break;
    
    case 'appointment.php':    
        $config->title = 'Appointment Page';
        $config->banner = 'Widget Appointments!';
    break;
        
   case 'template.php':    
        $config->title = 'Template Page';    
    break;    
        
        
}
*/

switch(THIS_PAGE){  
    case 'index.php':
        $config->title = 'Home';
    break;
    case 'template.php':
        $config->title = 'Template';
        $config->pageheader = 'Page ID here.';
        $config->subheader ='Basic page information here.';
    break;
    case 'daily.php':
        $config->title = 'Daily Page';
        $config->pageheader = 'Daily drink specials.';
        $config->subheader ='See what drink is on the menu today!';
    break;
    case 'contact.php':
        $config->title = 'Contact Us';
        $config->pageheader = 'Contact Us!';
        $config->subheader ='We value your feedback.';
    break;
    case 'db-test.php':
        $config->title = 'A database test page';
        $config->pageheader = 'Database Test Page!';
        $config->subheader ='Check this page to see if your db credentials are correct..';
    break;
    case 'about.php':
        $config->title = 'About Us';
    break;
    case 'customer_list.php':
        $config->title = 'A list of customers';
        $config->pageheader = 'Our customers';
        $config->subheader ='Subheader goes here - make it about celebrities... or something.';
    break;
    case 'satellite_list.php':
        $config->title = 'Satellite Launches Around The World';
        $config->pageheader = 'Satellite launches from around the world.';
        $config->subheader ='Find information about select satellite launches from around the world!';
    break;
    case 'sample.php': 
        $config->title = 'Sample Post';
    break;
    
};



//creates theme virtual path for theme assets, JS, CSS, images
$config->theme_virtual = $config->virtual_path . 'themes/' . $config->theme . '/';

/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
if(startSession() && isset($_SESSION['AdminID']))
{#add admin logged in info to sidebar or nav
    
    $config->adminWidget = '
        <a href="' . ADMIN_PATH . 'admin_dashboard.php">ADMIN</a> 
        <a href="' . ADMIN_PATH . 'admin_logout.php">LOGOUT</a>
    ';
}else{//show login (YOU MAY WANT TO SET TO EMPTY STRING FOR SECURITY)
    
    $config->adminWidget = '
        <a  href="' . ADMIN_PATH . 'admin_login.php">LOGIN</a>
    ';
}

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