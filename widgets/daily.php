<?php include 'includes/config.php'?>
<?php 

    /*
    
    If day is passed via GET, show $day's drink
    If it's today, show $today's drink
    Place a link to show today's drink, if on another day
    
    
    */
    
    
    
if(isset($_GET['day'])){ //If day is passed via GET, show $day's drink
  $today = $_GET['day'];
    
    
}else{ //If it's today, show $today's drink
    $today = date('l');


}; 


    switch($today){
        
    case 'Monday':
        $coffee = 'pumpkin spice latte';
        $color = 'darkorange';
        $picture = 'pumpkin.jpg';
        $alt = 'Delicious pumpkin spice.';
    break;
    
      case 'Tuesday':
        $coffee = 'mocha';
        $color = 'rosybrown';
        $picture = 'mocha.jpg';
        $alt = 'Creamy, chocolate decadence';
    break;
        
    case 'Wednesday':
        $coffee = 'cappuccino';
        $color = 'sandybrown';
        $picture = 'capp.jpg';
        $alt = 'Foamy goodness.';
    break;

    case 'Thursday':
        $coffee = 'americano';
        $color = 'gainsboro';
        $picture = 'americano.jpg';
        $alt = 'Simple and efficient.';
    break; 
        
    case 'Friday':
        $coffee = 'oreo milkshake';
        $color = 'skyblue';
        $picture = 'oreo.jpg';
        $alt = 'Stepping out of the ordinary, here!';
    break;  
        
    case 'Saturday':
        $coffee = 'bloody Mary';
        $color = 'indianred';
        $picture = 'bloodymary.jpg';
        $alt = 'Recover from the night before\'s fesitivities!';
    break;  
        
    case 'Sunday':
        $coffee = 'mimosa';
        $color = 'lightpink';
        $picture = 'mimosa.jpg';
        $alt = 'The only morning drink you need.';
    break;  
};
    
    
//$today = date('l');



?>
<?php get_header()?>
  
    <p><?=$today?>'s special is Pumpkin Spice.</p>

    <div id="wrapper" style="background:<?=$color?>">
        <main>
            <img class="left" src="images/<?=$picture?>" alt="<?=$alt?>">
            
            <p style="font-weight:bold">Happy <?=$today?>!</p>
            <p><?=$today?>'s featured drink is a <?=$coffee?> and our themed color is <?=$color?>. Check out a picture of our delicious special!</p>
            <p>Be sure to check our website for tomorrow's drink special.</p>
        </main>
            
      </div>

    <p>Click below to find out what awesome flavors we have for each day of the week.</p>

    <p><a href="daily.php?day=Sunday">Sunday</a></p>
    <p><a href="daily.php?day=Monday">Monday</a></p>
    <p><a href="daily.php?day=Tuesday">Tuesday</a></p>
    <p><a href="daily.php?day=Wednesday">Wednesday</a></p>
    <p><a href="daily.php?day=Thursday">Thursday</a></p>
    <p><a href="daily.php?day=Friday">Friday</a></p>
    <p><a href="daily.php?day=Saturday">Saturday</a></p>

<?php get_footer()?>