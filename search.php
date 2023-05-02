<?php
include 'inc/func.php';
include 'inc/info.php';
if($_GET['q'])
{
$q = $_GET['q'];
$qu=$q;
} 
$title ='Search For '.$q.' to 3GP, MP4, FLV, WEBM, HD and MP3 Format Download - '.$sitename.'';
include 'inc/head.php';
echo '<div><h3>Results: '.$q.'</h3></div>';
$qu=$q;
$qu=str_replace(" ","+", $qu);
$qu=str_replace("-","+", $qu);
$qu=str_replace("_","+", $qu); 
if(strlen($_GET['page']) >1)
{
$yesPage=$_GET['page'];
}
else
{
$yesPage='';
}
$grab=ngegrab('https://www.googleapis.com/youtube/v3/search?part=snippet&order=relevance&regionCode=lk&q='.$qu.'&key='.$key.'&maxResults=20&pageToken='.$yesPage.'&type=video');
$json = json_decode($grab);
$nextpage=$json->nextPageToken;
$prevpage=$json->prevPageToken;
if($json)
{
foreach ($json->items as $hasil)
{
$id          = $hasil->id->videoId;
$name        = $hasil->snippet->title;
$ud          = strtolower("$ln");
$description = $hasil->snippet->description;
$channel     = $hasil->snippet->channelTitle;
$channelid   = $hasil->snippet->channelId;
$addedon     = dateyt($hasil->snippet->publishedAt);
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
echo '<ul class="itemlist"><li><div class="thumb"><img src="http://ytimg.googleusercontent.com/vi/'.$id.'/mqdefault.jpg" alt="'.$id.'" width="60px" height="55px" alt="'.$id.'"/></div><div class="meta"><a href="/watch?v='.$id.'" title="'.$name.'"><b>'.$name.'</b></a><br/>By '.$channel.'</div></li></ul>';
}


echo '<li class="paging">';
if (strlen($prevpage)>1)
{
if (strlen($qu)>1)
{
echo '<a href="/search.php?q='.$qu.'&page='.$prevpage.'" class="page" title="Previous Page">Prev</a>';
}
}
if (strlen($nextpage)>1)
{
if (strlen($qu)>1)
{
echo '<a href="/search.php?q='.$qu.'&page='.$nextpage.'" style="float:right;" title="Next Page">Next</a>';
}
}
echo '</li>';
}
if(!empty($qu) AND empty($_GET['utm_token']))
{
$user_query = ''.$qu.'';
write_to_file($user_query);
}

echo '<div class="tags">
ads here
</div>';

include 'recent_search.php';
include 'inc/foot.php';
?>
