<?php


function ngegrab($url)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$uaa = $_SERVER['HTTP_USER_AGENT'];
curl_setopt($ch, CURLOPT_USERAGENT, "User-Agent: $uaa");
return curl_exec($ch);
}
function samgrab($url){$ch = curl_init(); curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, '1');
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$header[] = "Accept-Language: en";
$header[] = "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.0; de; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3
";
$header[] = "Pragma: no-cache";
$header[] = "Cache-Control: no-cache";
$header[] = "Accept-Encoding: gzip,deflate";
$header[] = "Content-Encoding: gzip";
$header[] = "Content-Encoding: deflate";
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$load = curl_exec($ch);
curl_close($ch);
return $load;


{
$r = explode($start, $content);
if (isset($r[1])){
$r = explode($end, $r[1]);
return $r[0];
}
return '';
}
}
function format_time($t) 
{
$hasil = str_replace('PT','',$t);
$hasil = str_replace('H','h ',$hasil);
$hasil = str_replace('M','m ',$hasil);
$hasil = str_replace('S','s',$hasil);
return $hasil;
}
function write_to_file($q)
{
$filename = 'sitemap.html';
$fh = fopen($filename, "a");
if(flock($fh, LOCK_EX))
{
fwrite($fh, $q);
flock($fh, LOCK_UN);
}
fclose($fh);}
function dateyt($date)
{
$date = substr($date,0,10); 
$date = explode('-',$date);
$mn   = date('F',mktime(0,0,0,$date[1])); 
$dates= ''.$date[0].' '.$mn.' '.$date[2].''; 
return $dates;
}
?>

<?php
error_reporting(E_ALL ^ E_NOTICE); // hide the notice create new api visit now https://console.developers.google.com/project

$key='AIzaSyBJtPbENH6P96KQb3zkpMNX-vYtTgQVBFM';

?>

