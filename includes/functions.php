<?php
/*This function writes total url*/
function curPageURL()
 {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	  $_SESSION['url']=$pageURL;
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	   $_SESSION['url']=$pageURL;
	 }
 return $pageURL;
 }
 
function getValue($table,$colum,$id,$com){
$row = mysql_query("select $colum from $table where $com=$id limit 0,1");
$r=mysql_fetch_assoc($row);
return $r[$colum];
}

function getVal($table,$colum,$com){
$row = mysql_query("select $colum from $table $com");
$r=mysql_fetch_assoc($row);
return $r[$colum];
}

 /*This function will remove all the HTML entities*/
 function html2text($html)
{
    $tags = array (
    0 => '~<h[123][^>]+>~si',
    1 => '~<h[456][^>]+>~si',
    2 => '~<table[^>]+>~si',
    3 => '~<tr[^>]+>~si',
    4 => '~<li[^>]+>~si',
    5 => '~<br[^>]+>~si',
    6 => '~<p[^>]+>~si',
    7 => '~<div[^>]+>~si',
    );
    $html = preg_replace($tags,"\n",$html);
    $html = preg_replace('~</t(d|h)>\s*<t(d|h)[^>]+>~si',' - ',$html);
    $html = preg_replace('~<[^>]+>~s','',$html);
    // reducing spaces
    $html = preg_replace('~ +~s',' ',$html);
    $html = preg_replace('~^\s+~m','',$html);
    $html = preg_replace('~\s+$~m','',$html);
    // reducing newlines
    $html = preg_replace('~\n+~s',"\n",$html);
    return $html;
}
?>