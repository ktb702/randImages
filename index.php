<!-- emailable form to be located on this website
        turn in link to contact form and make sure homepage/contact works on the navigation -->
<?php
include('includes/config.php');
include('includes/header.php');
?>
    <div id="wrapper">
    <h1 class="<?php echo $center; ?>"> <?php echo $mainHeadline;  ?> </h1>

    <?php
    echo randImages($photos); //create a function to choose images randomly
    ?>
    <blockquote>
    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque et tortor id ipsum tincidunt dignissim id ut nibh. Morbi quis augue pretium, auctor sem eget, egestas eros. Mauris justo mauris, accumsan egestas enim in, ullamcorper vestibulum neque. Curabitur porttitor ante turpis, id venenatis leo tristique et."
     </blockquote>
    <p class="center"><a href="https://github.com/ktb702/randImages">Here is my <strong>EXTRA CREDIT LINK</strong> link to my Github acount showing you my randImages function (index.php and config.php)</a></p>
    
     
<?php 
include('includes/footer.php');
?>