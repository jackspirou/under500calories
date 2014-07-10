<?php
$user="under500adev";
$password="drink1Whiskey!";
$database="under500adev";
$host="under500adev.db.11813212.hostedresource.com";
/*
$mysqli = new mysqli($host,$user,$password,$database);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
*/
mysql_connect($host,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");


FUNCTION getpage($url)
{
$ch = curl_init();
$randnum=rand(0,29);

$userAgent[]='IE 7 - Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; SU 3.21; .NET CLR 2.0.50727; .NET CLR 3.0.04506.648; .NET CLR 3.5.21022)';

$userAgent[]='Chrome - Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.19 (KHTML, like Gecko) Chrome/1.0.154.53 Safari/525.19';

$userAgent[]='Firefox 3.0 Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.8) Gecko/2009032609 Firefox/3.0.8';

$userAgent[]='Firefox 2.0 - Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6';

$userAgent[]='Safari - Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.28 (KHTML, like Gecko) Version/3.2.2 Safari/525.28.1';

$userAgent[]='Opera - Opera/10.00 (Windows NT 5.1; U; en) Presto/2.2.0';

$userAgent[]='Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2049.0 Safari/537.36';

$userAgent[]='Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.67 Safari/537.36';

$userAgent[]='Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.67 Safari/537.36';

$userAgent[]='Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1944.0 Safari/537.36';

$userAgent[]='Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36';

$userAgent[]='Mozilla/5.0 (compatible; MSIE 10.6; Windows NT 6.1; Trident/5.0; InfoPath.2; SLCC1; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729; .NET CLR 2.0.50727) 3gpp-gba UNTRUSTED/1.0';

$userAgent[]='Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; WOW64; Trident/6.0)';

$userAgent[]='Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)';

$userAgent[]='Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/5.0)';

$userAgent[]='Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/4.0; InfoPath.2; SV1; .NET CLR 2.0.50727; WOW64)';

$userAgent[]='Mozilla/5.0 (compatible; MSIE 10.0; Macintosh; Intel Mac OS X 10_7_3; Trident/6.0)';

$userAgent[]='Mozilla/4.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/5.0)';

$userAgent[]='Mozilla/1.22 (compatible; MSIE 10.0; Windows 3.1)';

$userAgent[]='Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0';

$userAgent[]='Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20120101 Firefox/29.0';

$userAgent[]='Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:25.0) Gecko/20100101 Firefox/29.0';

$userAgent[]='Mozilla/5.0 (X11; OpenBSD amd64; rv:28.0) Gecko/20100101 Firefox/28.0';

$userAgent[]='Mozilla/5.0 (X11; Linux x86_64; rv:28.0) Gecko/20100101 Firefox/28.0';

$userAgent[]='Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:25.0) Gecko/20100101 Firefox/25.0';

$userAgent[]='Mozilla/5.0 (Macintosh; Intel Mac OS X 10.6; rv:25.0) Gecko/20100101 Firefox/25.0';

$userAgent[]='Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/537.13+ (KHTML, like Gecko) Version/5.1.7 Safari/534.57.2';

$userAgent[]='Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_3) AppleWebKit/534.55.3 (KHTML, like Gecko) Version/5.1.3 Safari/534.53.10';

$userAgent[]='Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_8; de-at) AppleWebKit/533.21.1 (KHTML, like Gecko) Version/5.0.5 Safari/533.21.1';

$userAgent[]='Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_7; da-dk) AppleWebKit/533.21.1 (KHTML, like Gecko) Version/5.0.5 Safari/533.21.1';


echo $userAgent[$randnum];

	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_VERBOSE, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_REFERER, "http://yummly.com/");
   	curl_setopt($ch, CURLOPT_USERAGENT, $userAgent[$randnum]);
	curl_setopt($ch, CURLOPT_URL,"$url");
	
	
$filecontents = curl_exec ($ch);
return($filecontents);
}
FUNCTION nutrition($str,$page)
{
$page=explode('NutritionInformation">',$page);
$page=$page[1];
$value=explode($str,$page);
$value=explode('</tr>',$value[1]);
$value=explode('</span>',$value[0]);
$value=trim(preg_replace( '/[^0-9]/', '',strip_tags($value[0])));
echo'<br>'.$str.': '.$value;
return($value);
}





?>
