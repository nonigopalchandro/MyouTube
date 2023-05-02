<?php
include 'info.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Opps..! 404 Page Not Found | <?php echo ''.$sitename.'';?></title>
    <!-- Meta Tags -->
     <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
     <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="css/style.css"/>
     
</head>
<body>

<header><a href="<?php echo ''.$site.'';?>"><img src="<?php echo ''.$site.'';?>/code/img/logo.png" height="30px" width="auto"/></a>
</header>

<div class="tags">
ads here
</div>

<div class="search"><form id="searchform" method="get" action="/search.php" method="post" class="input-group"><input class="block" type="text" id="q" name="q" placeholder="Search What You Want!!" id="input" autocomplete="off" required><span class="inp-btn"><input type="submit" value="Search"></span></form></div>

<h3>Requested Page Not Found</h3>
<ul class="itemlist">
<li>
<strong><font color="red">May You Are Trying To Input Extra Something In URL. We Couldn't Found The Page That You Was Requested For. Please Be Sure What Are You Trying To Find. Please Use The Search Box To Found It Easily.</font></strong>
</li>
</ul>

<?php
include 'inc/func.php';
include 'inc/info.php';

if($_GET['q'])
{
$q = $_GET['q'];
} 
else 
{
$a = array("Extra Express");
$b = count($a)-1;
$q = $a[rand(0,$b)];
}
$qu=$q;
$qu=str_replace(" ","+", $qu);
$qu=str_replace("-","+", $qu);
$qu=str_replace("_","+", $qu);
echo '<div><h3>Latest Videos</h3></div>';


if(strlen($_GET['page']) >1)
{
$yesPage=$_GET['page'];
}
else
{
$yesPage='';
}
$grab = ngegrab('https://www.googleapis.com/youtube/v3/search?part=snippet&order=relevance&regionCode=lk&q='.$qu.'&channelId=UCirhRxHT_jt4cELr7OzsOZw&key='.$key.'&maxResults=10&pageToken='.$yesPage.'&type=video');
$json = json_decode($grab);
$nextpage=$json->nextPageToken;
$prevpage=$json->prevPageToken;
if($json)
{
foreach ($json->items as $hasil)
{
$id          = $hasil->id->videoId;
$name        = $hasil->snippet->title;
$description = $hasil->snippet->description;
$channel     = $hasil->snippet->channelTitle;
$channelid   = $hasil->snippet->channelId;
$addedon     = dateyt($hasil->snippet->publishedAt);
$thumbnail   = $hasil->snippet->thumbnail;
$hasil       = ngegrab('https://www.googleapis.com/youtube/v3/videos?key='.$key.'&part=contentDetails,statistics&id='.$id.'');
$dt          = json_decode($hasil);
foreach ($dt->items as $dta)
{
$time        = $dta->contentDetails->duration;
$duration    = format_time($time);
$views       = $dta->statistics->viewCount;
$likes       = $dta->statistics->likeCount;
$dislikes    = $dta->statistics->dislikeCount;
}

echo '<ul class="itemlist">
<li>
<div class="thumb">
<a href="/watch?v='.$id.'" title="'.$name.'">
<img src="http://ytimg.googleusercontent.com/vi/'.$id.'/mqdefault.jpg" alt="'.$name.'" width="60px" height="55px" alt="'.$name.'"/></a>
</div>
<div class="meta">
<a href="/watch?v='.$id.'" title="'.$name.'">
<b>'.$name.'</b>
</a>
<br/>
By '.$channel.'
</div>
</li>
</ul>';
}


echo '<div class="nav" style="text-align:center;">';
if (strlen($prevpage)>1)
{
echo '<a href="/index.php?page='.$prevpage.'" class="page_item" title="Previous Page">Prev</a> ';
}
if (strlen($nextpage)>1)
{
echo '';
}
echo '</div>';
}

?>
 


<?php include 'inc/foot.php';?>


