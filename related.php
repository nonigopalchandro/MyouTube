<?php
echo '<div><h3>Related Videos</h3></div>';
$grab=ngegrab('https://www.googleapis.com/youtube/v3/search?part=snippet&order=relevance&regionCode=lk&q='.$qu.'&key='.$key.'&part=snippet&maxResults=20&relatedToVideoId='.$_GET['v'].'&type=video');
$json = json_decode($grab);
if($json)
{
foreach($json->items as $hasil) 
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




echo '<ul class="itemlist"><li><div class="thumb"><a href="/watch?v='.$id.'" title="'.$name.'"><img src="http://ytimg.googleusercontent.com/vi/'.$id.'/mqdefault.jpg" alt="'.$id.'" width="60px" height="55px" alt="'.$id.'"/></a></div><div class="meta"><a href="/watch?v='.$id.'" title="'.$name.'"><b>'.$name.'</b></a><br/>By '.$channel.'</div></li></ul>';
}

}
?>