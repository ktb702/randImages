<?php

define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

switch(THIS_PAGE){
    case 'index.php': 
        $title = 'Homepage for our new website';
        $mainHeadline = 'Welcome to our Home Page!';
        $center = 'center';
        $body = 'home';
    break;
    case 'about.php': 
        $title = 'About page for our new website';
        $mainHeadline = 'Welcome to our wonderful About Page!';
        $center = 'center';
        $body = 'about inner';
    break;
    case 'daily.php': 
        $title = 'Daily page';
        $mainHeadline = 'Welcome to the Daily';
        $center = 'center';
        $body = 'daily inner';
    break;
    case 'customers.php': 
        $title = 'Our very important customers';
        $mainHeadline = 'Hello customers - Good to see you!';
        $center = 'center';
        $body = 'customers inner';
    break;
    case 'contact.php': 
        $title = 'Contact us today!';
        $mainHeadline = 'Welcome to our Contact page!';
        //$center = 'center';
        $body = 'contact inner';
    break;
    case 'thx.php': 
        $title = 'Our thank you page!';
        $mainHeadline = 'Thank you for filling out our form!';
        //$center = 'center';
        $body = 'contact inner';
    break;
    case 'gallery.php': 
        $title = 'Check out our gallery';
        $mainHeadline = 'Welcome to our Gallery page!';
        $center = 'center';
        $body = 'gallery inner';
    break;
    // default:
    //     $title = THIS_PAGE;
    //     $mainHeadline = 'Welcome';
    //     $center = 'center';
    // break;  
}

//nav array
$nav['index.php'] = 'Home';
$nav['about.php'] = 'About';
$nav['daily.php'] = 'Daily';
$nav['customers.php'] = 'Customers';
$nav['contact.php'] = 'Contact';
$nav['gallery.php'] = 'Gallery';

function makeLinks($nav){
    $myReturn = '';
    foreach($nav as $key => $value){
        if(THIS_PAGE == $key){
            $myReturn .= '<li><a href=" '.$key.'" class="active"> '.$value.' </a></li>';
        } else{
            $myReturn .= '<li><a href=" '.$key.'"> '.$value.' </a></li>';
        }
    } //end foreach
    return $myReturn;
}//end makeLinks

// EXTRA CREDIT //
//create a function that randomly generates images for the homepage
$photos[0] = 'photo1';
$photos[1] = 'photo2';
$photos[2] = 'photo3';
$photos[3] = 'photo4';
$photos[4] = 'photo5';

function randImages($photos){
    $i = rand(0, count($photos)-1);
    echo '<img src="./images/'.$photos[$i].'.jpg" alt="Randomly generated image">';
} //end randImages

/**************************************/
/****** PHP FOR EMAILABLE FORM  *******/
/**************************************/

$firstName = '';
$lastName = '';
$email = '';
$tel = '';
$gender = '';
$wines = '';
$comments = '';
$privacy = '';

$firstNameErr = '';
$lastNameErr = '';
$emailErr = '';
$telErr = '';
$genderErr = '';
$winesErr = '';
$commentsErr = '';
$privacyErr = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //we need to declare our errors first. if a field is empty, do something.
    if(empty($_POST['firstName'])){
        $firstNameErr = 'Please fill out your first name!';
    }else{
        $firstName = $_POST['firstName'];
    }
    if(empty($_POST['lastName'])){
        $firstNameErr = 'Please fill out your last name!';
    }else{
        $lastName = $_POST['lastName'];
    }
    if(empty($_POST['email'])){
        $emailErr = 'Please fill out your email!';
    }else{
        $email = $_POST['email'];
    }
    if(empty($_POST['tel'])){
        $telErr = 'Please fill out your phone number!';
    }else{
        $tel = $_POST['tel'];
    }
    if(empty($_POST['gender'])){
        $genderErr = 'Please pick one!';
    }else{
        $gender = $_POST['gender'];
    }
    if($gender == 'male'){
        $male = 'checked';
    }elseif($gender == 'female'){
        $female = 'checked';
    }
    if(empty($_POST['wines'])){
        $winesErr = 'What?! No wine?';
    }else{
        $wines = $_POST['wines'];
    }
    if(empty($_POST['comments'])){
        $commentsErr = 'Please give us your feedback!';
    }else{
        $comments = $_POST['comments'];
    }
    if(empty($_POST['privacy'])){
        $privacyErr = 'Please agree to our privacy rules!';
    }else{
        $privacy = $_POST['privacy'];
    }

    //if end user checks the checkboxes, all of them, we want to know
    //implode the array of wines - creates a function for that
    function myWines(){
        $myReturn = '';
        if(!empty($_POST['wines'])){
            $myReturn = implode(',', $_POST['wines']);
        } //end if
        return $myReturn;
    } //end myWines

    
    if(empty($_POST['tel'])) {  // if empty, type in your number
        $telErr = 'Your phone number please!';
    } elseif(array_key_exists('tel', $_POST)){
        if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['tel']))
        { // if you are not typing the requested format of xxx-xxx-xxxx, display Invalid format
            $telErr = 'Invalid format!';
        } else{
            $tel = $_POST['tel'];
        }
    } //end ifempty    

    if(isset($_POST['firstName'],
        $_POST['lastName'],
        $_POST['email'],
        $_POST['tel'],
        $_POST['gender'],
        $_POST['wines'],
        $_POST['comments'],
        $_POST['privacy'] ))
        {
            $to = 'katharine.baldwin@seattlecolleges.edu';
            $subject = 'Test Email' .date('m/d/y');
            $body = "$firstName has filled out your form" .PHP_EOL;
            $body .= "Email: $email" .PHP_EOL;
            $body .= "Phone: $tel" .PHP_EOL;
            $body .= 'Your Wines: '.myWines().' '.PHP_EOL;
            $body .= "Gender: $gender" .PHP_EOL;
            $body .= "Comments $comments";

            $headers = array(
                'From' => 'noreply@seattlecollege.edu',
                'Reply-to' => ' '.$email.''
            );
            mail($to, $subject, $body, $headers);
            header('Location: thx.php');
        } //end isset
}

?>