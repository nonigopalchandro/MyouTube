<?php
include 'info.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title><?php echo ''.$title.'';?></title>
    <!-- Meta Tags -->
     <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
     <meta name="viewport" content="width=device-width, initial-scale=1"/>
     <meta name="description" content="<?php echo ''.$description.'';?>"/>
     <meta name="keywords" content="<?php echo ''.$keywords.'';?>"/>
     <meta name="copyright" content="<?php echo ''.$copyright.'';?>"/>
     <meta name="language" content="EN"/>
     <meta name="robots" content="index,follow"/>
     <meta name="author" content="<?php echo ''.$author.'';?>"/>
     <meta name="owner" content="<?php echo ''.$owner.'';?>"/>
     <meta name="url" content="http://<?php echo ''.$host.'';?>/"/>
     <meta name="revisit-after" content="7 days"/>
     <meta name="google-site-verification" content="<?php echo ''.$verification.'';?>"/>
    <link rel="icon" href="<?php echo ''.$site.'';?>/favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="css/style.css"/>
     
</head>
<body>

<header><a href="<?php echo ''.$site.'';?>"><img src="<?php echo ''.$site.'';?>/code/img/logo.png" height="30px" width="auto"/></a>
</header>

<div class="tags">
ads here
</div>

<div class="search"><form id="searchform" method="get" action="/search.php" method="post" class="input-group"><input class="block" type="text" id="q" name="q" placeholder="Search What You Want!!" id="input" autocomplete="on" required><span class="inp-btn"><input type="submit" value="Search"></span></form></div>