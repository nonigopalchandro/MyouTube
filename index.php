<?php
include 'inc/func.php';
include 'inc/info.php';

$title = ''.$sitename.' | Online YouTube Video and Mp3 Download Zone';
include 'inc/head.php';
if($_GET['q'])
{
$q = $_GET['q'];
} 
else 
{
$a = array("Simpal Kharel");
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
$grab = ngegrab('https://www.googleapis.com/youtube/v3/search?part=snippet&order=relevance&regionCode=lk&q='.$qu.'&channelId=UCewbVCg5R3C9IBVrp-u0VFw&key='.$key.'&maxResults=30&pageToken='.$yesPage.'&type=video');
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
Duration: '.$duration.' | Views: '.$views.'
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

include_once './recent_search.php';

include 'inc/foot.php';
?>
 
