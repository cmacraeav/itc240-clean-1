<?php
/*
    config.php
    
    Stores configuration data for our application


*/

// echo basename($_SERVER['PHP_SELF']);

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//echo 'the constant is storing: ' . THIS_PAGE;

//die;

switch(THIS_PAGE){  
    case 'index.php':
        $title = 'Home';
    break;
    case 'template.php':
        $title = 'Template';
    break;
    case 'contact.php':
        $title = 'Contact Us';
    break;
    case 'about.php':
        $title = 'About Us';
    break;
    case 'sample.php': $title = 'Sample Post';
    break;
    
    default:
        $title = THIS_PAGE;
};

?>