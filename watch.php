<?php
include 'inc/func.php';
include 'inc/info.php';

$yf=ngegrab('https://www.googleapis.com/youtube/v3/videos?key='.$key.'&part=snippet,contentDetails,statistics,topicDetails&id='.$_GET['v'].'');



$yf=json_decode($yf);
if($yf)
{
foreach ($yf->items as $item)
{
$name          = $item->snippet->title;
$des           = $item->snippet->description;
$date          = dateyt($item->snippet->publishedAt);
$channelid     = $item->snippet->channelId;
$channel       = $item->snippet->channelTitle;
$ctd           = $item->contentDetails;
$duration      = format_time($ctd->duration);
$hd            = $ctd->definition;
$st            = $item->statistics;
$views         = $st->viewCount;
$likes         = $st->likeCount;
$dislikes      = $st->dislikeCount;
$favoriteCount = $st->favoriteCount;
$commentCount  = $st->commentCount;



$download = file_get_contents('https://youtube.com/watch?v='.$_GET['v'].'&type=Download');
{
$title=''.$name.' Download';
}
require_once "inc/head.php";
$tag           = $name;
$tag           = str_replace(" ",",", $tag);
$dtag          = $des;


echo '<h1>'.$name.'</h1><div class="itemlist"><div class="breadcrumb"><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="http://music.howtrick.com" itemprop="url"><span itemprop="title">Home</span></a> › </span><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/search.php" itemprop="url"> Videos </a> › </span><span class="active">'.$name.'</span></div><div class="gap"><div class="video-responsive">

<div class="thum">
<iframe width="350" height="200" src="//www.youtube.com/embed/'.$_GET['v'].'" frameborder="0" allowfullscreen>
</iframe>
</div>


</div></div><div class="list">Channel: <a href="/channel.php?id='.$channelid.'" title="Browse '.$channel.' Channel All Videos"> '.$channel.'</a></b></div><div class="list">Duration: '.$duration.'</div> <div class="list">Views: '.$views.'</div>
<div class="list">Published Date: '.$date.'</div><div class="list">'.$des.'</div> <div class="list">Source: <a href="http://youtube.com/watch?v='.$_GET['v'].'" target="_blank" title="Source '.$name.' On YouTube">YouTube</a></div></div>';

echo '<div class="tags">
ads here
</div>';

echo '<div class="list" style="padding:15px" align="center"><a class="download" href="http://api.waptube.net/video-mp4?v='.$_GET['v'].'"><b>Click Here To Download</b></a>
<br/></div>';
}
}
include 'watch_key.php';
include 'related.php';
include 'recent_search.php';
include 'inc/foot.php';
?>